<?php

namespace App\Http\Controllers;

use view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Http\RedirectResponse;

class CartControlller extends Controller
{
    private array $cart;

    public function __construct()
    {
        $this->cart = session()->get('cart', []);
    }

    public function index() 
    {
       $cart = $this->cart;

       // get cart items form the session
        return view('frontend.pages.cart', compact('cart'));
    }

    public function addToCart(Request $request) : RedirectResponse
    {
       if($request->has(['size', 'color'])) {

        // find and get the product by id
        $product = Product::findOrFail($request->product_id);
        //generate a unique key for the cart item
        $key = $this->generateCartKey($product->id, $request->size, $request->color);

        // check if the product is already in the cart
        if(isset($this->cart[$key])) {
            return redirect()->back()->with('error', 'Product is already in the cart.');
        }
}else{
    $this->cart[$key] = [
    'name' => $product->name,
    'price' => $product->price,
    'qty' => $request->qty,
     'image' => $product->image,
    'size' => $request->size,
    'color' => $request->color,
    'coupon_id' => session()->has('applied_coupon') ? session()->hash('applied_coupon')['id'] : null,
   
   ];
    // save the cart back to the session
    session()->put('cart', $this->cart);
    $this->calculateCartTotals();

    return redirect()->back()->with('success', 'Product added to cart successfully.');
    }
}else{
    return redirect()->back()->with('error', 'Please select size and color.');
}
}

}

    