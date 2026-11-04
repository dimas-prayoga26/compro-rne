<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LokasiRequest extends FormRequest
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
            'wilayah' => 'required|string|max:255',
            'latitude' => 'required|string|max:10',
            'longitude' => 'required|string|max:10',
        ];
    }

    public function messages(): array{
        return [
            'wilayah.required' => 'Wilayah tidak boleh kosong',
            'wilayah.string' => 'Wilayah harus berupa string',
            'wilayah.max' => 'Wilayah maksimal 255 karakter',
            'latitude.required' => 'Latitude tidak boleh kosong',
            'latitude.string' => 'Latitude harus berupa string',
            'latitude.max' => 'Latitude maksimal 10 karakter',
            'longitude.required' => 'Longitude tidak boleh kosong',
            'longitude.string' => 'Longitude harus berupa string',
            'longitude.max' => 'Longitude maksimal 10 karakter',
        ];
    }
}
