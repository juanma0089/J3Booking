<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\BottlesController;
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

Route::get('/history/{id}', [BooksController::class, "history"])->name('history')->middleware('auth');

// Route::get('/booking/{id}', function () {
//     return view('createbooking');
// })->name('booking')->middleware('auth');
Route::get('/booking/{id}/{table?}', function () {
    return view('createbooking');
})->name('booking')->middleware('auth');

Route::post('/booking', [BooksController::class, 'create'])->name('bookingForm.create')->middleware('auth');

Route::get('/books', [BooksController::class, "index"])->name('books')->middleware('auth');

Route::post('/editDinners', [BooksController::class, 'editBookDinners'])->middleware('auth');

Route::get('/editbook/{id?}', [BooksController::class, 'getBook'])->name('editbook')->middleware('auth');

Route::put('/bookingedit', [BooksController::class, 'edit'])->name('bookingForm.edit')->middleware('auth');

Route::get('/deletebottle/{book}/{bottle}', [BottlesController::class, 'deleteBottle'])->name('deletebottle')->middleware('auth');
// EVENTS

Route::get('/eventform', function () {
    return view('createevent');
})->name('createEvent')->middleware('admin');

Route::post('/eventform', [EventsController::class, 'create'])->name('eventForm.create');

// Route::get('/editevent/{id}', function () {
//     return view('editevent');
// })->name('editevent')->middleware('admin');
Route::get('/editevent/{id}', [EventsController::class, "editEvent"])->name('editevent')->middleware('admin');

Route::put('/editevent/{id}', [EventsController::class, 'edit'])->name('editEvent.edit')->middleware('admin');
// Route::get('/events', [EventsController::class, "index"])->name('events')->middleware('auth');

Route::get('/deleteevent/{id}', [EventsController::class, 'delete'])->name('deleteevent')->middleware('admin');


// OTHER ROUTES

Route::get('/modal', function () {
    return view('modal');
})->name('modal')->middleware('auth');

Route::get('/', [EventsController::class, "index"])->name('index')->middleware('auth');

// Test ¿Cambiar nombres?

Route::get('/oldindex/{id}', [TablesController::class, 'index'])->name('oldindex')->middleware('auth');

Route::get('/getbottles', [BottlesController::class, 'getAllBottles'])->name('getbottles')->middleware('auth');

Route::get('/eventhistory', [EventsController::class, 'history'])->name('eventhistory')->middleware('auth');


