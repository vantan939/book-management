<?php

namespace App\Http\Controllers;

Use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function getBookList() {
        $books = Book::all();

        if($books->isNotEmpty()) {
            return response()->json($books, 200);
        }else {
            return response()->json('Book Not found!', 200);
        }
    }

    public function getBookListByUserID($userId) {
        $books = Book::where('user_id', $userId)->get();

        if($books->isNotEmpty()) {
            return response()->json($books, 200);
        }else {
            return response()->json('Book Not found!', 200);
        }
    }

    public function bookDelete($id) {
        if(Book::where('id', $id)->exists()) {
            $book = Book::find($id);
            $book->delete();
            return response()->json('Deleted Book!', 200);
        } else {
            return response()->json('Book Not found!', 200);
        }
    }
}
