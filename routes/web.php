<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\SaveForLaterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Auth::loginUsingId(1);

// Product
Route::controller(ProductController::class)->group(function () {
    Route::get('/','index')->name('products.index');
    Route::get('/products/{product:slug}','show')->name('products.show');
});


// Shop
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');


// default cart
Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/cart',[CartController::class,'store'])->name('cart.store');
Route::delete('/cart/{id}',[CartController::class,'destroy'])->name('cart.delete');
Route::put('/cart/{id}',[CartController::class,'update'])->name('cart.update');



// saveForLater cart
Route::delete('/saveForLater/{id}',[SaveForLaterController::class,'destroy'])->name('saveForLater.delete');
Route::put('/saveForLater/{id}',[SaveForLaterController::class,'update'])->name('saveForLater.update');


Route::get('/remove',fn()=>\inertia('Cart/remove'));

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


