<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

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

    // projects routes
    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('projects');
        Route::get('/new', [ProjectController::class, 'new'])->name('projects.create');
        Route::post('/create', [ProjectController::class, 'create'])->name('projects.store');
        Route::get('/edit/{project}', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::post('/update/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::get('/delete/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    });

    // invoices routes
    Route::prefix('invoices')->group(function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('invoices');
        Route::get('/new', [InvoiceController::class, 'new'])->name('invoices.create');
        Route::post('/create', [InvoiceController::class, 'create'])->name('invoices.store');
        Route::get('/edit/{invoice}', [InvoiceController::class, 'edit'])->name('invoices.edit');
        Route::post('/update/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
        Route::get('/delete/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
    });

    // tickets routes
    Route::prefix('tickets')->group(function () {
        Route::get('/', [TicketController::class, 'index'])->name('tickets');
        Route::get('/new', [TicketController::class, 'new'])->name('tickets.create');
        Route::post('/create', [TicketController::class, 'create'])->name('tickets.store');
        Route::get('/edit/{ticket}', [TicketController::class, 'edit'])->name('tickets.edit');
        Route::post('/update/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
        Route::get('/delete/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');
    });

    // logs routes
    Route::prefix('logs')->group(function () {
        Route::get('/', [LogController::class, 'index'])->name('logs');
    });

    // TODO routes
    Route::prefix('todo')->group(function () {
        Route::get('/', [TodoController::class, 'index'])->name('todo');
        Route::get('/new', [TodoController::class, 'new'])->name('todo.create');
        Route::post('/create', [TodoController::class, 'create'])->name('todo.store');
        Route::get('/edit/{todo}', [TodoController::class, 'edit'])->name('todo.edit');
        Route::post('/update/{todo}', [TodoController::class, 'update'])->name('todo.update');
        Route::get('/delete/{todo}', [TodoController::class, 'destroy'])->name('todo.destroy');
        Route::get('/complete/{todo}', [TodoController::class, 'complete'])->name('todo.complete');
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
