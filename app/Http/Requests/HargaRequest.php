<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HargaRequest extends FormRequest
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
            'tanggal_awal' => 'required|date|before_or_equal:tanggal_akhir',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
            'jenis' => 'required|integer|in:1,2,3',
            'harga_1' => 'required|numeric',
            'harga_2' => 'required|numeric',
            'harga_3' => 'required|numeric',
            'harga_4' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'tanggal_awal.required' => 'Tanggal awal wajib diisi.',
            'tanggal_awal.date' => 'Format tanggal awal tidak valid.',
            'tanggal_awal.before_or_equal' => 'Tanggal awal harus sebelum tanggal akhir.',
            'tanggal_akhir.required' => 'Tanggal akhir wajib diisi.',
            'tanggal_akhir.date' => 'Format tanggal akhir tidak valid.',
            'tanggal_akhir.after_or_equal' => 'Tanggal akhir harus setelah tanggal awal.',
            'jenis.required' => 'Jenis wajib diisi.',
            'jenis.integer' => 'Jenis harus berupa angka.',
            'jenis.in' => 'Jenis tidak valid.',
            'harga_1.required' => 'Harga Wilayah 1 wajib diisi.',
            'harga_1.numeric' => 'Harga Wilayah 1 harus berupa angka.',
            'harga_2.required' => 'Harga Wilayah 2 wajib diisi.',
            'harga_2.numeric' => 'Harga Wilayah 2 harus berupa angka.',
            'harga_3.required' => 'Harga Wilayah 3 wajib diisi.',
            'harga_3.numeric' => 'Harga Wilayah 3 harus berupa angka.',
            'harga_4.required' => 'Harga Wilayah 4 wajib diisi.',
            'harga_4.numeric' => 'Harga Wilayah 4 harus berupa angka.',
        ];
    }
}
