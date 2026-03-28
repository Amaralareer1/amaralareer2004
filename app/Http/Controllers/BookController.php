<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = Book::where('status', 1)->get();
        return view('books.index', compact('books'));
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {
        Book::create($request->all());
        return redirect()->route('books.index');
    }

    
    public function edit($id) {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id) {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('books.index');
    }

    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->update(['status' => 0]); 
        return back();
    }
}