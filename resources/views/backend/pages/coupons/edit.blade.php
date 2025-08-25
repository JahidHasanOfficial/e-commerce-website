@extends('backend.layouts.master')
@section('title', 'Update Coupons')
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Edit Coupons</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Coupons</a></li>
                                <li class="breadcrumb-item active">Update</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Start Page-content-Wrapper -->
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Update Coupons</h4>

                                <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Name</label>
                                        <div class="col-md-10">
                                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $coupon->name) }}" placeholder="Enter Your Name">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Discount (%)</label>
                                        <div class="col-md-10">
                                            <input class="form-control @error('discount') is-invalid @enderror" type="number" name="discount" value="{{ old('discount', $coupon->discount) }}" placeholder="Enter Discount Percentage">
                                            @error('discount')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- expires_at --}}
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Expires At</label>
                                        <div class="col-md-10">
                                            <input class="form-control @error('expires_at') is-invalid @enderror" type="date" name="expires_at" value="{{ old('expires_at', $coupon->expires_at ? date('Y-m-d', strtotime($coupon->expires_at)) : '') }}"
 placeholder="Enter Expiry Date">
                                            @error('expires_at')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
