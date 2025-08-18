@extends('backend.layouts.master')
@section('title', 'Blood List')
@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Blood Donor List</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Blood List</li>
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
                                <h4 class="card-title">Blood Donor List</h4>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            {{-- <th>Religion</th> --}}
                                            {{-- <th>Father Name</th>
                                        <th>Mother Name</th> --}}
                                            {{-- <th>Slug</th> --}}
                                            {{-- <th>Email</th> --}}
                                            <th>Phone</th>
                                            <th>Blood Group</th>
                                            <th>District</th>
                                            {{-- <th>Thana</th> --}}
                                            <th>Address</th>
                                            <th>Date of Birth</th>
                                            {{-- <th>Gender</th> --}}
                                            <th>Image</th>
                                            <th>Last Donation Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($datas as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->name }}</td>
                                                {{-- <td>{{ $data->religion }}</td> --}}
                                                {{-- <td>{{ $data->father_name }}</td>
                                        <td>{{ $data->mother_name }}</td>
                                        <td>{{ $data->slug }}</td> --}}
                                                {{-- <td>{{ $data->email }}</td> --}}
                                                <td>{{ $data->phone }}</td>
                                                <td>{{ $data->blood_group }}</td>
                                                <td>{{ $data->district }}</td>
                                                {{-- <td>{{ $data->thana }}</td> --}}
                                                <td>{{ $data->address }}</td>
                                                <td>{{ $data->date_of_birth }}</td>
                                                {{-- <td>{{ $data->gender }}</td> --}}
                                                <td>
                                                    @if ($data->image)
                                                        <img src="{{ asset($data->image) }}" alt="Image"
                                                            style="width: 80px; height: 80px;">
                                                    @else
                                                        <span class="badge bg-warning">No Image</span>
                                                    @endif
                                                </td>
                                                <td>{{ $data->last_donation_date }}</td>
                                                <td>
                                                    <button class="btn btn-sm status-toggle" data-id="{{ $data->id }}"
                                                        data-status="{{ $data->status }}">
                                                        {{ $data->status == 1 ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        data-bs-toggle="modal" data-bs-target="#profileModal"
                                                        data-name="{{ $data->name }}"
                                                        data-father_name="{{ $data->father_name }}"
                                                        data-mother_name="{{ $data->mother_name }}"
                                                        data-email="{{ $data->email }}" data-phone="{{ $data->phone }}"
                                                        data-blood_group="{{ $data->blood_group }}"
                                                        data-religion="{{ $data->religion }}"
                                                        data-gender="{{ $data->gender }}"
                                                        data-date_of_birth="{{ $data->date_of_birth }}"
                                                        data-last_donation_date="{{ $data->last_donation_date }}"
                                                        data-district="{{ $data->district }}"
                                                        data-thana="{{ $data->thana }}"
                                                        data-address="{{ $data->address }}"
                                                        data-slug="{{ $data->slug }}" data-status="{{ $data->status }}"
                                                        data-image="{{ asset($data->image) }}">
                                                        View
                                                    </button>
                                                </td>

                                                <td>
                                                    <a href="{{ route('admin_blood.edit', $data->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm"
                                                        onclick="confirmDelete({{ $data->id }})">
                                                        Delete
                                                    </a>

                                                    <form id="delete-form-{{ $data->id }}"
                                                        action="{{ route('admin_blood.destroy', $data->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                    </form>

                                                </td>
                                            </tr>

                                            <!-- Profile Modal -->
                                            <div class="modal fade" id="profileModal" tabindex="-1"
                                                aria-labelledby="profileModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="profileModalLabel">Profile Details
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="card p-3">
                                                                <div class="row g-4 align-items-center">

                                                                    <div class="col-md-4 text-center">
                                                                        <img id="profileImage" src=""
                                                                            alt="Profile Image"
                                                                            class="img-fluid rounded-circle"
                                                                            style="width: 150px; height: 150px; object-fit: cover;">
                                                                        <h5 class="mt-3" id="profileName"></h5>
                                                                        <span class="badge" id="profileStatus"></span>
                                                                    </div>

                                                                    <div class="col-md-8">
                                                                        <ul class="list-group list-group-flush">
                                                                            {{-- <li class="list-group-item"><strong>Father's Name:</strong> <span id="profileFatherName"></span></li>
                                                                             <li class="list-group-item"><strong>Mother's Name:</strong> <span id="profileMotherName"></span></li> --}}
                                                                            <li class="list-group-item">
                                                                                <strong>Email:</strong> <span
                                                                                    id="profileEmail"></span></li>
                                                                            <li class="list-group-item">
                                                                                <strong>Phone:</strong> <span
                                                                                    id="profilePhone"></span></li>
                                                                            <li class="list-group-item"><strong>Blood
                                                                                    Group:</strong> <span
                                                                                    id="profileBloodGroup"></span></li>
                                                                            <li class="list-group-item">
                                                                                <strong>Religion:</strong> <span
                                                                                    id="profileReligion"></span></li>
                                                                            <li class="list-group-item">
                                                                                <strong>Gender:</strong> <span
                                                                                    id="profileGender"></span></li>
                                                                            <li class="list-group-item"><strong>Date of
                                                                                    Birth:</strong> <span
                                                                                    id="profileDOB"></span></li>
                                                                            <li class="list-group-item"><strong>Last
                                                                                    Donation Date:</strong> <span
                                                                                    id="profileLastDonationDate"></span>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <strong>District:</strong> <span
                                                                                    id="profileDistrict"></span></li>
                                                                            <li class="list-group-item">
                                                                                <strong>Thana:</strong> <span
                                                                                    id="profileThana"></span></li>
                                                                            <li class="list-group-item">
                                                                                <strong>Address:</strong> <span
                                                                                    id="profileAddress"></span></li>
                                                                            {{-- <li class="list-group-item"><strong>Slug:</strong> <span id="profileSlug"></span></li> --}}
                                                                        </ul>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <script>
                                            function confirmDelete(id) {
                                                Swal.fire({
                                                    title: "Are you sure?",
                                                    text: "You won't be able to revert this!",
                                                    icon: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonColor: "#d33",
                                                    cancelButtonColor: "#3085d6",
                                                    confirmButtonText: "Yes, delete it!"
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById("delete-form-" + id).submit();
                                                    }
                                                });
                                            }
                                        </script>

                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- End Page-content-wrapper -->
        </div>
        <!-- Container-Fluid -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".status-toggle").each(function() {
                var button = $(this);
                var status = button.data("status");
                button.addClass(status == 1 ? "btn-primary" : "btn-info");
            });

            $(".status-toggle").click(function() {
                var button = $(this);
                var id = button.data("id");
                var currentStatus = button.data("status");
                var newStatus = currentStatus == 1 ? 0 : 1; // Toggle status

                // Build the route dynamically
                var url = `{!! route('admin_blood.status', ['id' => ':id']) !!}`.replace(':id', id);

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        status: newStatus
                    },
                    success: function(response) {
                        if (response.success) {
                            button.text(newStatus == 1 ? "Active" : "Inactive");
                            button.data("status", newStatus);

                            button.removeClass("btn-primary btn-info");
                            button.addClass(newStatus == 1 ? "btn-primary" : "btn-info");

                            Swal.fire("Updated!", "Status updated successfully.", "success");
                        }
                    },
                    error: function() {
                        Swal.fire("Error!", "Something went wrong.", "error");
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#profileModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);

                $('#profileImage').attr('src', button.data('image'));
                $('#profileName').text(button.data('name'));
                $('#profileStatus').text(button.data('status') == 1 ? 'Active' : 'Inactive')
                    .removeClass('bg-success bg-danger')
                    .addClass(button.data('status') == 1 ? 'bg-success' : 'bg-danger');

                $('#profileFatherName').text(button.data('father_name'));
                $('#profileMotherName').text(button.data('mother_name'));
                $('#profileEmail').text(button.data('email'));
                $('#profilePhone').text(button.data('phone'));
                $('#profileBloodGroup').text(button.data('blood_group'));
                $('#profileReligion').text(button.data('religion'));
                $('#profileGender').text(button.data('gender'));
                $('#profileDOB').text(button.data('date_of_birth'));
                $('#profileLastDonationDate').text(button.data('last_donation_date'));
                $('#profileDistrict').text(button.data('district'));
                $('#profileThana').text(button.data('thana'));
                $('#profileAddress').text(button.data('address'));
                $('#profileSlug').text(button.data('slug'));
            });
        });
    </script>


@endsection
