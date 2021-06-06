<?php

namespace App\Http\Controllers;

Use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookFormRequest;

class APIController extends Controller
{
    public function getBooksList() {
        $books = Book::where('enabled', 1)->get();
        
        if($books->isNotEmpty()) {
            return response()->json($books, 200);
        }else {
            return response()->json('Book Not found!', 200);
        }
    }

    public function getBooksDisabledList() {
        $books = Book::where('enabled', 0)->get();
        
        if($books->isNotEmpty()) {
            return response()->json($books, 200);
        }else {
            return response()->json('Book Not found!', 200);
        }
    }

    public function getBooksListByUserID($userId) {
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

    public function bookCreation(BookFormRequest $request) {
        $validatedData = $request->validated();
        $result = Book::create($validatedData);
        if($result) {
            return response()->json('Book has been created!', 200);
        }else {
            return response()->json($result);
        }        
    }

    public function bookEdit(BookFormRequest $request, $id) {
        $validatedData = $request->validated();
        $book = Book::where('id', $id);
        $result = $book->update($validatedData);
        if($result) {
            return response()->json('Book has been updated!', 200);
        }else {
            return response()->json($result);   
        }
    }
}
