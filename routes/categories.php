<?php


use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('/categories', CategoryController::class)->middleware('auth');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{author}', [CategoryController::class, 'show'])->name('categories.show');
