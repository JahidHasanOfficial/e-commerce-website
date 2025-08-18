<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAdminController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/admin/login', [AdminAdminController::class, 'login'])->name('admin.login');
Route::post('/admin/auth', [AdminAdminController::class, 'auth'])->name('admin.auth');
Route::post('/admin/logout', [AdminAdminController::class, 'logout'])->name('admin.logout');

// Route::get('/dashboard', [AdminAdminController::class, 'index'])->name('admin.dashboard');

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminAdminController::class, 'index'])->name('admin.index');
});



//======================================Frontend Section======================================


Route::get('/product-details', [HomeController::class, 'productDetails'])->name('product.details');
Route::get('/shops', [HomeController::class, 'product'])->name('product');
Route::get('/contacts', [HomeController::class, 'contact'])->name('contact');
Route::get('/abouts', [HomeController::class, 'about'])->name('frontend.about');
Route::get('/contacts', [HomeController::class, 'contact'])->name('contact');
Route::get('/faqs', [HomeController::class, 'faq'])->name('frontend.faq');
Route::get('/helps', [HomeController::class, 'help'])->name('frontend.help');