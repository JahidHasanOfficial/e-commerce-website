<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddSizeRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdateSizeRequest;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::orderBy('id', 'desc')->get();
        $sizecount = str_pad($sizes->count(), 2, '0', STR_PAD_LEFT);
        return view('backend.pages.sizes.index', compact('sizes', 'sizecount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddSizeRequest $request) : RedirectResponse
    {
        Size::create($request->validated());
        return redirect()->route('admin.sizes.index')->with('success', 'Size created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        abort(404, 'This method is not implemented yet.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('backend.pages.sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSizeRequest $request, Size $size) : RedirectResponse
    {
        $size->update($request->validated());
        return redirect()->route('admin.sizes.index')->with('success', 'Size updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return redirect()->route('admin.sizes.index')->with('success', 'Size deleted successfully.');
    }
}
