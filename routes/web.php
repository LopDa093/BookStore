<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookReviewController;
use App\Models\Book;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', [BookController::class, 'index']);

Route::get('/books/{id}', [BookController::class, 'show'])
    ->where('id', '[0-9]+');
    
Route::get('/books/create', [BookController::class,'create']);

Route::post('books', [BookController::class, 'store']);

Route::get('/books/{id}/edit',[BookController::class, 'edit'])
    ->where('id', '[0-9]+');

Route::put('/books/{id}', [BookController::class, 'update'])
    ->where('id', '[0-9]+');

Route::delete('/books/{id}', [BookController::class, 'destroy'])
    ->where('id', '[0-9]+');

Route::put('/reviews', [BookReviewController::class, 'store']);




