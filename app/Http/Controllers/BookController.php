<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Book;
Use App\Models\User;
use Auth;

class BookController extends Controller
{
    public function bookList() {
    	return view('pages.book-list');
    }

    public function myBookList() {
    	return view('pages.my-book-list');
    }

    public function bookDetail($id) {
        $data = Book::find($id);
        if($data) {
            return view('pages.book-detail')->with('data', $data);
        }else {
            abort(404);
        }    	
    }

    public function bookCreation() {
    	return view('pages.book-creation');
    }

    public function bookEdit($id) {
        $data = Book::find($id);
        $id_user_current = Auth::user()->id;
        if($id_user_current == $data['user_id'] || User::find($id_user_current)['role_id'] == 2) {
            return view('pages.book-edit')->with('data', $data);
        }else {
            abort(404);
        }    	
    }
}
