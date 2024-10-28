@extends('layouts.admin.master')

@section('title', 'Booking Requests | Admin')

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
        <h2>Booking Requests</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Booking Requests
                </li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="booking-requests-datatable table">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Student</th>
                            <th>Institute Name</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Slot</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
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
            var table = $('.booking-requests-datatable').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ route('booking-requests.index') }}",

                order: [
                    [0, "desc"]
                ],

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id',
                        searchable: false
                    },
                    {
                        data: 'traineee',
                        name: 'trainee.user.name',
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
                        data: 'institute',
                        name: 'trainee.institute.institute_name',
                    },
                    {
                        data: 'start_time',
                        render: function(data, type, full, meta) {
                            return `<div class="text-muted">
                                        ${moment(full.date).format('MMM D, YYYY')+' '+data}
                                    </div>`;
                        }
                    },
                    {
                        data: 'end_time',
                        render: function(data, type, full, meta) {
                            return `<div class="text-muted">
                                        ${moment(full.date).format('MMM D, YYYY')+' '+data}
                                    </div>`;
                        }
                    },
                    {
                        data: 'slot',
                    },
                    {
                        data: 'status',
                        render: function(data, type, full, meta) {
                            return `<span class="badge bg-label-${data == 'pending' ? 'danger' : (data == 2 ? 'secondary' : 'primary')}">${data}</span>`;
                        }
                    }
                ],

                columnDefs: [{
                    // Actions
                    targets: 7,
                    title: 'Actions',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        let actions =
                            '<div class="dropdown">' +
                            '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                            '<i class="ti ti-dots-vertical"></i>' +
                            '</button>' +
                            '<div class="dropdown-menu">';

                        if (full.status != 'approved') {
                            actions +=
                                '<a href="booking-requests/approve/' + full.id +
                                '" class="dropdown-item">' +
                                '<i class="ti ti-circle-check"></i>' +
                                'Approve</a>';
                        }

                        actions +=
                            '<a href="javascript:;" class="dropdown-item" data-id="' + full.id +
                            '">' +
                            '<i class="ti ti-circle-x"></i>' +
                            'Cancel</a>' +
                            '</div>' +
                            '</div>';

                        return actions;
                    }
                }],
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
