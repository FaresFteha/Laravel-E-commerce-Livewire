<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\HomeController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Category\ColorController;
use App\Http\Controllers\Backend\Category\ProductController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\Slaeder\SlaederController;
use App\Http\Livewire\BackEnd\Brand\Index;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboared', [HomeController::class, 'index'])->name('index');

    Route::prefix('categories')->group(function () {
        Route::resource('category', CategoryController::class);
    });

    Route::prefix('brands')->group(function () {
        Route::get('/brand', Index::class)->name('brand.index');
    });

    Route::prefix('products')->group(function () {
        Route::resource('product', ProductController::class);
        Route::get('product-image-delete/{id}', [ProductController::class, 'deleteImageProduct'])->name('product-image-delete');
        Route::post('product-color-Update/{prod_color_id}', [ProductController::class, 'updateProductColorQuantity']);
        Route::get('product-color-Delete/{prod_color_id}/delete', [ProductController::class, 'deleteProductColorQuantity']);
    });

    Route::prefix('colors')->group(function () {
        Route::resource('color', ColorController::class);
    });

    Route::prefix('sliders')->group(function () {
        Route::resource('slider', SlaederController::class);
    });

    Route::prefix('orders')->group(function () {
        Route::get('order', [OrderController::class, 'index'])->name('order.index');
        Route::get('show/{id}', [OrderController::class, 'show'])->name('order.show');
        Route::post('status-update/{OrderId}', [OrderController::class, 'updateStatus'])->name('order.statusupdate');
        Route::get('download/{id}', [OrderController::class, 'download'])->name('order.download');
        Route::get('invocicePdf/{id}', [OrderController::class, 'invocicePdf'])->name('order.invocicePdf');
        Route::get('invociceMail/{OrderId}', [OrderController::class, 'invociceMail'])->name('order.invocice.mail');
    });


    Route::prefix('users')->group(function () {
        Route::resource('user', AdminController::class);

    });
});
