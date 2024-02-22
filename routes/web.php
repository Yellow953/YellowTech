<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

// Admin Panel
Route::prefix('app')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // users routes
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/new', [UserController::class, 'new'])->name('users.create');
        Route::post('/create', [UserController::class, 'create'])->name('users.store');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});

// Main Page
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/service', [HomeController::class, 'service'])->name('service');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/', [HomeController::class, 'index'])->name('home');
