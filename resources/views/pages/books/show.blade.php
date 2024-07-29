@extends('layouts.app')

@section('title', 'Detail Buku')

@section('page-header')
<div class="row">
    <div class="col-12 col-lg-8 offset-lg-2">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Buku</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('books.index') }}"><i class="fas fa-book mr-1"></i> Buku</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $book->title }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : asset('https://placehold.co/400x600') }}" 
                                 alt="{{ $book->title }}" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="title">Judul Buku</label>
                                        <p>{{ $book->title }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Pengarang</label>
                                        <p>{{ $book->author }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="published_year">Tahun Terbit</label>
                                        <p>{{ $book->published_year }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Kategori</label>
                                        <p>{{ $book->category->name }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="publisher_id">Penerbit</label>
                                        <p>{{ $book->publisher->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="publisher_id">Bahasa</label>
                                        <p>{{ $book->language }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Stok</label>
                                        <p>{{ $book->stock }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="rental_price">Harga Sewa</label>
                                        <p>{{ $book->rental_price }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('books.index') }}" class="btn btn-primary mt-3"><i class="fas fa-arrow-left mr-1"></i> Kembali ke Daftar Buku</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
