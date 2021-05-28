<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['api.key'])->group(function () {
	Route::get('/book-list', [APIController::class, 'getBookList']);
	Route::get('/my-book-list/{userId}', [APIController::class, 'getBookListByUserID']);
	Route::delete('/book/del/{id}', [APIController::class, 'bookDelete']);	
	Route::post('/book/create', [APIController::class, 'bookCreation']);
	Route::put('/book/edit/{id}', [APIController::class, 'bookEdit']);
});