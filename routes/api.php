<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('products',[ApiProductController::class,'index']);
Route::get('products/show/{id}',[ApiProductController::class,'show']);
Route::post('register',[ApiAuthController::class,'register']);
Route::post('login',[ApiAuthController::class,'login']);


Route::group(['middleware'=>'api-auth'],function(){
    Route::post('products/store',[ApiProductController::class,'store']);
    Route::post('products/update/{id}',[ApiProductController::class,'update']);
    Route::get('products/delete/{id}',[ApiProductController::class,'delete']);
    Route::get('logout',[ApiAuthController::class,'logout']);
});
