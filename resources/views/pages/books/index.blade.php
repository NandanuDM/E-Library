@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-2">Add Book</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Published Year</th>
                    <th>Category</th>
                    <th>Publisher</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->published_year }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>{{ $book->publisher->name }}</td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection