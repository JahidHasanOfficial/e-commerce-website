<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Termwind\Components\Raw;
use App\Models\Childcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{

    private array $imageFields = [
        'thumbnail', 'first_image', 'second_image', 'third_image'
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all()->withRelationshipAutoloading();
         $productCount = str_pad($products->count(), 2, '0', STR_PAD_LEFT);

        return view('backend.pages.products.index', compact('products' ,'productCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.products.create')->with($this->getProductFormData());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductRequest $request) : RedirectResponse
    {
        $data = $request->validated();

// check if the admin sent all the images
        foreach ($this->imageFields as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $this->saveImage($request->file($field));
            }
        }

        // calculate discount if old price is present
        if($request->old_price > 0 && $request->old_price > $request->price){
           $data['old_price'] = $request->old_price;
           $data['discount_price'] = round((($request->old_price - $request->price) / $request->old_price) * 100);
        }
        // store the product
        $product = Product::create($data);

        // add product colors
        $product->colors()->sync($request->color_id);

        // add product sizes
        $product->sizes()->sync($request->size_id);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully');


      
    }



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('backend.pages.products.edit')->with(array_merge($this->getProductFormData(), ['product' => $product]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
    {
        $data = $request->validated();

// check if the admin sent all the images
        foreach ($this->imageFields as $field) {
            if ($request->hasFile($field)) {
                // remove the old image from storage
                 $this->removeProductImageFromStorage($request->$field);
                // save the new image
                $data[$field] = $this->saveImage($request->file($field));
            }
        }

        // calculate discount if old price is present
        if($request->old_price > 0 && $request->old_price > $request->price){
           $data['old_price'] = $request->old_price;
           $data['discount'] = round((($request->old_price - $request->price) / $request->old_price) * 100);
        }
        //change thee status of the product 
        $data['status'] = $request->status;

        // update the product
        $product->update($data);

        // add product colors
        $product->colors()->sync($request->color_id);

        // add product sizes
        $product->sizes()->sync($request->size_id);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // remove product images from storage
        foreach ($this->imageFields as $field) {
            $this->removeProductImageFromStorage($product->$field);
        }

        // delete the product
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }

    /**
     * Save image to storage and return the path
     */ 
    // public function saveImage($file) 
    // {
    //     $image_name = time() . '_' . $file->getClientOriginalExtension();
    //    $path = $file->storeAs('images/products', $image_name, 'public');
    //    // return the path 
    //      return $path;
    // }

    public function saveImage($file)
{
    if (!$file) {
        return null; // jodi file na thake
    }

    // filename generate: time_stamp_originalname
    $filename = time() . '_' . $file->getClientOriginalName();

    // store the file in storage/app/public/images/products
    $path = $file->storeAs('images/products', $filename, 'public');

    // return the public path to save in database
    return 'images/products/' . $filename;
}


    /**
     * Remove product image from storage
     */ 
    // public function removeProductImageFromStorage($file) 
    // {
    //    $path = str_replace('storage/', '', $file);
    //    if(Storage::disk('public')->exists($path)){
    //     Storage::disk('public')->delete($path);
    //    }
    // }

    public function removeProductImageFromStorage($file) 
{
    if (!$file) return false; // file empty hole kichu korbe na

    // database path e jodi 'storage/' thake, remove kore storage disk e match korano
    $path = str_replace('storage/', '', $file);

    if (Storage::disk('public')->exists($path)) {
        return Storage::disk('public')->delete($path); // true/false return kore
    }

    return false; // file exist kore nai
}


    /**
     * Get product form data
     */ 
    public function getProductFormData() 
    {
        return [
            'categories' => Category::all(),
            'subcategories' => Subcategory::all(),
            'childcategories' => Childcategory::all(),
            'brands' => Brand::all(),
            'colors' => Color::all(),
            'sizes' => Size::all()
        ];
    }



}
