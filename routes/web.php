<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BookController::class, 'booksList'])->name('home');

Route::get('/book/{id}', [BookController::class, 'bookDetail'])->name('book-detail');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'handle']);

Route::get('/log-out', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('log-out');

Route::middleware(['auth'])->group(function () {
    Route::get('/my-books', [BookController::class, 'myBooksList'])->name('my-books');
    Route::get('/books-disabled-list', [BookController::class, 'booksDisabledList'])->name('books-disabled-list');
    Route::get('/book-creation', [BookController::class, 'bookCreation'])->name('book-creation');
    Route::get('/book/edit/{id}', [BookController::class, 'bookEdit']);
});