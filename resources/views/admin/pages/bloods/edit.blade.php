@extends('backend.layouts.master')
@section('title', 'Edit Blood Donor')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title">
                        <h4 class="mb-0 font-size-18">Edit Blood Donor</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Blood Donors</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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

                            <h4 class="card-title">Edit Blood Donor</h4>

                            <form action="{{ route('admin_blood.update', $bloodDonor->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="name" value="{{ old('name', $bloodDonor->name) }}" placeholder="Enter Your Name">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Religion</label>
                                    <div class="col-md-10">
                                        <select name="religion" class="form-control">
                                            <option value="">Select Religion</option>
                                            <option value="Islam" {{ (old('religion', $bloodDonor->religion) == 'Islam') ? 'selected' : '' }}>Islam</option>
                                            <option value="Hinduism" {{ (old('religion', $bloodDonor->religion) == 'Hinduism') ? 'selected' : '' }}>Hinduism</option>
                                            <option value="Christianity" {{ (old('religion', $bloodDonor->religion) == 'Christianity') ? 'selected' : '' }}>Christianity</option>
                                            <option value="Buddhism" {{ (old('religion', $bloodDonor->religion) == 'Buddhism') ? 'selected' : '' }}>Buddhism</option>
                                            <option value="Other" {{ (old('religion', $bloodDonor->religion) == 'Other') ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="email" name="email" value="{{ old('email', $bloodDonor->email) }}" placeholder="Enter Your Email">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Phone</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="phone" value="{{ old('phone', $bloodDonor->phone) }}" placeholder="Enter Your Phone Number">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Blood Group</label>
                                    <div class="col-md-10">
                                        <select name="blood_group" class="form-control">
                                            <option value="">Select Blood Group</option>
                                            @foreach (['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $group)
                                                <option value="{{ $group }}" {{ (old('blood_group', $bloodDonor->blood_group) == $group) ? 'selected' : '' }}>{{ $group }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Zila</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="district" value="{{ old('district', $bloodDonor->district) }}" placeholder="Enter Your Zila">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">UpZila</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="thana" value="{{ old('thana', $bloodDonor->thana) }}" placeholder="Enter Your Upzila">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Address</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="address" rows="3" placeholder="Enter Your Address">{{ old('address', $bloodDonor->address) }}</textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Date of Birth</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="date" name="date_of_birth" value="{{ old('date_of_birth', $bloodDonor->date_of_birth) }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Gender</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male" {{ (old('gender', $bloodDonor->gender) == 'Male') ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ (old('gender', $bloodDonor->gender) == 'Female') ? 'selected' : '' }}>Female</option>
                                            <option value="Other" {{ (old('gender', $bloodDonor->gender) == 'Other') ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Image</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="image">
                                        @if($bloodDonor->image)
                                            <img src="{{ asset('storage/' . $bloodDonor->image) }}" alt="Image" width="100" class="mt-2">
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Last Blood Donation Date</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="date" name="last_donation_date" value="{{ old('last_donation_date', $bloodDonor->last_donation_date) }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                            <option value="1" {{ (old('status', $bloodDonor->status) == '1') ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ (old('status', $bloodDonor->status) == '0') ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>

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
