@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Book Details</h1>
        <div class="card">
            <div class="card-header">
                {{ $book->title }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Author: {{ $book->author }}</h5>
                <p class="card-text">Published Year: {{ $book->published_year }}</p>
                <p class="card-text">Category: {{ $book->category->name }}</p>
                <p class="card-text">Publisher: {{ $book->publisher->name }}</p>
                <p class="card-text">Stock: {{ $book->stock }}</p>
                <p class="card-text">Rental Price: {{ $book->rental_price }}</p>
                <p class="card-text">Cover Image: <img src="{{ $book->cover_image }}" alt="{{ $book->title }}"></p>
                <a href="{{ route('books.index') }}" class="btn btn-primary">Back to Books</a>
            </div>
        </div>
    </div>
@endsection
