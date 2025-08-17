@extends('backend.layouts.master')
@section('title', 'Create Blood Donor')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title">
                        <h4 class="mb-0 font-size-18">Create Blood Donor</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Blood Donors</a></li>
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

                            <h4 class="card-title">Create Blood Donor</h4>

                            <form action="{{ route('admin_blood.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter Your Name">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Religion</label>
                                    <div class="col-md-10">
                                        <select name="religion" class="form-control">
                                            <option value="">Select Religion</option>
                                            <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Hinduism" {{ old('religion') == 'Hinduism' ? 'selected' : '' }}>Hinduism</option>
                                            <option value="Christianity" {{ old('religion') == 'Christianity' ? 'selected' : '' }}>Christianity</option>
                                            <option value="Buddhism" {{ old('religion') == 'Buddhism' ? 'selected' : '' }}>Buddhism</option>
                                            <option value="Other" {{ old('religion') == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>
                                

                                {{-- <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Father's Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="father_name" value="{{ old('father_name') }}" placeholder="Enter Your Father Name">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Mother's Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="mother_name" value="{{ old('mother_name') }}" placeholder="Enter Your Mother Name">
                                    </div>
                                </div> --}}

                                {{-- <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Slug</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="slug" value="{{ old('slug') }}">
                                    </div>
                                </div> --}}

                              <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Phone</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" placeholder="Enter Your Phone Number">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Blood Group</label>
                                    <div class="col-md-10">
                                        <select name="blood_group" class="form-control">
                                            <option value="">Select Blood Group</option>
                                            <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                                            <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                                            <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                                            <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                                            <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                                            <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
                                            <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                            <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                        </select>
                                    </div>
                                </div>
                                
                                

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Zila</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="district" value="{{ old('district') }}" placeholder="Enter Your Zila">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">UpZila</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="thana" value="{{ old('thana') }}" placeholder="Enter Your Upzila">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Address</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="address" rows="3" placeholder="Enter Your Address" >{{ old('address') }}</textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Date of Birth</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="Enter Your Date Of Birth">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Gender</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div> 

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Image</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Last Blood Donation Date</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="date" name="last_donation_date" value="{{ old('last_donation_date') }}" placeholder="Enter Your last Donation Date">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

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

@endsection
