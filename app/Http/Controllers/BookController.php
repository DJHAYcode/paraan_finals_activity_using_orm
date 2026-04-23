<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Display all books
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    // Show create form
    public function create()
    {
        return view('books.create');
    }

    // Store new book
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index');
    }

    // Show edit form
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('books.edit', compact('book'));
    }

    // Update book
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
        ]);

        $book = Book::findOrFail($id);

        $book->update($request->all());

        return redirect()->route('books.index');
    }

    // Delete book
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->route('books.index');
    }
}