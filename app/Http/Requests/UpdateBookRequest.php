<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $bookId = $this->route('book'); // Assume the route parameter is 'book'

        return [
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|max:20|unique:books,isbn,' . $bookId,
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id',
            'publisher_id' => 'required|integer|exists:publishers,id',
            'language' => 'required|string|max:255',
            'cover_image' => 'nullable|file|mimes:png|max:1024', // max 1MB
            'stock' => 'required|integer|min:0',
            'rental_price' => 'required|integer|min:0',
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
            'title.required' => 'Judul wajib diisi',
            'isbn.required' => 'ISBN wajib diisi',
            'isbn.unique' => 'ISBN sudah terdaftar',
            'author.required' => 'Penulis wajib diisi',
            'published_year.required' => 'Tahun terbit wajib diisi',
            'published_year.integer' => 'Tahun terbit harus berupa angka',
            'category_id.required' => 'Kategori wajib diisi',
            'category_id.integer' => 'Kategori harus berupa angka yang valid',
            'category_id.exists' => 'Kategori yang dipilih tidak valid',
            'publisher_id.required' => 'Penerbit wajib diisi',
            'publisher_id.integer' => 'Penerbit harus berupa angka yang valid',
            'publisher_id.exists' => 'Penerbit yang dipilih tidak valid',
            'language.required' => 'Bahasa wajib diisi',
            'cover_image.file' => 'Gambar sampul harus berupa berkas.',
            'cover_image.mimes' => 'Gambar sampul harus berformat PNG.',
            'cover_image.max' => 'Gambar sampul tidak boleh lebih dari 1MB.',
            'stock.required' => 'Stok wajib diisi',
            'stock.integer' => 'Stok harus berupa angka',
            'stock.min' => 'Stok minimal 0',
            'rental_price.required' => 'Harga sewa wajib diisi',
            'rental_price.integer' => 'Harga sewa harus berupa angka',
            'rental_price.min' => 'Harga sewa minimal 0',
        ];
    }
}