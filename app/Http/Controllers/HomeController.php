<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Termwind\Components\Raw;
use App\Models\Childcategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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



public function orderProduct(Request $request) : View |  RedirectResponse

{
    if($request->input('field')){
        //get the field  and check if exists
        $allowedFields = ['name', 'price', 'created_at'];
        $field =  in_array($request->input('field'), $allowedFields) ? $request->input('field') : 'name';
        
        //get the direction  and check if exists
        $allowedDirections = ['asc', 'desc'];
        $direction = in_array($request->input('direction'), $allowedDirections) ? $request->input('direction') : 'asc';
        
        // get products ordered by field and direction
        $products = Product::orderBy($field, $direction)->paginate(10);
        
        // return view with ordered products
        return view('frontend.pages.product', compact('products'));
    }else{
        return redirect()->route('home')->with('error', 'Please choose a field to order by.');
    }
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
