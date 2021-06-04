<?php

namespace App\Http\Controllers;

Use App\Models\Book;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getBookList(Request $request) {
        $books = Book::where('enabled', 1)->get();
        
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

    public function bookCreation(Request $request) {
        $result = Book::create($request->all());
        if($result->exists) {
            return response()->json('Book has been created!', 200);
        }else {
            return response()->json('Cant create a book!', 200);
        }
    }

    public function bookEdit(Request $request, $id) {
        $data = $request->all();        
        $book = Book::where('id', $id);        
        if($book->update($data)) {
            return response()->json('Book has been updated!', 200);
        }else {
            return response()->json('Cant update a book!', 200);
        }
    }
}
