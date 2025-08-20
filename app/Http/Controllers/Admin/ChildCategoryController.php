<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Childcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AddChildcategorRequest;
use App\Http\Requests\UpdateChildcategorRequest;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childcategories = Childcategory::with('subcategory')->orderBy('id', 'desc')->get();
        $childcategoriescount = str_pad($childcategories->count(), 2, '0', STR_PAD_LEFT);
        return view('backend.pages.childcategories.index', compact('childcategories', 'childcategoriescount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('backend.pages.childcategories.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddChildcategorRequest $request) : RedirectResponse
    {

        Childcategory::create($request->validated());
        return redirect()->route('admin.childcategories.index')->with('success', 'Childcategory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Childcategory $childcategory)
    {
        abort(404, 'This method is not implemented yet.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Childcategory $childcategory)
    {
        $subcategories = Subcategory::all();
        return view('backend.pages.childcategories.edit', compact('subcategories', 'childcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChildcategorRequest $request, Childcategory $childcategory) : RedirectResponse
    {

        $childcategory->update($request->validated());
        return redirect()->route('admin.childcategories.index')->with('success', 'Childcategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Childcategory $childcategory)
    {
        $childcategory->delete();
        return redirect()->route('admin.childcategories.index')->with('success', 'Childcategory deleted successfully.');
    }
}
