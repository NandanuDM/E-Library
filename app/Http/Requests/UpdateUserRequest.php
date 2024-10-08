<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user');
        return [
            'name' => 'required|string|max:255',
            'email' =>
            'required|email|max:255|unique:users,email,' . $userId . ',id,deleted_at,null',
            'profile_photo' => 'nullable|file|mimes:jpg,jpeg,png|max:1024',
            // ['required', 'max:255', 'email', Rule::unique('users')->withoutTrashed()],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'name.string' => 'Nama harus berupa teks',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email wajib diisi',
            'email.string' => 'Email harus berupa teks',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'profile_photo.file' => 'Foto harus berupa file',
            'profile_photo.mimes' => 'Foto harus bertipe jpg, jpeg, atau png',
            'profile_photo.max' => 'Ukuran foto maksimal 1 MB',
        ];
    }
}
