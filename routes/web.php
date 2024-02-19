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
    // admin routes
    Route::get('/admin/users/index', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/new', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users/new', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/edit/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/edit/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/delete/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Main Page
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('/', [HomeController::class, 'index'])->name('home');
