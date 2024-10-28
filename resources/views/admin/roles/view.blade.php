@extends('layouts.admin.master')

@section('title', 'Roles | Admin')

@push('styles')
@endpush

@section('content')
    <div class="row">
        <h2>Role and Permissions</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a>
                </li>
                <li class="breadcrumb-item active">View
                </li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5>Assigned Permissions to role</h5>
            <div class="form-group">
                <div class="table-responsive">
                    <table class="permissionTable table table-bordered">
                        <th>
                            Section
                        </th>

                        <th>
                            <div class="form-check">
                                <input class="form-check-input grand_selectall" type="checkbox" id="flexCheckChecked"
                                    disabled>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Select All
                                </label>
                            </div>
                        </th>

                        <th>
                            Available permissions
                        </th>
                        <tbody>
                            @foreach ($custom_permission as $key => $group)
                                {{-- @continue ($role->name != 'admin' && $key == 'role') --}}
                                <tr>
                                    <td>
                                        <b>{{ ucfirst($key) }}</b>
                                    </td>
                                    <td width="30%">
                                        <div class="form-check">
                                            <input class="form-check-input selectall" type="checkbox" id="flexCheckChecked"
                                                disabled>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Select All
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        @forelse($group as $permission)
                                            <div class="form-check">
                                                <input
                                                    {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}
                                                    class="form-check-input permissioncheckbox" type="checkbox"
                                                    name="permissions[]" value="{{ $permission->id }}" id="flexCheckChecked"
                                                    disabled>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    {{ $permission->name }} &nbsp;&nbsp;
                                                </label>
                                            </div>
                                        @empty
                                            No permission in this group.
                                        @endforelse
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/checkbox.js') }}"></script>
@endpush
