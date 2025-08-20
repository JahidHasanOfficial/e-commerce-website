<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AddBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        $brandscount = str_pad($brands->count(), 2, '0', STR_PAD_LEFT);
        return view('backend.pages.brands.index', compact('brands', 'brandscount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backend.pages.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddBrandRequest $request) : RedirectResponse
    {

        Brand::create($request->validated());
        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        abort(404, 'This method is not implemented yet.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('backend.pages.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand) : RedirectResponse
    {
        $brand->update($request->validated());
        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully.');
    }
}
