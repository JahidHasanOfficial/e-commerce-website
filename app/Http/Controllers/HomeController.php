<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('frontend.home', compact('products'));
    }
    public function productDetails()
    {
        return view('frontend.pages.product-details');
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
