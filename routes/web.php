<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ToDoController;

Auth::routes(['register' => false, 'reset' => true]);

// Admin Panel
Route::prefix('app')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // users routes
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/new', [UserController::class, 'new'])->name('users.create');
        Route::post('/create', [UserController::class, 'create'])->name('users.store');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // clients routes
    Route::prefix('clients')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('clients');
        Route::get('/new', [ClientController::class, 'new'])->name('clients.create');
        Route::post('/create', [ClientController::class, 'create'])->name('clients.store');
        Route::get('/edit/{client}', [ClientController::class, 'edit'])->name('clients.edit');
        Route::post('/update/{client}', [ClientController::class, 'update'])->name('clients.update');
        Route::get('/delete/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
    });

    // logs routes
    Route::prefix('logs')->group(function () {
        Route::get('/', [LogController::class, 'index'])->name('logs');
    });

    // TODO routes
    Route::prefix('todo')->group(function () {
        Route::get('/', [ToDoController::class, 'index'])->name('todo');
        Route::get('/new', [ToDoController::class, 'new'])->name('todo.create');
        Route::post('/create', [ToDoController::class, 'create'])->name('todo.store');
        Route::get('/edit/{todo}', [ToDoController::class, 'edit'])->name('todo.edit');
        Route::post('/update/{todo}', [ToDoController::class, 'update'])->name('todo.update');
        Route::get('/delete/{todo}', [ToDoController::class, 'destroy'])->name('todo.destroy');
    });

    //calendar routes
    Route::prefix('calendar')->group(function () {
        Route::get('/', [CalendarController::class, 'index'])->name('calendar');
        Route::get('/events', [CalendarController::class, 'events'])->name('calendar.events');
    });
});

//Reset Pass
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Main Page
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/service', [HomeController::class, 'service'])->name('service');

Route::get('/custom_logout', [HomeController::class, 'custom_logout'])->name('custom_logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
