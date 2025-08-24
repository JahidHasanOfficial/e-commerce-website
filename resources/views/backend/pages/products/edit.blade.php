@extends('backend.layouts.master')
@section('title', 'Update Product')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title">
                        <h4 class="mb-0 font-size-18">Update Product</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Update Product</h4>

                            <form action="{{ route('admin.products.update', $product->slug) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Name -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name', $product->name) }}" placeholder="Enter Product Name">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Short Description -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Short Description</label>
                                    <div class="col-md-10">
                                        <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="2">{{ old('short_description', $product->short_description) }}</textarea>
                                        @error('short_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Long Description -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Long Description</label>
                                    <div class="col-md-10">
                                        <textarea name="long_description" class="form-control @error('long_description') is-invalid @enderror" rows="4">{{ old('long_description', $product->long_description) }}</textarea>
                                        @error('long_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Quantity -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Quantity</label>
                                    <div class="col-md-10">
                                        <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror"
                                               value="{{ old('qty', $product->qty) }}" placeholder="Enter Quantity">
                                        @error('qty')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Price</label>
                                    <div class="col-md-10">
                                        <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror"
                                               value="{{ old('price', $product->price) }}" placeholder="Enter Price">
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Old Price -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Old Price</label>
                                    <div class="col-md-10">
                                        <input type="number" step="0.01" name="old_price" class="form-control @error('old_price') is-invalid @enderror"
                                               value="{{ old('old_price', $product->old_price) }}" placeholder="Enter Old Price">
                                        @error('old_price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Discount -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Discount (%)</label>
                                    <div class="col-md-10">
                                        <input type="number" name="discount_price" class="form-control @error('discount_price') is-invalid @enderror"
                                               value="{{ old('discount_price', $product->discount_price) }}" placeholder="Enter Discount">
                                        @error('discount_price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Thumbnail -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Thumbnail</label>
                                    <div class="col-md-10">
                                        <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror">
                                        @if($product->thumbnail)
                                            <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="Thumbnail" class="mt-2" width="100">
                                        @endif
                                        @error('thumbnail')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- First Image -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">First Image</label>
                                    <div class="col-md-10">
                                        <input type="file" name="first_image" class="form-control @error('first_image') is-invalid @enderror">
                                        @if($product->first_image)
                                            <img src="{{ asset('storage/'.$product->first_image) }}" alt="First Image" class="mt-2" width="100">
                                        @endif
                                        @error('first_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Second Image -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Second Image</label>
                                    <div class="col-md-10">
                                        <input type="file" name="second_image" class="form-control @error('second_image') is-invalid @enderror">
                                        @if($product->second_image)
                                            <img src="{{ asset('storage/'.$product->second_image) }}" alt="Second Image" class="mt-2" width="100">
                                        @endif
                                        @error('second_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Third Image -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Third Image</label>
                                    <div class="col-md-10">
                                        <input type="file" name="third_image" class="form-control @error('third_image') is-invalid @enderror">
                                        @if($product->third_image)
                                            <img src="{{ asset('storage/'.$product->third_image) }}" alt="Third Image" class="mt-2" width="100">
                                        @endif
                                        @error('third_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Category</label>
                                    <div class="col-md-10">
                                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Subcategory -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Subcategory</label>
                                    <div class="col-md-10">
                                        <select name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                                            <option value="">-- Select Subcategory --</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}" {{ old('subcategory_id', $product->subcategory_id) == $subcategory->id ? 'selected' : '' }}>
                                                    {{ $subcategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('subcategory_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Childcategory -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Childcategory</label>
                                    <div class="col-md-10">
                                        <select name="childcategory_id" class="form-control @error('childcategory_id') is-invalid @enderror">
                                            <option value="">-- Select Childcategory --</option>
                                            @foreach ($childcategories as $child)
                                                <option value="{{ $child->id }}" {{ old('childcategory_id', $product->childcategory_id) == $child->id ? 'selected' : '' }}>
                                                    {{ $child->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('childcategory_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Brand -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Brand</label>
                                    <div class="col-md-10">
                                        <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                            <option value="">-- Select Brand --</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Color -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Color</label>
                                    <div class="col-md-10">
                                        <select name="color_id[]" class="form-control @error('color_id') is-invalid @enderror" multiple>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}" @if(collect(old('color_id', $product->colors->pluck('id')->toArray()))->contains($color->id)) selected @endif>
                                                    {{ $color->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('color_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Size -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Size</label>
                                    <div class="col-md-10">
                                        <select name="size_id[]" class="form-control @error('size_id') is-invalid @enderror" multiple>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}" @if(collect(old('size_id', $product->sizes->pluck('id')->toArray()))->contains($size->id)) selected @endif>
                                                    {{ $size->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('size_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-10">
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
