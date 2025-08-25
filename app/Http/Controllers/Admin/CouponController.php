<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AddCouponRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateCouponRequest;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        $couponCount = str_pad($coupons->count(), 2, '0', STR_PAD_LEFT);
        return view('backend.pages.coupons.index', compact('coupons', 'couponCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCouponRequest $request) : RedirectResponse
    {
        $data = $request->validated();
        Coupon::create($data);
        return Redirect::route('admin.coupons.index')->with('success', 'Coupon created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id)
{
    $coupon = Coupon::findOrFail($id);
    return view('backend.pages.coupons.edit', compact('coupon'));
}

public function update(UpdateCouponRequest $request, $id) : RedirectResponse
{
    $data = $request->validated();

    $coupon = Coupon::findOrFail($id);
    $coupon->update($data);

    return Redirect::route('admin.coupons.index')
        ->with('success', 'Coupon updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $coupon = Coupon::findOrFail($id); // id দিয়ে খুঁজে বের করা
    $coupon->delete();

    return Redirect::route('admin.coupons.index')
        ->with('success', 'Coupon deleted successfully.');
}

}
