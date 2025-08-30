<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Childcategory;

class HomeController extends Controller
{
    //

public function index()
{
    $categories = Category::withCount('products')->orderBy('id', 'desc')->get();
    $products = Product::orderBy('id', 'desc')->get();

    return view('frontend.home', compact('products', 'categories'));
}

  public function productDetails($slug)
{
    // Product fetch by slug with relationships
    $product = Product::with(['brand', 'colors', 'sizes'])->where('slug', $slug)->firstOrFail();
    
    return view('frontend.pages.product-details', compact('product'));
}












    public function product()
    {
        return view('frontend.pages.product');
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function about()
    {
        return view('frontend.pages.about');
    }
    public function faq()
    {
        return view('frontend.pages.faq');
    }
}
