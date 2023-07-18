<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
Route::get('/category', function () {
    return view('categorypage');
})->name('category');
Route::get('/product', function () {
    return view('productpage');
})->name('product');

Route::post('/home', [UserController::class, 'loginControl'])->name('login');
Route::get('/user', [UserController::class, 'toUser'])->name('user');
Route::get('/user/register', [UserController::class, 'toRegister'])->name('register');
Route::post('/user/register', [UserController::class, 'registerControl'])->name('register_user');
Route::get('/user/userlist', [UserController::class, 'toUserList'])->name('userlist');
Route::get('/user/edit/{user}', [UserController::class, 'toUpdateUser'])->name('edit');
Route::post('/user/edit/{user}', [UserController::class, 'toUpdateUser'])->name('edit');
Route::get('/user/delete/{user}', [UserController::class, 'toDeleteUser'])->name('delete');
Route::post('/user/delete-user/{user}', [UserController::class, 'deleteUser'])->name('delete_user');
Route::post('/user/delete-user', [UserController::class, 'deleteUsers'])->name('delete_users');
Route::post('/user/edit-user/{user}', [UserController::class, 'editUser'])->name('edit_user');


Route::get('/category/add-category',[CategoryController::class, 'toAddCategory'])->name('add_category');
Route::post('/category/add-category',[CategoryController::class, 'addCategory'])->name('add_new_category');
Route::get('/category/list-category',[CategoryController::class, 'toCategoryList'])->name('list_category');
Route::get('/category/edit-category/{category}',[CategoryController::class, 'toEditCategory'])->name('edit_category');
Route::post('/category/edit-category/{category}',[CategoryController::class, 'editCategory'])->name('edit_category');
Route::get('/category/delete-category/{category}',[CategoryController::class, 'toDeleteCategory'])->name('delete_category');
Route::post('/category/delete-category/{category}',[CategoryController::class, 'deleteCategory'])->name('delete_category');
Route::post('/category/delete-categories',[CategoryController::class, 'deleteCategories'])->name('delete_categories');


Route::get('/product/add-product',[ProductController::class, 'toAddProduct'])->name('add_product');

