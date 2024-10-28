@extends('layouts.admin.master')

@section('title', 'My Resumes')

@section('content')
    <div class="row">
        <h2>My Resumes</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">My Resumes
                </li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-end">
                <div class="col-6 text-end">
                    <a href="{{ url('alltemplates') }}" class="btn btn-primary">
                        <i class="ti ti-plus"></i>
                        Add new resume
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="myresumes-datatable table">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Name</th>
                            <th>Public link</th>
                            <th>Date Info</th>
                            <th>Views</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function() {
            var table = $('.myresumes-datatable').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ route('resume.index') }}",

                order: [
                    [0, "desc"]
                ],

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id',
                        searchable: false
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'slug',
                        render: function(data, type, full, meta) {
                            return `<a href="/publish/${data}" target="_blank">
                                        <i class="ti ti-link"></i>
                                    </a>`;
                        }
                    },
                    {
                        data: 'updated_at',
                        render: function(data, type, full, meta) {
                            return `<div class="small text-muted">
                                        Created: ${moment(full.created_at).format('MMM D, YYYY')}<br>
                                        Modified: ${moment(full.created_at).format('MMM D, YYYY')}
                                    </div>`;
                        }
                    },
                    {
                        data: 'view_count',
                    },
                ],

                columnDefs: [{
                    // Actions
                    targets: 5,
                    title: 'Actions',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return (
                            '<div class="dropdown">' +
                            '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                            '<i class="ti ti-dots-vertical"></i>' +
                            '</button>' +
                            '<div class="dropdown-menu">' +
                            `<a href="/resume/builder/${full.code}" target="_blank" class="dropdown-item">` +
                            '<i class="ti ti-layout"></i> Builder </a>' +
                            `<a href="/resume/download/${full.code}" class="dropdown-item">` +
                            '<i class="ti ti-download"></i> Download PDF </a>' +
                            '<a href="javascript:;" class="dropdown-item delete-myresume" data-id="' +
                            full.id + '">' +
                            '<i class="ti ti-trash"></i> Delete</a>' +
                            '</div>' +
                            '</div>'
                        );
                    }
                }],
            });

            $(document).on('click', '.closeModal', function() {
                $('.alert-validation-msg').addClass('d-none');
            });

            $(document).on('click', '.delete-myresume', function() {
                var resumeId = $(this).data("id");

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
                            url: "{{ route('resume.delete', '') }}" +
                                '/' +
                                resumeId,
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
