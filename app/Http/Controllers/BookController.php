<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Display a listing of the books
    public function index()
    {
        $books = Book::with('category', 'publisher')->get();
        return view('pages.books.index', compact('books'));
    }

    // Show the form for creating a new book
    public function create()
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('pages.books.create', compact('categories', 'publishers'));
    }

    // Store a newly created book in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|integer',
            'category_id' => 'required|integer',
            'publisher_id' => 'required|integer',
            'cover_image' => 'nullable|string',
            'stock' => 'required|integer',
            'rental_price' => 'required|integer',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    // Show the book by ID
    public function show(Book $book)
    {
        return view('pages.books.show', compact('book'));
    }

    // Show the form for editing the specified book
    public function edit(Book $book)
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('pages.books.edit', compact('book', 'categories', 'publishers'));
    }

    // Update the specified book in the database
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|integer',
            'category_id' => 'required|integer',
            'publisher_id' => 'required|integer',
            'cover_image' => 'nullable|string',
            'stock' => 'required|integer',
            'rental_price' => 'required|integer',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    // Remove the specified book from the database
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
