<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationRequest extends FormRequest
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
        $appId = $this->route('application');

            return [
                'logo' => 'nullable|file|mimes:jpg,jpeg,png|max:1024',
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'description' => 'required|string|max:65535',
                'phone' => 'required|string|max:15',
                'facebook' => 'nullable|string|max:255',
                'twitter' => 'nullable|string|max:255',
                'instagram' => 'nullable|string|max:255', // max 1MB
                'linkedin' => 'nullable|string|max:255',
            ];
    }

    public function messages()
    {
        return [
            'logo.file' => 'Logo harus berupa gambar.',
            'logo.mimes' => 'Foto harus berupa berkas berformat jpg, png, atau jpeg.',
            'logo.max' => 'Foto tidak boleh lebih dari 1MB.',
            'name.required' => 'Nama aplikasi wajib diisi',
            'name.string' => 'Nama aplikasi harus berupa teks',
            'name.max' => 'Nama aplikasi maksimal 255 karakter',
            'email.required' => 'Email wajib diisi',
            'email.string' => 'Email harus berupa teks',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'description.required' => 'Deskripsi wajib diisi',
            'description.string' => 'Deskripsi harus berupa teks',
            'description.max' => 'Deskripsi maksimal 65535 karakter',
            'phone.required' => 'Telepon wajib diisi',
            'phone.string' => 'Telepon harus berupa teks',
            'phone.max' => 'Telepon maksimal 15 karakter',
            'facebook.string' => 'Link facebook harus berupa teks',
            'facebook.max' => 'Link facebook maksimal 255 karakter',
            'twitter.string' => 'Link twitter harus berupa teks',
            'twitter.max' => 'Link twitter maksimal 255 karakter',
            'instagram.string' => 'Link instagram harus berupa teks',
            'instagram.max' => 'Link instagram maksimal 255 karakter',
            'linkedin.string' => 'Link linkedin harus berupa teks',
            'linkedin.max' => 'Link linkedin maksimal 255 karakter',
        ];
    }
}
