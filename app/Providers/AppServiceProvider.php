<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         // সব view এ $globalCategories variable automatically available থাকবে
   View::composer('*', function ($view) {
    $view->with('globalCategories', Category::with(['subcategories.childcategories'])->get());
});



    }
}
