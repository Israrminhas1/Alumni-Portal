@extends('layouts.admin.master')

@section('title', 'Resource Library | Admin')

@section('content')
    <div class="row">
        <h2>Resource Library</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Resource Library
                </li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-end">
                <div class="col-6 text-end">
                    <a href="#!" id="add-new-resource" data-bs-target="#resourceModal" data-bs-toggle="modal"
                        class="btn btn-primary">
                        <i class="ti ti-plus"></i>
                        Add new resource
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="resources-datatable table">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>File</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal to add new resource -->
    <div class="modal fade" id="resourceModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-2">
                        <h1 class="mb-1" id="formHeading">Add New Resource</h1>
                    </div>
                    <div class="alert alert-danger mt-1 alert-validation-msg d-none" role="alert">
                        <div class="alert-body d-flex align-items-center">
                            <span id="validationMsg"></span>
                        </div>
                    </div>
                    <form id="resourceForm" action="{{ route('resources.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" id="id" value="">

                        <div class="row">
                            <div class="col-6 mt-2">
                                <label class="form-label" for="name">Name <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" name="name" id="name" required
                                    placeholder="" aria-label="" />
                            </div>
                            <div class="col-6 mt-2">
                                <label class="form-label" for="type">Type <sup class="text-danger">*</sup></label>
                                <select id="type" name="type" class="select2 form-select" required>
                                    <option value="" disabled selected>Select value</option>
                                    <option value="video">Video</option>
                                    <option value="pdf">PDF</option>
                                    <option value="docx">Word</option>
                                </select>
                            </div>
                            <div class="col-6 mt-2">
                                <label class="form-label" for="file">File</label>
                                <input type="file" class="form-control" name="file" id="file" />
                            </div>
                        </div>
                        <div class="col-12 text-center mt-2 pt-5">
                            <button type="submit" id="submitBtn"
                                class="btn btn-primary me-1 waves-effect waves-float waves-light">Upload</button>
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
    <script type="text/javascript">
        $(function() {
            var table = $('.resources-datatable').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ route('resources.index') }}",

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
                    },
                    {
                        data: 'type'
                    },
                    {
                        data: 'file',
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
                            `<a href="javascript:;" class="dropdown-item edit-resource" data-bs-toggle="modal" data-bs-target="#resourceModal"
                            data-id="${full.id?? null}" +
                            data-name="${full.name}" +
                            data-type="${full.type}" +
                            data-path="${full.path}">` +
                            '<i class="ti ti-edit"></i>' +
                            'Edit</a>' +
                            '<a href="javascript:;" class="dropdown-item delete-resource" data-id="' +
                            full.id + '">' +
                            '<i class="ti ti-trash"></i>' +
                            'Delete</a>' +
                            '</div>' +
                            '</div>'
                        );
                    }
                }],
            });

            $(document).on('click', '#add-new-resource', function() {
                $('#formHeading').text('Add New Resource');
                $('#submitBtn').text('Create');
                $('#resourceForm')[0].reset();
                $('#id').val(null);
                $('#type').val('').trigger('change');
                $('.alert-validation-msg').addClass('d-none');
            });

            $(document).on('click', '.closeModal', function() {
                $('.alert-validation-msg').addClass('d-none');
            });

            $('#resourceForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting normally

                let form = $(this);
                var formData = new FormData(form[0]);

                $.ajax({
                    url: $(this).attr('action'), // Get form action URL
                    type: $(this).attr('method'), // Get form method (POST, GET, etc.)

                    processData: false,
                    contentType: false,

                    data: formData, // Set form data
                    success: function(response) {
                        if (response.success) {
                            // Validation passed, handle success case
                            $('#resourceModal').modal('hide');
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

            $(document).on('click', '.edit-resource', function() {
                $('#formHeading').text('Edit Resource');
                $('#submitBtn').text('Update');
                var resource = $(this).data("resource");
                var form = document.getElementById('resourceForm');

                // Set the values of the input fields
                form.querySelector('#id').value = $(this).data("id");
                form.querySelector('#name').value = $(this).data("name");
                $('#type').val($(this).data("type")).trigger('change');
                form.querySelector('#path').value = $(this).data("patj");
            });

            $(document).on('click', '.delete-resource', function() {
                var resourceId = $(this).data("id");

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
                            url: "{{ route('resources.destroy', '') }}" + '/' + resourceId,
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
