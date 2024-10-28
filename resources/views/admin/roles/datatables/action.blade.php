<div class="d-inline-flex">
    @canany(['roles.view', 'roles.edit', 'roles.delete'])
        <a role="button" class="text-primary" data-bs-toggle="dropdown">
            <i class="ti ti-dots-vertical"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            @can('roles.view')
                <a href="{{ route('roles.show', $id) }}" class="dropdown-item">
                    <i class="ti ti-eye"></i>
                    View
                </a>
            @endcan
            @can('roles.edit')
                <a href="{{ route('roles.edit', $id) }}" class="dropdown-item">
                    <i class="ti ti-edit"></i>
                    Edit
                </a>
            @endcan
            @can('roles.delete')
                <a class="dropdown-item delete-record" data-id="{{ $id }}" title="Delete role">
                    <i class="ti ti-trash"></i>
                    Delete
                </a>
            @endcan
        </div>
    @endcanany
</div>

<script>
    $(document).on('click', '.delete-record', function() {
        var id = $(this).data("id");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ms-1'
            },
            buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'DELETE',
                    url: "{{ route('roles.destroy', '') }}" + '/' + id,
                    success: function(response) {

                        if (response.success == true) {
                            toastr['success'](response.message,
                                'Deleted!', {
                                    closeButton: true,
                                    tapToDismiss: false,
                                    progressBar: true,
                                });
                        } else {
                            toastr['error'](response.message,
                                'Warning!', {
                                    closeButton: true,
                                    tapToDismiss: false,
                                    progressBar: true,
                                });
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle the error response
                        console.error(error);
                    }
                });
            }
        });
    });
</script>
