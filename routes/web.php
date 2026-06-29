<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\OperationController;

// Sitemap
Route::get('/sitemap.xml', [PublicController::class, 'sitemap'])->name('sitemap');

// Public Routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/services', [PublicController::class, 'services'])->name('services');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'handleContact'])->name('contact.submit');
Route::get('/request-quote', [PublicController::class, 'quote'])->name('quote');
Route::post('/request-quote', [PublicController::class, 'handleQuote'])->name('quote.submit');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Secure Dashboard System Panel
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Services resource management
    Route::resource('services', ServiceController::class);

    // Administrative updates
    Route::get('/contacts', [OperationController::class, 'contacts'])->name('contacts');
    Route::post('/contacts/{contact}/read', [OperationController::class, 'markContactRead'])->name('contacts.read');
    Route::get('/quotes', [OperationController::class, 'quotes'])->name('quotes');
    Route::post('/quotes/{quote}/status/{status}', [OperationController::class, 'updateQuoteStatus'])->name('quotes.status');
});
