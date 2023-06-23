<?php

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

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route group (auth,guest,All)
Route::group(['middleware'=>'auth'],function(){

    Route::get('/', function () {
        return view('dashboard.layout.main');
    })->name('home');
// CRUD => Create Update Delete
    Route::get('/products',[ProductController::class,'index']);
    Route::get('/products/search',[ProductController::class,'search']);
    Route::get('/products/latest',[ProductController::class,'latest']);

    //Paypal
    Route::get('/payment',[PaypalController::class,'payment'])->name('payment');
    Route::get('/payment/success',[PaypalController::class,'success'])->name('payment.success');
    Route::get('/payment/cancel',[PaypalController::class,'cancel'])->name('payment.cancel');

    Route::group(['middleware'=>'isAdmin'],function(){
        Route::get('/products/create',[ProductController::class,'create']);
        Route::post('/products/store',[ProductController::class,'store']);
        Route::get('/products/edit/{id}',[ProductController::class,'edit']);
        Route::post('/products/update/{id}',[ProductController::class,'update']);
        Route::get('/products/delete/{id}',[ProductController::class,'delete']);

        Route::get('/users',[UserController::class,'index']);
        Route::get('/users/create',[UserController::class,'create']);
        Route::post('/users/store',[UserController::class,'store']);
        Route::get('/users/edit/{id}',[UserController::class,'edit']);
        Route::post('/users/update/{id}',[UserController::class,'update']);
        Route::get('/users/delete/{id}',[UserController::class,'delete']);
        Route::get('/users/latest',[UserController::class,'latest']);

    });

    Route::get('/logout',[AuthController::class,'logout']);
});

Route::group(['middleware'=>'guest'],function(){
    Route::get('/register',[AuthController::class,'registerForm']);
    Route::post('/register',[AuthController::class,'register']);

    Route::get('/login',[AuthController::class,'loginForm'])->name('login');
    Route::post('/login',[AuthController::class,'login']);
});
