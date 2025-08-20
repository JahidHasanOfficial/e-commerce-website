<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AddSubCategryRequest;
use App\Http\Requests\UpdateSubCategryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $subcategories = Subcategory::with('category')->orderBy('id', 'desc')->get();
        $SubCategoryCount = str_pad($subcategories->count(), 2, '0', STR_PAD_LEFT);

        return view('backend.pages.subcategories.index', compact('subcategories', 'SubCategoryCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.pages.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddSubCategryRequest $request): RedirectResponse
    {

        Subcategory::create($request->validated());
        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        abort(404, 'This method is not implemented yet.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
{
    $categories = Category::all();
    return view('backend.pages.subcategories.edit', compact('categories', 'subcategory'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategryRequest $request, Subcategory $subcategory)
    {
        $subcategory->update($request->validated());
        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}
