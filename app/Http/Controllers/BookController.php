<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function bookList() {
    	return view('pages.book-list');
    }
}
