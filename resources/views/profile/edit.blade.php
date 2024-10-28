@extends('layouts.admin.master')

@section('content')
    <h2>Edit Profile</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Edit Profile
            </li>
        </ol>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Profile Information</h2>

            <p>
                Update your account's profile information and email address.
            </p>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="row">
                    <div class="col-6">
                        <label for="name">Name<sup class="text-danger">*</sup></label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control"
                            required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <label for="email">Email<sup class="text-danger">*</sup></label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control"
                            required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-header">
            <h2>Update Password</h2>

            <p>
                Ensure your account is using a long, random password to stay secure.
            </p>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-6">
                        <label for="update_password_current_password">Current Password</label>
                        <input id="update_password_current_password" name="current_password" type="password"
                            class="form-control" autocomplete="current-password" />
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <label for="update_password_password">New Password</label>
                        <input id="update_password_password" name="password" type="password" class="form-control"
                            autocomplete="new-password" />
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <label for="update_password_password_confirmation">Confirm Password</label>
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                            class="form-control" autocomplete="new-password" />
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endSection
