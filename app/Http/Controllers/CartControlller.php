<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    private array $cart;

    public function __construct()
    {
        $this->cart = session()->get('cart', []);
    }

    public function index()
    {
        $cart = $this->cart;
        return view('frontend.pages.cart', compact('cart'));
    }

    public function addToCart(Request $request): RedirectResponse
    {
        if ($request->has(['size', 'color'])) {
            $product = Product::findOrFail($request->product_id);

            $key = $this->generateCartKey($product->id, $request->size, $request->color);

            if (isset($this->cart[$key])) {
                return redirect()->back()->with('error', 'Product is already in the cart.');
            }

            $this->cart[$key] = [
                'name'       => $product->name,
                'price'      => $product->price,
                'qty'        => $request->qty,
                'image'      => $product->first_image,
                'size'       => $request->size,
                'color'      => $request->color,
                'coupon_id'  => session()->has('applied_coupon') ? session()->get('applied_coupon')['id'] : null,
            ];

            session()->put('cart', $this->cart);
            $this->calculateCartTotals();

            return redirect()->back()->with('success', 'Product added to cart successfully.');
        } else {
            return redirect()->back()->with('error', 'Please select size and color.');
        }
    }

    public function calculateCartTotals(): void
    {
        $subtotal = 0;
        $totalQty = 0;

        foreach ($this->cart as $item) {
            $subtotal += $item['price'] * $item['qty'];
            $totalQty += $item['qty'];
        }

        session()->put('cart_subtotal', $subtotal);
        session()->put('cart_total_qty', $totalQty);
    }

    private function generateCartKey($productId, $size, $color): string
    {
        return md5($productId . '_' . $size . '_' . $color);
    }
}
