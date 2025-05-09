<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'view'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

