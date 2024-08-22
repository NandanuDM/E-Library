<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMemberRequest extends FormRequest
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
        $memberId = $this->route('member');
        return [
            'photo' => 'nullable|file|mimes:jpg,png,jpeg|max:1024',
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            // 'phone' => 'required|string|max:15|unique:members,phone,' . $this->id . ',id,deleted_at,null',
            'phone' => ['required', 'max:15', Rule::unique('members')->ignore($memberId, 'id')->withoutTrashed()],
            // 'phone' =>
            // ['required', 'max:15', 'string', Rule::unique('members')->ignore($data['phone'])->withoutTrashed()],
            // 'email' => 'required|string|email|max:255|unique:members,email,' . $memberId . ',id,deleted_at,null',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('members')->ignore($memberId, 'id')->withoutTrashed()],
        ];
    }

    /**
     * Get the validation messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 'photo.required' => 'Foto wajib diunggah.',
            'photo.file' => 'Foto harus berupa berkas.',
            'photo.mimes' => 'Foto harus berupa berkas berformat jpg, png, atau jpeg.',
            'photo.max' => 'Foto tidak boleh lebih dari 1MB.',
            'full_name.required' => 'Nama lengkap wajib diisi',
            'full_name.string' => 'Nama lengkap harus berupa teks',
            'full_name.max' => 'Nama lengkap maksimal 255 karakter',
            'address.required' => 'Alamat wajib diisi',
            'address.string' => 'Alamat harus berupa teks',
            'address.max' => 'Alamat maksimal 255 karakter',
            'phone.required' => 'Telepon wajib diisi',
            'phone.string' => 'Telepon harus berupa teks',
            'phone.max' => 'Telepon maksimal 15 karakter',
            'phone.unique' => 'Nomor telepon sudah terdaftar',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email.string' => 'Email harus berupa teks',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'type.required' => 'Tipe anggota wajib diisi',
        ];
    }
}
