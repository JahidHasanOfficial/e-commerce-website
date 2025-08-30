@extends('backend.layouts.master')
@section('title', 'Social Links')
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Social Links</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Social Links</a></li>
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

                                <h4 class="card-title">Social Links</h4>

                               <form action="{{ route('admin.social_links.update', $socialLink->id) }}" method="POST" enctype="multipart/form-data" class="p-4 bg-white shadow-sm rounded">
    @csrf
    @method('PUT')

    <h4 class="mb-4">Update Social Links</h4>

    @php
        $platforms = ['facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'tiktok', 'pinterest', 'snapchat', 'whatsapp'];
    @endphp

    @foreach($platforms as $platform)
        <div class="mb-3 row">
            <label for="{{ $platform }}" class="col-md-2 col-form-label text-capitalize">{{ $platform }}</label>
            <div class="col-md-10">
                <input 
                    type="url" 
                    id="{{ $platform }}"
                    name="{{ $platform }}" 
                    value="{{ old($platform, $socialLink->$platform) }}" 
                    placeholder="Enter Your {{ ucfirst($platform) }} Link"
                    class="form-control @error($platform) is-invalid @enderror"
                >
                @error($platform)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    @endforeach

    <div class="text-end">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Save
        </button>
    </div>
</form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
