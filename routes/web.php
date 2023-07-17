<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index']);
Route::get('/home', function () {
    return view('homepage');
})->name('home');

Route::post('/home', [UserController::class, 'loginControl'])->name('login');
Route::get('/user', [UserController::class, 'toUser'])->name('user');
Route::get('/register', [UserController::class, 'toRegister'])->name('register');
Route::post('/register', [UserController::class, 'registerControl'])->name('register_user');
Route::get('/userlist', [UserController::class, 'toUserList'])->name('userlist');
Route::get('/edit/{user}', [UserController::class, 'toUpdateUser'])->name('edit');
Route::get('/delete/{user}', [UserController::class, 'toDeleteUser'])->name('delete');
