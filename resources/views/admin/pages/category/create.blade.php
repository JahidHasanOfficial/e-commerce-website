@extends('backend.layouts.master')
@section('title', 'Create Category')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title">
                        <h4 class="mb-0 font-size-18">Form Elements</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Agroxa</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Form Elements</li>
                        </ol>
                    </div>

                    <div class="state-information d-none d-sm-block">
                        <div class="state-graph">
                            <div id="header-chart-1" data-colors='["--bs-primary"]'></div>
                            <div class="info">Balance $ 2,317</div>
                        </div>
                        <div class="state-graph">
                            <div id="header-chart-2" data-colors='["--bs-warning"]'></div>
                            <div class="info">Item Sold 1230</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <!-- Start Page-content-Wrapper -->
        <div class="page-content-wrapper">
            <div class="row">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Category Create</h4>
                               
                              <form action="{{ route('admin_category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Category Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="name" value="Artisanal kale"
                                            id="example-text-input">
                                    </div>
                                </div>
                                <!-- End Row -->
                               
                                
                             
                               
                             
                                <!-- End Row -->
                                <div class="mb-3 row">
                                    <label for=""
                                        class="col-md-2 col-form-label">Image</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="image" value="">
                                    </div>
                                </div>
                                
                                <!-- End Row -->
                                {{-- <div class="mb-3 row">
                                    <label for="example-text-input"
                                        class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="status" value="Artisanal kale"
                                            id="example-text-input">
                                    </div>
                                </div> --}}
                                <!-- End Row -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                              
                              </form>
                              
                               
                               
                            </div>
                            <!-- End Cardbody -->
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

          
            

             

               
            </div>
            <!-- End Page-content-wrapper -->

        </div>
        <!-- Container-Fluid -->
    </div>
    <!-- End Page-content -->

</div>

@endsection