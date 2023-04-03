<?php

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
    return view('login');
})->name('login');

Route::get('/', function () {
    return view('/templates/template');
})->name('template');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/index', [TablesController::class, "tableGenerate"])->name('table.generate');
