<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


Route::resource('/books', BookController::class)->middleware('auth');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');


Route::get('/books/{book}/borrow', [BookController::class, 'getBorrow'])->name('books.borrow');
Route::post('/books/{book}/borrow/{student}', [BookController::class, 'postBorrow'])->name('books.postBorrow');

Route::get('/books/{book}/return', [BookController::class, 'getReturn'])->name('books.return');
Route::post('/books/{book}/return', [BookController::class, 'postReturn'])->name('books.postReturn');
