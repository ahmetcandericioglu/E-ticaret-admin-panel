<?php

use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\web\MailController;
use App\Http\Controllers\web\PasswordController;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login-post', [AuthController::class, 'loginControl'])->name('loginpost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forget-password', [PasswordController::class, 'toPassword'])->name('forget.password');
Route::post('send-mail', [MailController::class, 'index'])->name('send.mail');
Route::get('/reset/{token}', [MailController::class, 'toReset']);
Route::post('/reset-password/{id}', [MailController::class, 'reset'])->name('change.password');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
        return view('homepage');
    })->name('home');

    Route::group(['prefix' => '/user'], function () {
        Route::get('/', [UserController::class, 'toUser'])->name('user');
        Route::get('/add-user', [UserController::class, 'toRegister'])->name('register');
        Route::post('/add-user', [UserController::class, 'registerControl'])->name('register_user');
        Route::get('/userlist', [UserController::class, 'toUserList'])->name('userlist');
        Route::get('/edit/{user}', [UserController::class, 'toUpdateUser'])->name('edit');
        Route::post('/edit/{user}', [UserController::class, 'toUpdateUser'])->name('update');
        Route::get('/delete/{user}', [UserController::class, 'toDeleteUser'])->name('delete');
        Route::post('/delete-user/{user}', [UserController::class, 'deleteUser'])->name('delete_user');
        Route::post('/delete-user', [UserController::class, 'deleteUsers'])->name('delete_users');
        Route::post('/edit-user/{user}', [UserController::class, 'editUser'])->name('edit_user');
    }
    );
    Route::group(['prefix' => '/category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::get('/add-category', [CategoryController::class, 'toAddCategory'])->name('add_category');
        Route::post('/add-category', [CategoryController::class, 'addCategory'])->name('add_new_category');
        Route::get('/list-category', [CategoryController::class, 'toCategoryList'])->name('list_category');
        Route::get('/edit-category/{category}', [CategoryController::class, 'toEditCategory'])->name('edit_category');
        Route::post('/edit-category/{category}', [CategoryController::class, 'editCategory'])->name('update_category');
        Route::get('/delete-category/{category}', [CategoryController::class, 'toDeleteCategory'])->name('delete_category');
        Route::post('/delete-category/{category}', [CategoryController::class, 'deleteCategory'])->name('delete_category.post');
        Route::post('/delete-categories', [CategoryController::class, 'deleteCategories'])->name('delete_categories');
    }
    );
    Route::group(['prefix' => '/product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('/add-product', [ProductController::class, 'toAddProduct'])->name('add_product');
        Route::post('/add-product', [ProductController::class, 'addProduct'])->name('add_new_product');
        Route::get('/list-product', [ProductController::class, 'toProductList'])->name('list_product');
        Route::get('/edit-product/{product}', [ProductController::class, 'toEditProduct'])->name('edit_product');
        Route::post('/edit-product/{product}', [ProductController::class, 'editProduct'])->name('update_product');
        Route::get('/delete-product/{product}', [ProductController::class, 'toDeleteProduct'])->name('delete_product');
        Route::post('/delete-product/{product}', [ProductController::class, 'deleteProduct'])->name('delete_product.post');
        Route::post('/delete-products', [ProductController::class, 'deleteProducts'])->name('delete_products');
    }
    );
});






