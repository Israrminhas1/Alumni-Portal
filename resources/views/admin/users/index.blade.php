@extends('layouts.admin.master')

@section('title', 'Users | Admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/toastr/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endpush

@section('content')
    <div class="row">
        <h2>Users</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Users
                </li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-end">
                <div class="col-6 text-end">
                    <a href="#!" id="add-new-user" data-bs-target="#userModal" data-bs-toggle="modal"
                        class="btn btn-primary">
                        <i class="ti ti-plus"></i>
                        Add new user
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="users-datatable table">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal to add new user -->
    <div class="modal fade" id="userModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-2">
                        <h1 class="mb-1" id="formHeading">Add New User</h1>
                    </div>
                    <div class="alert alert-danger mt-1 alert-validation-msg d-none" role="alert">
                        <div class="alert-body d-flex align-items-center">
                            <span id="validationMsg"></span>
                        </div>
                    </div>
                    <form id="userForm" action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" id="id" value="">

                        <div class="row">
                            <div class="col-6 mt-2">
                                <label class="form-label" for="name">Name <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" name="name" id="name" required
                                    placeholder="" aria-label="" />
                            </div>
                            <div class="col-6 mt-2">
                                <label class="form-label" for="email">Email <sup class="text-danger">*</sup></label>
                                <input type="email" class="form-control" name="email" id="email" required
                                    placeholder="" aria-label="" />
                            </div>
                            <div class="col-6 mt-2">
                                <label class="form-label" for="role">Role <sup class="text-danger">*</sup></label>
                                <select id="role" name="role" class="select2 form-select" required>
                                    <option value="" disabled selected>Select value</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="col-6 mt-2">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder=""
                                    aria-label="" />
                            </div>
                            <div class="col-6 mt-2">
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" placeholder="" aria-label="" />
                            </div>
                        </div>
                        <div class="col-12 text-center mt-2 pt-5">
                            <button type="submit" id="submitBtn"
                                class="btn btn-primary me-1 waves-effect waves-float waves-light">Create</button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect">
                                Discard
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin-assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('admin-assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/toastr/toastr.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            var table = $('.users-datatable').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ route('users.index') }}",

                order: [
                    [0, "desc"]
                ],

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id',
                        searchable: false
                    },
                    {
                        data: 'name',
                        render: function(data, type, row, meta) {
                            return `<div class="d-flex justify-content-start align-items-center">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-sm me-1">
                                                <span class="avatar-initial rounded-circle bg-label-primary">${data[0]}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="javascript:void(0);" class="text-heading text-truncate">
                                                <span class="fw-medium">${data}</span>
                                            </a>
                                        </div>
                                    </div>`;
                        }
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'userRole',
                        name: 'role',
                        render: function(data, type, full, meta) {
                            var $role = data;
                            var roleBadgeObj = {
                                Admin: '<span class="text-truncate d-flex align-items-center text-heading"><i class="ti ti-device-desktop ti-md text-danger me-2"></i></span>',
                                'CCJPO-Officer': '<span class="text-truncate d-flex align-items-center text-heading"><i class="ti ti-edit ti-md text-warning me-2"></i></span>',
                                Alumni: '<span class="text-truncate d-flex align-items-center text-heading"><i class="ti ti-crown ti-md text-primary me-2"></i></span>',
                                Trainee: '<span class="text-truncate d-flex align-items-center text-heading"><i class="ti ti-user ti-md text-success me-2"></i></span>',
                            };
                            return "<span class='text-truncate d-flex align-items-center'>" +
                                roleBadgeObj[$role] + $role + '</span>';
                        }
                    }
                ],

                columnDefs: [{
                    // Actions
                    targets: 4,
                    title: 'Actions',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return (
                            '<div class="dropdown">' +
                            '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                            '<i class="ti ti-dots-vertical"></i>' +
                            '</button>' +
                            '<div class="dropdown-menu">' +
                            `<a href="javascript:;" class="dropdown-item edit-user" data-bs-toggle="modal" data-bs-target="#userModal"
                            data-id="${full.id?? null}" +
                            data-name="${full.name}" +
                            data-email="${full.email}" +
                            data-role="${full.role}">` +
                            '<i class="ti ti-edit"></i>' +
                            'Edit</a>' +
                            '<a href="javascript:;" class="dropdown-item delete-user" data-id="' +
                            full.id + '">' +
                            '<i class="ti ti-trash"></i>' +
                            'Delete</a>' +
                            '</div>' +
                            '</div>'
                        );
                    }
                }],
            });

            $(document).on('click', '#add-new-user', function() {
                $('#formHeading').text('Add New User');
                $('#submitBtn').text('Create');
                $('#userForm')[0].reset();
                $('#id').val(null);
                $('#role').val('').trigger('change');
                $('.alert-validation-msg').addClass('d-none');
            });

            $(document).on('click', '.closeModal', function() {
                $('.alert-validation-msg').addClass('d-none');
            });

            $('#userForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting normally

                var formData = $(this).serialize(); // Get form data

                $.ajax({
                    url: $(this).attr('action'), // Get form action URL
                    type: $(this).attr('method'), // Get form method (POST, GET, etc.)
                    data: formData, // Set form data
                    success: function(response) {
                        if (response.success) {
                            // Validation passed, handle success case
                            $('#userModal').modal('hide');
                            formData = {};
                            table.ajax.reload(null, false);

                            toastr['success'](response.message, 'Success!', {
                                closeButton: true,
                                tapToDismiss: false,
                                progressBar: true,
                            });
                        } else {
                            // Validation failed, handle error case
                            console.log(response.errors);
                        }
                    },
                    error: function(xhr, status, error) {
                        let errors = JSON.parse(xhr.responseText);
                        $('.alert-validation-msg').removeClass('d-none');
                        $('#validationMsg').text(errors.message);
                    }
                });
            });

            $(document).on('click', '.edit-user', function() {
                $('#formHeading').text('Edit User');
                $('#submitBtn').text('Update');
                var user = $(this).data("user");
                var form = document.getElementById('userForm');

                // Set the values of the input fields
                form.querySelector('#id').value = $(this).data("id");
                form.querySelector('#name').value = $(this).data("name");
                form.querySelector('#email').value = $(this).data("email");
                $('#role').val($(this).data("role")).trigger('change');
            });

            $(document).on('click', '.delete-user', function() {
                var userId = $(this).data("id");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url: "{{ route('users.destroy', '') }}" + '/' + userId,
                            type: 'DELETE',
                            success: function(response) {
                                // Handle the success response
                                table.ajax.reload(null, false);
                                toastr['success'](response.message, {
                                    closeButton: true,
                                    tapToDismiss: false,
                                    progressBar: true,
                                });
                            },
                            error: function(xhr, status, error) {
                                // Handle the error response
                                console.error(error);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
