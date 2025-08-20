@extends('backend.layouts.master')
@section('title', 'Update Colors')
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Update Colors</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Colors</a></li>
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

                                <h4 class="card-title">Update Colors</h4>

                                <form action="{{ route('admin.colors.update', $color->slug) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Name</label>
                                        <div class="col-md-10">
                                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $color->name) }}" placeholder="Enter Colors Name">
                                            @error('name')
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
