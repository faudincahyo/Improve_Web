<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// Route UserHome
Route::get('/user', [App\Http\Controllers\HomeController::class, 'homeuser'])->name('homeuser');
//Route button add product
Route::get('/add-to-product{id}', [App\Http\Controllers\HomeController::class, 'addToCart'])->name('add_to_cart');
//Route cart
Route::get('cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');
//Route update cart
Route::patch('update-cart', [App\Http\Controllers\HomeController::class, 'update'])->name('update_cart');
//Route delete cart
Route::delete('remove-from-cart', [App\Http\Controllers\HomeController::class, 'remove'])->name('remove_from_cart');
//Route About Page
Route::get('about', [App\Http\Controllers\AboutController::class, 'index'])->name('about_page');
//Route Contact mail
Route::post('contact-us', [App\Http\Controllers\AboutController::class, 'store'])->name('contact.store');
//Route Product Page
Route::get('user-product', [App\Http\Controllers\HomeController::class, 'prdcuser'])->name('product_page');





// Route::get('/product', [App\Http\Controllers\HomeController::class, 'product'])->name('list.product');
// Route::get('/product/{slug}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
// Route::get('/cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');
// Route::post('/cart', [App\Http\Controllers\HomeController::class, 'add_to_cart'])->name('add_to_cart');
// Route::delete('/cart/{id}', [App\Http\Controllers\HomeController::class, 'destroy_cart_product'])->name('destroy_cart_product');


Route::get('auth/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('google.login');

Auth::routes();
Route::get('/auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);

// prefixs url, seluruh url mengandung awalan v1
// contoh http://127.0.0.1:8000/v1/product dan seterusnya
Route::prefix('v1')->middleware('role:admin')->group(function () {

    // dashboard 
    Route::get('', [App\Http\Controllers\Backend\IndexController::class, 'index'])->name('dashboard');

    // route product
    Route::resource('product', App\Http\Controllers\Backend\ProductController::class);

    // route users
    Route::resource('users', App\Http\Controllers\Backend\ProductController::class);

    //route list user
    Route::get('list-user', [App\Http\Controllers\Backend\ProductController::class, 'listuser'])->name('list.user');
    
    // route orders
    Route::get('orderan', [App\Http\Controllers\Backend\OrderanController::class, 'index'])->name('orderan.index');

    // route reviews
    Route::get('review', [App\Http\Controllers\Backend\ReviewController::class, 'index'])->name('review.index');

});
