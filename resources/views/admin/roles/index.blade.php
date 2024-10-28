@extends('layouts.admin.master')

@section('title', 'Roles | Admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
@endpush

@section('content')
    <div class="row">
        <h2>Roles & Permissions</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Roles & Permissions
                </li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-end">
                <div class="col-6 text-end">
                    <a href="#!" id="add-new-role" data-bs-target="#addRoleModal" data-bs-toggle="modal"
                        class="btn btn-primary">
                        <i class="ti ti-plus"></i>
                        Add new role
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="roles-datatable table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <h2>Roles</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Roles & Permissions
                </li>
            </ol>
        </div>
    </div>
    <div class="card">
        @can('roles.add')
            <div class="card-header  d-flex justify-content-end">
                <div class="row">
                    <!--begin::Button-->
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus"></i>
                        Create New Role
                    </a>
                    <!--end::Button-->
                </div>
            </div>
        @endcan
        
        <div class="card-body">
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible p-2">
                    <i class="ti ti-alert-triangle"></i>
                    {{ session()->get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table id="roletable" class="table">
                <thead>
                    <th>#</th>
                    <th>Role Name</th>
                    <th>Action</th>
                </thead>
            </table>
        </div>
        </section>
    </div> --}}

    <!-- Add Role Modal -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <h3 class="role-title mb-2">Add New Role</h3>
                        <p class="text-muted">Set role permissions</p>
                    </div>
                    <!-- Add role form -->
                    <form id="addRoleForm" class="row g-3" method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        
                        <div class="col-12 mb-4">
                            <label class="form-label" for="modalRoleName">Role Name</label>
                            <input type="text" id="modalRoleName" name="modalRoleName" class="form-control"
                                placeholder="Enter a role name" tabindex="-1" />
                        </div>
                        <div class="col-12">
                            <h5>Role Permissions</h5>
                            <!-- Permission table -->
                            <div class="table-responsive">
                                <table class="table table-flush-spacing">
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap fw-medium">
                                                Admin Access
                                                <i class="ti ti-info-circle" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Allows a full access to the system"></i>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="selectAll" />
                                                    <label class="form-check-label" for="selectAll"> Select All </label>
                                                </div>
                                            </td>
                                        </tr>
                                        @foreach ($permissions as $key => $group)
                                            <!--This is to avoid to give role permisson to any new role -->
                                            @if ($key != 'role')
                                                <tr>
                                                    <td class="text-nowrap fw-medium">
                                                        {{ ucfirst($key) }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            @forelse($group as $permission)
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="permissions[]" id="{{ $permission->name }}"
                                                                        value="{{ $permission->id }}" />
                                                                    <label class="form-check-label"
                                                                        for="{{ $permission->name }}">
                                                                        {{ $permission->name }}
                                                                    </label>
                                                                </div>
                                                            @empty
                                                                No permission in this group.
                                                            @endforelse
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Permission table -->
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Cancel
                            </button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>
    <!--/ Add Role Modal -->
@endsection

@push('scripts')
    <script src="{{ asset('admin-assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <!-- Page JS -->
    <script src="{{ asset('admin-assets/js/app-access-roles.js') }}"></script>
    <script src="{{ asset('admin-assets/js/modal-add-role.js') }}"></script>

    <script>
        $(function() {
            var table = $('.roles-datatable').DataTable({
                language: {
                    searchPlaceholder: "Search role here"
                },

                responsive: true,
                serverSide: true,

                order: [
                    [1, 'ASC']
                ],

                ajax: "{{ route('roles.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'name',
                        name: 'roles.name',
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
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false
                    }
                ],
            });
        });
    </script>
@endpush
