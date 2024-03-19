<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
})
    // ->middleware(['auth', 'verified'])
    ->name('home');

require __DIR__ . '/books.php';

require __DIR__ . '/authors.php';

require __DIR__ . '/categories.php';

require __DIR__ . '/students.php';
