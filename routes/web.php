<?php

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
    return view('login');
})->name('login');

Route::get('/template', function () {
    return view('/templates/template');
})->name('template');


Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post("/register", [UsersController::class, "create"])->name("user.create");

Route::get('/index', function () {
    return view('index');
})->name('index');

