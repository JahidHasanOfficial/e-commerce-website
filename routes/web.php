<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [AdminAdminController::class, 'login'])->name('admin.login');
Route::post('/admin/auth', [AdminAdminController::class, 'auth'])->name('admin.auth');
Route::post('/admin/logout', [AdminAdminController::class, 'logout'])->name('admin.logout');

// Route::get('/dashboard', [AdminAdminController::class, 'index'])->name('admin.dashboard');

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminAdminController::class, 'index'])->name('admin.index');
});

