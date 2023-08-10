<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\AuthController;

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


Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});

Route::middleware('auth:api')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/logout', 'logout');
        Route::post('/refresh', 'refresh');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index');
        Route::post('/category', 'store');
        Route::get('/category/{id}', 'show');
        Route::put('/category/{id}', 'update');
        Route::delete('/category/{id}', 'destroy');
        Route::delete('/delete-categories/{ids}', 'destroySelected');
    });
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::post('/user', 'store');
        Route::get('/user/{id}', 'show');
        Route::put('/user/{id}', 'update');
        Route::delete('/user/{id}', 'destroy');
        Route::delete('/delete-users/{ids}', 'destroySelected');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::post('/product', 'store');
        Route::get('/product/{id}', 'show');
        Route::put('/product/{id}', 'update');
        Route::delete('/product/{id}', 'destroy');
        Route::delete('/delete-products/{ids}', 'destroySelected');
    });
});


