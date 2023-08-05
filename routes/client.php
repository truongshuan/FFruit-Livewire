<?php

use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\SinglePostController;
use App\Http\Livewire\Client\SingleProduct;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', function () {
    return view('client.pages.contact');
})->name('contact');
Route::get('/about', function () {
    return view('client.pages.about');
})->name('about');
Route::get('/cart', function () {
    return view('client.pages.cart');
});
Route::group(['prefix' => 'news'], function () {
    Route::get('/', function () {
        return view('client.pages.news');
    })->name('news');
    Route::get('/{slug}', [SinglePostController::class, 'show'])->where('slug', '[A-Za-z0-9-]+')->name('new_detail');
});
Route::group(['prefix' => 'shops'], function () {
    Route::get('/', function () {
        return view('client.pages.shop');
    })->name('shops');
    Route::get('/{slug}', SingleProduct::class)->name('detail');
});