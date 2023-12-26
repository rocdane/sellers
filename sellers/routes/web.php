<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdminController;

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

Route::name('guest.')->group(function(){
    Route::get('/', [GuestController::class, 'home'])->name('home');
    Route::get('/product', [GuestController::class, 'product'])->name('product');
    Route::get('/product/{id}', [GuestController::class, 'item'])->name('item');
    Route::get('/help', [GuestController::class, 'help'])->name('help');
    Route::get('/about', [GuestController::class, 'about'])->name('about');
    Route::get('/contact', [GuestController::class, 'contact'])->name('contact');
    Route::post('/contact', [GuestController::class, 'send'])->name('send');
    Route::get('/pick/{id}', [GuestController::class, 'pick'])->name('pick');
    Route::get('/drop/{id}', [GuestController::class, 'drop'])->name('drop');
    Route::get('/order', [GuestController::class, 'order'])->name('order');
    Route::post('/order', [GuestController::class, 'confirm'])->name('confirm');
    Route::get('/cgv', [GuestController::class, 'cgv'])->name('cgv');
    Route::get('/policy', [GuestController::class, 'policy'])->name('policy');
    Route::get('/legal', [GuestController::class, 'legal'])->name('legal');
});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/profile', [AdminController::class, 'edit'])->name('profile');
    Route::post('/profile', [AdminController::class, 'apply'])->name('apply');
    Route::post('/profile/bank', [AdminController::class, 'save'])->name('save');

    Route::get('/category', [AdminController::class, 'category'])->name('category');
    Route::get('/category/create', [AdminController::class, 'create'])->name('create');
    Route::post('/category', [AdminController::class, 'set'])->name('set');
    Route::post('/category/delete/{category}', [AdminController::class, 'delete'])->name('delete');

    Route::get('/product', [AdminController::class, 'product'])->name('product');
    Route::get('/product/ads', [AdminController::class, 'ads'])->name('ads');
    Route::post('/product', [AdminController::class, 'add'])->name('add');
    Route::post('/product/archive/{product}', [AdminController::class, 'archive'])->name('archive');

    Route::get('/order', [AdminController::class, 'order'])->name('order');
    Route::get('/order/{id}', [AdminController::class, 'view'])->name('view');
    Route::get('/order/confirm/{id}', [AdminController::class, 'confirm'])->name('confirm');
    Route::get('/order/cancel/{id}', [AdminController::class, 'cancel'])->name('cancel');

    Route::get('/package', [AdminController::class, 'package'])->name('package');
    Route::get('/package/wrap', [AdminController::class, 'wrap'])->name('wrap');
    Route::post('/package/ship', [AdminController::class, 'ship'])->name('ship');
    Route::post('/package/destroy', [AdminController::class, 'destroy'])->name('destroy');
});

