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

// AUTH ROUTES

Route::get('/login', function () {
    return view('/auth/login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register')->middleware('admin');

Route::post('/register', [UsersController::class, 'create'])->name('user.create');

// USERS ROUTES

Route::get('/users', [UsersController::class, "index"])->name('users');

Route::get('/edituser/{id?}', [UsersController::class, "editUser"])->name('edituser');

Route::post('/updateuser/{id}',  [UsersController::class, "updateUser"])->name('updateuser');

// BOOKS ROUTES

Route::get('/history', function () {
    return view('history');
})->name('history');

Route::get('/booking', function () {
    return view('createbooking');
})->name('booking')->middleware('auth');

Route::post('/booking', [BooksController::class, 'create'])->name('bookingForm.create');

Route::get('/books', [BooksController::class, "index"])->name('books');

// OTHER ROUTES

Route::get('/modal', function () {
    return view('modal');
})->name('modal');

Route::get('/', [TablesController::class, "tableGenerate"])->name('index')->middleware('auth');
