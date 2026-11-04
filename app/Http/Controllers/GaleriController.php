<?php

namespace App\Http\Controllers;

use App\Http\Requests\GaleriRequest;
use App\Models\Galeri;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GaleriController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::all();
        return view('admin.pages.galeri', compact('galeri'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(GaleriRequest $request)
    {
        $this->authorize('create', Galeri::class);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image_path')) {

            $file = $request->file('image_path');
            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('img/Galeri'), $filename);

            $data['image_path'] = $filename;
        }

        Galeri::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Galeri berhasil disimpan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GaleriRequest $request, Galeri $galeri)
    {
        $this->authorize('update', $galeri);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image_path')) {

            $old = public_path('img/Galeri/' . $galeri->image_path);
            if (file_exists($old)) unlink($old);

            $file = $request->file('image_path');
            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('img/Galeri'), $filename);

            $data['image_path'] = $filename;
        }

        $galeri->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Galeri berhasil diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        $this->authorize('delete', $galeri);

        $old = public_path('img/Galeri/' . $galeri->image_path);
        if (file_exists($old)) unlink($old);

        $galeri->delete();

        return response()->json([
            'success' => true,
            'message' => 'Galeri berhasil dihapus.',
        ]);
    }
}
