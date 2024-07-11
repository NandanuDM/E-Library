@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
            </div>
            <div class="form-group">
                <label for="published_year">Published Year</label>
                <input type="number" class="form-control" id="published_year" name="published_year" value="{{ $book->published_year }}" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="publisher_id">Publisher</label>
                <select class="form-control" id="publisher_id" name="publisher_id" required>
                    @foreach($publishers as $publisher)
                        <option value="{{ $publisher->id }}" {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>{{ $publisher->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cover_image">Cover Image</label>
                <input type="text" class="form-control" id="cover_image" name="cover_image" value="{{ $book->cover_image }}">
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $book->stock }}" required>
            </div>
            <div class="form-group">
                <label for="rental_price">Rental Price</label>
                <input type="number" class="form-control" id="rental_price" name="rental_price" value="{{ $book->rental_price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Book</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
