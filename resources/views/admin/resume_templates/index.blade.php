@extends('layouts.admin.master')

@section('title', 'Resume Templates')

@section('content')
    <div class="row">
        <h2>Resume Templates</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Resumes Templates
                </li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-end">
                <div class="col-6 text-end">
                    <a href="#!" id="add-new-resume-template" data-bs-target="#resumeTemplateModal"
                        data-bs-toggle="modal" class="btn btn-primary">
                        <i class="ti ti-plus"></i>
                        Add new template
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="resume-templates-datatable table">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal to add new resume template -->
    <div class="modal fade" id="resumeTemplateModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-2">
                        <h1 class="mb-1" id="formHeading">Add New Template</h1>
                    </div>
                    <div class="alert alert-danger mt-1 alert-validation-msg d-none" role="alert">
                        <div class="alert-body d-flex align-items-center">
                            <span id="validationMsg"></span>
                        </div>
                    </div>
                    <form id="resumeTemplateForm" action="{{ route('settings.resume-templates.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" id="id" value="">

                        <div class="row">
                            <div class="col-6 mt-2">
                                <label class="form-label" for="name">Name <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name') }}"required placeholder="Name" aria-label="">
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label" for="thumb">Thumb (750x750) <span
                                        class="text-danger">*</span></label>
                                <input name="thumb" id="thumb" class="form-control" type="file"><br>
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label" for="content">HTML content <span
                                        class="text-danger">*</span></label>
                                <textarea rows="5" id="content" name="content" class="form-control"></textarea>
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label" for="style">Style content <span
                                        class="text-danger">*</span></label>
                                <textarea rows="5" id="style" name="style" class="form-control"></textarea>
                            </div>
                            <div class="col-6 mt-2">
                                <label class="switch" for="status">
                                    <span class="switch-label">Status</span>
                                    <input type="checkbox" class="switch-input" name="is_active" id="status" />
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                </label>
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
    <script type="text/javascript">
        $(function() {
            var table = $('.resume-templates-datatable').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ route('settings.resume-templates.index') }}",

                order: [
                    [0, "desc"]
                ],

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id',
                        searchable: false
                    },
                    {
                        data: 'thumb',
                        render: function(data, type, row, meta) {
                            return `<img src="{{ URL::to('/') }}/storage/thumb_templates/${data}"
                                                class="img-thumbnail" height="50" width="50" />`;
                        }
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'is_active',
                        render: function(data, type, full, meta) {
                            return `<label class="switch">
                                        <input type="checkbox" class="switch-input" ${data ? 'checked' : ''} onchange="updateStatus(${full.id})"/>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>`
                        }
                    }
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
                            `<a href="resume-template/builder/${full.id}" class="dropdown-item" target="_blank">` +
                            '<i class="ti ti-layout"></i>' +
                            'Builder</a>' +
                            `<a href="javascript:;" class="dropdown-item edit-resume-template" data-bs-toggle="modal" data-bs-target="#resumeTemplateModal"
                            data-id="${full.id?? null}" +
                            data-name="${full.name}" +
                            data-content="${full.content}" +
                            data-style="${full.style}" +
                            data-status="${full.is_active}">` +
                            '<i class="ti ti-edit"></i>' +
                            'Edit</a>' +
                            '<a href="javascript:;" class="dropdown-item delete-resume-template" data-id="' +
                            full.id + '">' +
                            '<i class="ti ti-trash"></i>' +
                            'Delete</a>' +
                            '</div>' +
                            '</div>'
                        );
                    }
                }],
            });

            $(document).on('click', '#add-new-resume-template', function() {
                $('#formHeading').text('Add New Template');
                $('#submitBtn').text('Create');
                $('#resumeTemplateForm')[0].reset();
                $('#id').val(null);
                $('.alert-validation-msg').addClass('d-none');
            });

            $(document).on('click', '.closeModal', function() {
                $('.alert-validation-msg').addClass('d-none');
            });

            $('#resumeTemplateForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting normally

                var formData = $(this).serialize(); // Get form data

                $.ajax({
                    url: $(this).attr('action'), // Get form action URL
                    type: $(this).attr('method'), // Get form method (POST, GET, etc.)
                    data: formData, // Set form data
                    success: function(response) {
                        if (response.success) {
                            // Validation passed, handle success case
                            $('#resumeTemplateModal').modal('hide');
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

            $(document).on('click', '.edit-resume-template', function() {
                $('#formHeading').text('Edit Template');
                $('#submitBtn').text('Update');
                var resumeTemplate = $(this).data("resumeTemplate");
                var form = document.getElementById('resumeTemplateForm');

                // Set the values of the input fields
                form.querySelector('#id').value = $(this).data("id");
                form.querySelector('#name').value = $(this).data("name");
                form.querySelector('#content').value = $(this).data("content");
                form.querySelector('#style').value = $(this).data("style");
                $(this).data("status") == 1 ?
                    $('#status').prop('checked', true) :
                    $('#status').prop('checked', false);
            });

            $(document).on('click', '.delete-resume-template', function() {
                var resumeTemplateId = $(this).data("id");

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
                            url: "{{ route('settings.resume-templates.destroy', '') }}" +
                                '/' + resumeTemplateId,
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

        function updateStatus(id) {
            $.ajax({
                url: "{{ route('settings.resume-templates.status', '') }}" + '/' + id,
                type: 'GET',
                success: function(response) {
                    $('.resume-templates-datatable').DataTable().ajax.reload();
                    // Handle the success response
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
    </script>
@endpush
