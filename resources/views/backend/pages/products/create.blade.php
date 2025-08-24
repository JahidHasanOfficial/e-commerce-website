@extends('backend.layouts.master')
@section('title', 'Create Products')
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Create Products</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Start Page-content-Wrapper -->
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Create Products</h4>

                                <form action="{{ route('admin.products.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <!-- Name -->
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" placeholder="Enter Product Name">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Short Description -->
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Short Description</label>
                                        <div class="col-md-10">
                                            <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="2">{{ old('short_description') }}</textarea>
                                            @error('short_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Long Description -->
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Long Description</label>
                                        <div class="col-md-10">
                                            <textarea name="long_description" class="form-control @error('long_description') is-invalid @enderror" rows="4">{{ old('long_description') }}</textarea>
                                            @error('long_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Quantity -->
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Quantity</label>
                                        <div class="col-md-10">
                                            <input type="number" name="qty"
                                                class="form-control @error('qty') is-invalid @enderror"
                                                value="{{ old('qty') }}" placeholder="Enter Quantity">
                                            @error('qty')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Price -->
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Price</label>
                                        <div class="col-md-10">
                                            <input type="number" step="0.01" name="price"
                                                class="form-control @error('price') is-invalid @enderror"
                                                value="{{ old('price') }}" placeholder="Enter Price">
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Old Price -->
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Old Price</label>
                                        <div class="col-md-10">
                                            <input type="number" step="0.01" name="old_price"
                                                class="form-control @error('old_price') is-invalid @enderror"
                                                value="{{ old('old_price') }}" placeholder="Enter Old Price">
                                            @error('old_price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Discount -->
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Discount (%)</label>
                                        <div class="col-md-10">
                                            <input type="number" name="discount_price"
                                                class="form-control @error('discount_price') is-invalid @enderror"
                                                value="{{ old('discount_price') }}" placeholder="Enter Discount">
                                            @error('discount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Thumbnail -->
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Thumbnail</label>
                                        <div class="col-md-10">
                                            <input type="file" name="thumbnail"
                                                class="form-control @error('thumbnail') is-invalid @enderror">
                                            @error('thumbnail')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- First Image -->
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">First Image</label>
                                        <div class="col-md-10">
                                            <input type="file" name="first_image"
                                                class="form-control @error('first_image') is-invalid @enderror">
                                            @error('first_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Second Image -->
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Second Image</label>
                                        <div class="col-md-10">
                                            <input type="file" name="second_image"
                                                class="form-control @error('second_image') is-invalid @enderror">
                                            @error('second_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Third Image -->
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Third Image</label>
                                        <div class="col-md-10">
                                            <input type="file" name="third_image"
                                                class="form-control @error('third_image') is-invalid @enderror">
                                            @error('third_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Category -->
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Category</label>
                                        <div class="col-md-10">
                                            <select name="category_id"
                                                class="form-control @error('category_id') is-invalid @enderror">
                                                <option value="">-- Select Category --</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                            <select name="subcategory_id"
                                                class="form-control @error('subcategory_id') is-invalid @enderror">
                                                <option value="">-- Select Subcategory --</option>
                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
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
                                            <select name="childcategory_id"
                                                class="form-control @error('childcategory_id') is-invalid @enderror">
                                                <option value="">-- Select Childcategory --</option>
                                                @foreach ($childcategories as $child)
                                                    <option value="{{ $child->id }}"
                                                        {{ old('childcategory_id') == $child->id ? 'selected' : '' }}>
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
                                            <select name="brand_id"
                                                class="form-control @error('brand_id') is-invalid @enderror">
                                                <option value="">-- Select Brand --</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
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
                                    <!-- Color -->
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Color</label>
                                        <div class="col-md-10">
                                            <select name="color_id[]"
                                                class="form-control @error('color_id') is-invalid @enderror" multiple>
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color->id }}"
                                                        @if (collect(old('color_id'))->contains($color->id)) selected @endif>
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
                                            <select name="size_id[]"
                                                class="form-control @error('size_id') is-invalid @enderror" multiple>
                                                @foreach ($sizes as $size)
                                                    <option value="{{ $size->id }}"
                                                        @if (collect(old('size_id'))->contains($size->id)) selected @endif>
                                                        {{ $size->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('size_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>





                                    <!-- Submit -->
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
