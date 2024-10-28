@extends('layouts.admin.master')

@section('title', 'Roles | Admin')

@push('styles')
@endpush

@section('content')
    <div class="row">
        <h2>Roles and Permissions</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a>
                </li>
                <li class="breadcrumb-item active">Create
                </li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <form action="{{ route('roles.store') }}" method="POST" class="needs-validation">
                @csrf

                <div class="form-group">
                    <label for="name" class="text-dark"> Role name <span class="text-danger">*</span></label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Enter role name" value="{{ old('name') }}" required autofocus>

                    <input type="hidden" name="guard" value="web">

                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <h5 class="my-2">Assign Permissions to role</h5>
                <div class="form-group">
                    <table class="permissionTable table">
                        <th> Section </th>
                        <th>
                            <div class="form-check">
                                <input class="form-check-input grand_selectall" type="checkbox" value=""
                                    id="flexCheckChecked" checked="">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Select All
                                </label>
                            </div>
                        </th>
                        <th> Available permissions </th>

                        <tbody>
                            @foreach ($custom_permission as $key => $group)
                                <!--This is to avoid to give role permisson to any new role -->
                                @if ($key != 'role')
                                    <tr>
                                        <td>
                                            <b>{{ ucfirst($key) }}</b>
                                        </td>
                                        <td width="30%">
                                            <div class="form-check">
                                                <input class="form-check-input selectall" type="checkbox" value=""
                                                    id="flexCheckChecked" checked="">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Select All
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            @forelse($group as $permission)
                                                <div class="form-check">
                                                    <input class="form-check-input permissioncheckbox" type="checkbox"
                                                        name="permissions[]" value="{{ $permission->id }}"
                                                        id="flexCheckChecked" checked="">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        {{ $permission->name }} &nbsp;&nbsp;
                                                    </label>
                                                </div>
                                            @empty
                                                No permission in this group.
                                            @endforelse
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-12 text-center mt-2 pt-5">
                    <button type="submit"
                        class="btn btn-primary me-1 waves-effect waves-float waves-light">Create</button>
                    <button type="reset" class="btn btn-outline-secondary waves-effect">
                        Discard
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/checkbox.js') }}"></script>
@endpush
