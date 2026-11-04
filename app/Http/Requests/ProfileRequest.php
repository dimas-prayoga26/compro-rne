<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email:dns|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8|same:password',
            'company_profile' => 'nullable|mimes:pdf|max:4096',
            'whatsapp' => 'required|string|max:255',
            'maps_office' => 'required|string|max:255',
            'email_contact' => 'required|email:dns|max:255',
            'office_contact' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'email.dns' => 'Domain email tidak valid.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.unique' => 'Password sedang digunakan.',
            'company_profile.required' => 'Profil perusahaan wajib diunggah.',
            'company_profile.mimes' => 'Profil perusahaan harus berupa file PDF.',
            'company_profile.max' => 'Ukuran file profil perusahaan maksimal 4MB.',
            'whatsapp.required' => 'WhatsATpp wajib diisi.',
            'maps_office.required' => 'Maps kantor wajib diisi.',
            'email_contact.required' => 'Kontak email wajib diisi.',
            'email_contact.email' => 'Format kontak email tidak valid.',
            'email_contact.dns' => 'Domain kontak email tidak valid.',
            'office_contact.required' => 'Kontak kantor wajib diisi.',
            'address.required' => 'Alamat wajib diisi.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'company_profile' => $this->file('company_profile'),
        ]);
    }
}
