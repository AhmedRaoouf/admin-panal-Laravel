<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard.layout.main')->name('home');
    });

    // Products resource route
    Route::resource('products', ProductController::class);

    Route::get('/products/search', [ProductController::class, 'search']);
    Route::get('/products/latest', [ProductController::class, 'latest']);

    // Paypal
    Route::get('/payment', [PaypalController::class, 'payment'])->name('payment');
    Route::get('/payment/success', [PaypalController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancel', [PaypalController::class, 'cancel'])->name('payment.cancel');

    Route::middleware(['isAdmin'])->group(function () {
        // Users resource route
        Route::resource('users', UserController::class);
        Route::get('/users/latest', [UserController::class, 'latest']);
    });

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'registerForm']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
