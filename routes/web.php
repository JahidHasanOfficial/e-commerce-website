<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Route::get('/dashboard', [AdminAdminController::class, 'index'])->name('admin.dashboard');

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');

    //Category Routes
    Route::resource('categories', CategoryController::class, [
        'names' => [
            'index' => 'categories.index',
            'create' => 'categories.create',
            'store' => 'categories.store',
            'edit' => 'categories.edit',
            'update' => 'categories.update',
            'destroy' => 'categories.destroy',
        ]
    ]);

    //SubCategory Routes
    Route::resource('subcategories', SubCategoryController::class, [
        'names' => [
            'index' => 'subcategories.index',
            'create' => 'subcategories.create',
            'store' => 'subcategories.store',
            'edit' => 'subcategories.edit',
            'update' => 'subcategories.update',
            'destroy' => 'subcategories.destroy',
        ]
        ]);

        // ChildCategory Routes
        Route::resource('childcategories', ChildCategoryController::class, [
            'names' => [
                'index' => 'childcategories.index',
                'create' => 'childcategories.create',
                'store' => 'childcategories.store',
                'edit' => 'childcategories.edit',
                'update' => 'childcategories.update',
                'destroy' => 'childcategories.destroy',
            ]
            ]);

        // Brands Routes
        Route::resource('brands', BrandController::class, [
            'names' => [
                'index' => 'brands.index',
                'create' => 'brands.create',
                'store' => 'brands.store',
                'edit' => 'brands.edit',
                'update' => 'brands.update',
                'destroy' => 'brands.destroy',
            ]
            ]);  
            
         // Colors Routes
         Route::resource('colors', ColorController::class, [
            'names' => [
                'index' => 'colors.index',
                'create' => 'colors.create',
                'store' => 'colors.store',
                'edit' => 'colors.edit',
                'update' => 'colors.update',
                'destroy' => 'colors.destroy',
            ]
            ]); 
            
    // Sizes Routes
    Route::resource('sizes', SizeController::class, [
        'names' => [
            'index' => 'sizes.index',
            'create' => 'sizes.create',
            'store' => 'sizes.store',
            'edit' => 'sizes.edit',
            'update' => 'sizes.update',
            'destroy' => 'sizes.destroy',
        ]
    ]);

    // Products Routes
    Route::resource('products', ProductController::class, [
        'names' => [
            'index' => 'products.index',
            'create' => 'products.create',
            'store' => 'products.store',                    
            'edit' => 'products.edit',
            'update' => 'products.update',
            'destroy' => 'products.destroy',
        ]
    ]);
});



//======================================Frontend Section======================================


Route::get('/product-details', [HomeController::class, 'productDetails'])->name('product.details');
Route::get('/shops', [HomeController::class, 'product'])->name('product');
Route::get('/contacts', [HomeController::class, 'contact'])->name('contact');
Route::get('/abouts', [HomeController::class, 'about'])->name('frontend.about');
Route::get('/contacts', [HomeController::class, 'contact'])->name('contact');
Route::get('/faqs', [HomeController::class, 'faq'])->name('frontend.faq');
Route::get('/helps', [HomeController::class, 'help'])->name('frontend.help');