<?php

use App\Http\Livewire\Admin\Categories\Categories;
use App\Http\Livewire\Admin\Categories\AddCategory;
use App\Http\Livewire\Admin\Categories\EditCategory;
use App\Http\Livewire\Admin\Products\Products;
use App\Http\Livewire\Admin\Products\AddProduct;
use App\Http\Livewire\Admin\Products\EditProduct;
use App\Http\Livewire\Admin\Posts\Posts;
use App\Http\Livewire\Admin\Posts\AddPost;
use App\Http\Livewire\Admin\Posts\EditPost;
use App\Http\Livewire\Admin\Topics\Topics;
use App\Http\Livewire\Admin\Topics\AddTopic;
use App\Http\Livewire\Admin\Topics\EditTopic;
use App\Http\Livewire\Admin\Customers\Customers;
use App\Http\Livewire\Admin\Orders\Orders;
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

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('admin.pages.index');
    });
    Route::get('/customers', Customers::class)->name('customers');
    Route::get('/orders', Orders::class)->name('orders');
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', Categories::class)->name('categories');
        Route::get('/add', AddCategory::class)->name('addCategory');
        Route::get('/edit/{id?}', EditCategory::class)->name('editCategory');
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', Products::class)->name('products');
        Route::get('/add', AddProduct::class)->name('addProduct');
        Route::get('/edit/{id?}', EditProduct::class)->name('editProduct');
    });
    Route::group(['prefix' => 'topics'], function () {
        Route::get('/', Topics::class)->name('topics');
        Route::get('/add', AddTopic::class)->name('addTopic');
        Route::get('/edit/{id?}', EditTopic::class)->name('editTopic');
    });
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', Posts::class)->name('posts');
        Route::get('/add', AddPost::class)->name('addPost');
        Route::get('/edit/{id?}', EditPost::class)->name('editPost');
    });
});
