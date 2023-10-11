<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

// Authentication & User logic
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/tokenlogin', [AuthController::class, 'tokenlogin']);



Route::group(['middleware' => ['auth:sanctum']], function () {

    // Secure Authentication endpoints
    Route::post('/logout', [AuthController::class, 'logout']);

    // Secure product endpoints
    Route::post('/products', [ProductController::class, 'store']);

});
