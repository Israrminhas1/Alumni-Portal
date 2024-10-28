@extends('layouts.admin.master')

@section('title', 'Templates')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/customize.css') }}" />
@endsection

@section('content')
    <div class="row">
        <h2>Resume Templates</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Resume Templates
                </li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between gap-3">
            <div class="card-title mb-0 me-1">
                <h5 class="mb-1">Resume Templates</h5>
                <p class="text-muted mb-0">There are total 8 resume templates</p>
            </div>
        </div>

        <div class="card-body">
            <div class="row gy-4">
                <div class="col-12 text-center mt-0">
                    <h3>Choose a template for your resume</h3>
                </div>
                @if ($data->count() > 0)
                    @foreach ($data as $key => $item)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card p-2 h-100 shadow-none border">
                                <div class="rounded-2 text-center mb-3">
                                    <a href="{{ route('resume.create', $item->id) }}" title="{{ $item->name }}">
                                        <img class="img-fluid"
                                            src="{{ URL::to('/') }}/storage/thumb_templates/{{ $item->thumb }}"
                                            alt="tutor image 1" /></a>
                                </div>
                                <div class="card-body p-3 pt-2">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-label-primary">{{ $item->name }}</span>
                                        <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                            4.4 <span class="text-warning"><i
                                                    class="ti ti-star-filled me-1 mt-n1"></i></span><span
                                                class="text-muted">(1.23k)</span>
                                        </h6>
                                    </div>
                                    <a href="{{ route('resume.create', $item->id) }}"
                                        class="app-academy-md-50 btn btn-primary d-flex align-items-end">
                                        <span class="me-2"><i class="ti ti-select ti-sm"></i>Choose</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row mt-2 ml-1">
                        {{ $data->appends(Request::all())->links() }}
                    </div>
                @else
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <div class="error mx-auto mb-3"><i class="far fa-window-maximize"></i></div>
                                <p class="lead text-gray-800">No template found.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/templates.js') }}"></script>
@endpush
