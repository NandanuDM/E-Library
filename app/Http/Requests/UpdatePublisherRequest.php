<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePublisherRequest extends FormRequest
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
        $id = $this->route('publisher');
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('publishers')->ignore($id, 'id')->withoutTrashed()],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama penerbit wajib diisi.',
            'name.string' => 'Nama penerbit harus berupa teks.',
            'name.max' => 'Nama penerbit maksimal 255 karakter.',
            'name.unique' => 'Nama penerbit sudah terdaftar.',
        ];
    }
}
