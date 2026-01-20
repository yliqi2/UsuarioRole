<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.form');

// Rutas con middleware
Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        $users = \App\Models\User::orderBy('created_at', 'desc')->get();
        return view('admin', compact('users'));
    })->name('admin');
    
    Route::get('/user', function () {
        return view('user');
    })->name('user');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});