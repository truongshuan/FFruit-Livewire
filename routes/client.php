<?php

use App\Http\Controllers\Clients\AboutController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\ContactController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\SinglePostController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Client\SingleProduct;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/cart', [CartController::class, 'index']);
Route::group(['prefix' => 'news'], function () {
    Route::get('/', [SinglePostController::class, 'index'])->name('news');
    Route::get('/{slug}', [SinglePostController::class, 'show'])
        ->where('slug', '[A-Za-z0-9-]+')
        ->name('new_detail');
});
Route::group(['prefix' => 'shops'], function () {
    Route::get('/', [HomeController::class, 'shop'])->name('shops');
    Route::get('/{slug}', SingleProduct::class)->name('detail');
});

// Authencation
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    Route::get('checkout', [HomeController::class, 'checkout']);
    Route::get('/thank', [HomeController::class, 'thank'])->name('thank');
});
