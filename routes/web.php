<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\EventsController;
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

Route::get('/users', [UsersController::class, "index"])->name('users')->middleware('admin');

Route::get('/edituser/{id}', [UsersController::class, "editUser"])->name('edituser')->middleware('auth');

Route::post('/updateuser/{id}',  [UsersController::class, "updateUser"])->name('updateuser')->middleware('auth');

Route::get('/editpass',function () {return view('/users.passworduser');})->name("cambiarPassword")->middleware('auth');

// BOOKS ROUTES

Route::get('/history', [BooksController::class, "history"])->name('history')->middleware('auth');

Route::get('/booking', function () {
    return view('createbooking');
})->name('booking')->middleware('auth');

Route::post('/booking', [BooksController::class, 'create'])->name('bookingForm.create');

Route::get('/books', [BooksController::class, "index"])->name('books')->middleware('auth');

// OTHER ROUTES

Route::get('/modal', function () {
    return view('modal');
})->name('modal')->middleware('auth');

Route::get('/', [EventsController::class, "index"])->name('index')->middleware('auth');

// Test

Route::get('/eventform', function () {
    return view('createevent');
})->name('create')->middleware('admin');

Route::post('/eventform', [EventsController::class, 'create'])->name('eventForm.create');
