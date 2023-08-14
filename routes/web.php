<?php

use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\web\MailController;
use App\Http\Controllers\web\PasswordController;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\UserController;
use Illuminate\Support\Facades\Route;
use App\Jobs\SendEmailJob;

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
Route::get('/welcome-mail/{id}', [MailController::class, 'welcome'])->name('welcome.mail');
Route::get('/register', [UserController::class, 'toRegisterNew'])->name('register.new');
Route::post('/register-new', [UserController::class, 'registerNewUser'])->name('register.new.post');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
        return view('homepage');
    })->name('home');

    Route::group(
        [
            'prefix' => '/user',
            'controller' => UserController::class,
        ],
        function () {
        Route::get('/', 'toUser')->name('user');
        Route::get('/add-user', 'toRegister')->name('register');
        Route::post('/add-user', 'registerControl')->name('register_user');
        Route::get('/userlist', 'toUserList')->name('userlist');
        Route::get('/edit/{user}', 'toUpdateUser')->name('edit');
        Route::post('/edit/{user}', 'toUpdateUser')->name('update');
        Route::get('/delete/{user}', 'toDeleteUser')->name('delete');
        Route::post('/delete-user/{user}', 'deleteUser')->name('delete_user');
        Route::post('/delete-user', 'deleteUsers')->name('delete_users');
        Route::post('/edit-user/{user}', 'editUser')->name('edit_user');
    }
    );
    Route::group(
        [
            'prefix' => '/category',
            'controller' => CategoryController::class,
        ],
        function () {
        Route::get('/', 'index')->name('category');
        Route::get('/add-category','toAddCategory')->name('add_category');
        Route::post('/add-category','addCategory')->name('add_new_category');
        Route::get('/list-category','toCategoryList')->name('list_category');
        Route::get('/edit-category/{category}','toEditCategory')->name('edit_category');
        Route::post('/edit-category/{category}','editCategory')->name('update_category');
        Route::get('/delete-category/{category}','toDeleteCategory')->name('delete_category');
        Route::post('/delete-category/{category}','deleteCategory')->name('delete_category.post');
        Route::post('/delete-categories','deleteCategories')->name('delete_categories');
    }
    );
    Route::group(
        [
            'prefix' => '/product',
            'controller' => ProductController::class,
        ],
        function () {
        Route::get('/', 'index')->name('product');
        Route::get('/add-product', 'toAddProduct')->name('add_product');
        Route::post('/add-product', 'addProduct')->name('add_new_product');
        Route::get('/list-product', 'toProductList')->name('list_product');
        Route::get('/edit-product/{product}', 'toEditProduct')->name('edit_product');
        Route::post('/edit-product/{product}', 'editProduct')->name('update_product');
        Route::get('/delete-product/{product}', 'toDeleteProduct')->name('delete_product');
        Route::post('/delete-product/{product}', 'deleteProduct')->name('delete_product.post');
        Route::post('/delete-products', 'deleteProducts')->name('delete_products');
    }
    );
});






