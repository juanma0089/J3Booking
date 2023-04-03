<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TablesController;
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

Route::get('/login', function () {
    return view('/auth/login');
})->name('login');

Route::get('/register', function () {

    return view('auth.register');
})->name('register')->middleware('admin');

Route::post('/register', [UsersController::class, 'create'])->name('user.create');

Route::get('/books', function () {
    return view('books');
})->name('books');

Route::get('/history', function () {
    return view('history');
})->name('history');

Route::get('/', [TablesController::class, "tableGenerate"])->name('index')->middleware('auth');

Route::get('/users', [UsersController::class, "index"])->name('users');

Route::get('/booking', function () {
    return view('createbooking');
})->name('booking')->middleware('auth');

Route::post('/booking', [BooksController::class, 'create'])->name('bookingForm.create');
