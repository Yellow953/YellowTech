<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttachementController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PromoController;
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
        Route::get('/new', [UserController::class, 'new'])->name('users.new');
        Route::post('/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // clients routes
    Route::prefix('clients')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('clients');
        Route::get('/new', [ClientController::class, 'new'])->name('clients.new');
        Route::post('/create', [ClientController::class, 'create'])->name('clients.create');
        Route::get('/edit/{client}', [ClientController::class, 'edit'])->name('clients.edit');
        Route::post('/update/{client}', [ClientController::class, 'update'])->name('clients.update');
        Route::get('/delete/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
    });

    // invoices routes
    Route::prefix('invoices')->group(function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('invoices');
        Route::get('/new', [InvoiceController::class, 'new'])->name('invoices.new');
        Route::post('/create', [InvoiceController::class, 'create'])->name('invoices.create');
        Route::get('/edit/{invoice}', [InvoiceController::class, 'edit'])->name('invoices.edit');
        Route::post('/update/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
        Route::get('/delete/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
        Route::get('/show/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
    });

    // projects routes
    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('projects');
        Route::get('/new', [ProjectController::class, 'new'])->name('projects.new');
        Route::post('/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::get('/edit/{project}', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::post('/update/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::get('/delete/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
        Route::get('/images/{project}', [ProjectController::class, 'images'])->name('projects.images');
    });

    // tickets routes
    Route::prefix('tickets')->group(function () {
        Route::get('/', [TicketController::class, 'index'])->name('tickets');
        Route::get('/new', [TicketController::class, 'new'])->name('tickets.new');
        Route::post('/create', [TicketController::class, 'create'])->name('tickets.create');
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
        Route::get('/new', [TodoController::class, 'new'])->name('todo.new');
        Route::post('/create', [TodoController::class, 'create'])->name('todo.create');
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

    // Categories
    Route::prefix('categories')->group(function () {
        Route::get('/new', [CategoryController::class, 'new'])->name('categories.new');
        Route::post('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/{category}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::get('/{category}/switch', [CategoryController::class, 'switch'])->name('categories.switch');
        Route::get('/', [CategoryController::class, 'index'])->name('categories');
    });

    // Products
    Route::prefix('products')->group(function () {
        Route::get('/search', [ProductController::class, 'search'])->name('products.search');
        Route::get('/new', [ProductController::class, 'new'])->name('products.new');
        Route::post('/create', [ProductController::class, 'create'])->name('products.create');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/{product}/update', [ProductController::class, 'update'])->name('products.update');
        Route::get('/{product}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('/{product}/images', [ProductController::class, 'images'])->name('products.images');
        Route::get('/', [ProductController::class, 'index'])->name('products');
    });

    // Orders
    Route::prefix('orders')->group(function () {
        Route::get('/{order}/complete', [OrderController::class, 'complete'])->name('orders.complete');
        Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
        Route::post('/{order}/update', [OrderController::class, 'update'])->name('orders.update');
        Route::get('/{order}/destroy', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::get('/{order}/show', [OrderController::class, 'show'])->name('orders.show');
        Route::get('/new', [OrderController::class, 'new'])->name('orders.new');
        Route::post('/create', [OrderController::class, 'create'])->name('orders.create');
        Route::post('/checkout', [HomeController::class, 'checkout'])->name('orders.checkout');
        Route::get('/', [OrderController::class, 'index'])->name('orders');
    });

    // Promos
    Route::prefix('promos')->group(function () {
        Route::get('/{promo}/edit', [PromoController::class, 'edit'])->name('promos.edit');
        Route::post('/{promo}/update', [PromoController::class, 'update'])->name('promos.update');
        Route::get('/{promo}/destroy', [PromoController::class, 'destroy'])->name('promos.destroy');
        Route::get('/{promo}/show', [PromoController::class, 'show'])->name('promos.show');
        Route::get('/new', [PromoController::class, 'new'])->name('promos.new');
        Route::post('/create', [PromoController::class, 'create'])->name('promos.create');
        Route::post('/check', [PromoController::class, 'check'])->name('check_promo');
        Route::get('/', [PromoController::class, 'index'])->name('promos');
    });

    // Attachements Routes
    Route::prefix('attachements')->group(function () {
        Route::post('/create', [AttachementController::class, 'create'])->name('attachements.create');
        Route::get('/destroy/{attachement}', [AttachementController::class, 'destroy'])->name('attachements.destroy');
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

// Policies
Route::get('/terms_and_conditions', [HomeController::class, 'terms_and_conditions'])->name('terms_and_conditions');
Route::get('/privacy_policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');

// Shop
Route::get('/shop/{category_name}', [HomeController::class, 'shop'])->name('shop');
Route::get('/shop/{category_name}/{product_name}', [HomeController::class, 'product'])->name('product');

// Cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CartController::class, 'order'])->name('checkout.order');

Route::get('/custom_logout', [HomeController::class, 'custom_logout'])->name('custom_logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
