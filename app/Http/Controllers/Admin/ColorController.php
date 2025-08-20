<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use Termwind\Components\Raw;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AddColorRequest;
use App\Http\Requests\UpdateColorRequest;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::orderBy('id', 'desc')->get();
        $colorscount = str_pad($colors->count(), 2, '0', STR_PAD_LEFT);
        return view('backend.pages.colors.index', compact('colors', 'colorscount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddColorRequest $request) : RedirectResponse
    {
        Color::create($request->validated());
        return redirect()->route('admin.colors.index')->with('success', 'Color created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        abort(404, 'This method is not implemented yet.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('backend.pages.colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColorRequest $request, Color $color) : RedirectResponse
    {
        $color->update($request->validated());
        return redirect()->route('admin.colors.index')->with('success', 'Color updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('admin.colors.index')->with('success', 'Color deleted successfully.'); 
    }
}
