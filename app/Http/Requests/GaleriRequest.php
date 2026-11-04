<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GaleriRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:8192',
        ];

        if($this->method() == 'POST') {
            return [
                'image_path' => 'required|image|mimes:jpeg,png,jpg|max:8192',
            ];
        }

    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul tidak boleh kosong',
            'title.string' => 'Judul harus berupa string',
            'title.max' => 'Judul tidak boleh lebih dari 255 karakter',
            'description.required' => 'Deskripsi tidak boleh kosong',
            'description.string' => 'Deskripsi harus berupa string',
            'image_path.required' => 'Gambar tidak boleh kosong',
            'image_path.image' => 'Gambar harus berupa gambar',
            'image_path.mimes' => 'Gambar harus berupa file JPEG, PNG, atau JPG',
            'image_path.max' => 'Ukuran gambar tidak boleh lebih dari 8MB',
        ];
    }
}
