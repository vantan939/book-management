<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Book;
Use App\Models\User;
use Auth;

class BookController extends Controller
{
    public function booksList() {
        if(Auth::check()) {
            $id_user_current = Auth::user()->id;
            if(User::find($id_user_current)['role_id'] == 1) {
                $type_user = 'normal';
            }else {
                $type_user = 'admin';
            }
        }else {
            $type_user = 'guest';
            $id_user_current = 0;
        }
    	return view('pages.books-list', compact('type_user','id_user_current'));
    }

    public function myBooksList() {
    	return view('pages.my-books-list');
    }

    public function booksDisabledList() {
        $id_user_current = Auth::user()->id;
        if(User::find($id_user_current)['role_id'] == 1) {
            abort(404);
        }else {
            return view('pages.books-disabled-list');
        }    	
    }

    public function bookDetail($id) {
        $data = Book::find($id);
        if($data) {            
            if(!$data->enabled) {
                if(!Auth::check()) {
                    abort(404);
                }else {
                    $id_user_current = Auth::user()->id;
                    if($id_user_current != $data->user_id && User::find($id_user_current)['role_id'] == 1) {
                        abort(404);
                    }
                }
            }

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
