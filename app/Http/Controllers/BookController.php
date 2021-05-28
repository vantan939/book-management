<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Book;

class BookController extends Controller
{
    public function bookList() {
    	return view('pages.book-list');
    }

    public function myBookList() {
    	return view('pages.my-book-list');
    }

    public function bookDetail() {
    	return view('pages.book-detail');
    }

    public function bookCreation() {
    	return view('pages.book-creation');
    }

    public function bookEdit($id) {
        $data = Book::find($id);
    	return view('pages.book-edit')->with('data', $data);
    }
}
