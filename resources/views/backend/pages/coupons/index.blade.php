@extends('backend.layouts.master')
@section('title', 'Coupons List')
@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Coupons List</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Coupons List</li>
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
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title">
                                            Coupons List ({{ $couponCount }})
                                        </h4>
                                        <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary mb-3">Add
                                            New</a>
                                    </div>

                                    <table id="datatable-buttons"
                                        class="table table-striped table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%">
                                        <thead>
                                            <tr class="">
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Discount</th>
                                                <th>Expires_at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($coupons as $data)
                                                <tr class="">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->name }}</td>
                                                    <td>{{ $data->discount }}%</td>
                                                    <td>{{ $data->expires_at }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.coupons.edit', $data->id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm"
                                                            onclick="confirmDelete({{ $data->id }})">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>

                                                        <form id="delete-form-{{ $data->id }}"
                                                            action="{{ route('admin.coupons.destroy', $data->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
