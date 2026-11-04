<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        return view('admin.pages.profile');
    }

    public function update(ProfileRequest $request, User $profile)
    {
        $this->authorize('update', $profile->detail);

        $data = $request->validated();

        $profile->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        // PASSWORD
        if (!empty($data['password'])) {
            $profile->update([
                'password' => Hash::make($data['password'])
            ]);

            if (Hash::check($data['password'], auth()->user()->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Password tidak boleh sama dengan sebelumnya.'
                ], 422);
            }

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json([
                'success' => true,
                'message' => 'Password berhasil diperbarui.',
                'redirect' => route('login') . '?status=pass_changed'
            ]);
        }

        if (!empty($data['whatsapp'])) {

            $whatsapp = trim($data['whatsapp']);

            // hapus spasi + karakter selain angka
            $whatsapp = preg_replace('/\D+/', '', $whatsapp);

            // kalau mulai 08 → jadi 628
            if (str_starts_with($whatsapp, '08')) {
                $whatsapp = '628' . substr($whatsapp, 2);
            }

            $data['whatsapp'] = $whatsapp;
        }

        // FILE
        if ($request->hasFile('company_profile')) {

            if ($profile->detail && $profile->detail->company_profile) {
                $old = public_path($profile->detail->company_profile);
                if (file_exists($old)) unlink($old);
            }

            $file = $request->file('company_profile');
            $filename = $file->getClientOriginalName();

            $file->move(public_path(), $filename);

            $data['company_profile'] = $filename;
        }

        // HAPUS kalau tidak upload file
        if (empty($data['company_profile'])) {
            unset($data['company_profile']);
        }

        // HAPUS FIELD USER DARI DETAIL
        unset($data['name'], $data['email'], $data['password'], $data['password_confirmation']);

        $profile->detail()->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Profil berhasil diperbarui.',
        ]);
    }
}
