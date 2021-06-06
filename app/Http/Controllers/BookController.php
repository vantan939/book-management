<?php

namespace App\Http\Controllers;
Use App\Models\Book;

class BookController extends Controller
{
    public function booksList() {
    	return view('pages.books-list')
               ->with('data', [
                   'type_user' => getUserType(),
                   'id_user_current' => get_idUser_current()
                ]);
    }

    public function myBooksList() {
    	return view('pages.my-books-list');
    }

    public function booksDisabledList() {
        if(!isAdmin()) abort(404);
        return view('pages.books-disabled-list');
    }

    public function bookDetail($id) {
        $data = Book::find($id);
        if($data) {
            if(!$data->enabled) { // Check if book is disabled
                if(isGuest() || (get_idUser_current() != $data->user_id && isUser()) ) {
                    abort(404);
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
        $data->type_user = getUserType();
        if(get_idUser_current() == $data->user_id || isAdmin()) {
            return view('pages.book-edit')->with('data', $data);
        }else {
            abort(404);
        }
    }
}
