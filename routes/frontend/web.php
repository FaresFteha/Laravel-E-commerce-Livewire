<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Front-End Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [HomeController::class, 'index'])->name('wellcomeHomePage');
Route::get('Collections/{category_slug}',  [HomeController::class, 'productsOfSlug'])->name('collections.categoriesSlug');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

Route::get('collections/{category_slug}/{product_slug}', [HomeController::class, 'productView'])->name('productView');

Route::middleware(['auth'])->group(function () {
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('myaccount', [OrderController::class, 'index'])->name('myaccount');
    Route::get('order/{id}', [OrderController::class, 'show'])->name('frontend.order.show');
});

Route::get('thank-you', [CheckoutController::class, 'thankYou'])->name('thank-you');
Route::get('searchallproduct', [HomeController::class, 'searchProduct'])->name('search');

Route::post('UpdateUser', [UserController::class, 'updateUserDetails'])->name('UpdateUser');

Route::get('show-change-password', [UserController::class, 'changePassword'])->name('user.changePassword');
Route::post('change-password', [UserController::class, 'updateChangePassword'])->name('changePassword');
