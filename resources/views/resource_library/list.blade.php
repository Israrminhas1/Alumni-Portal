@extends('layouts.admin.master')

@section('title', 'Resource Library')

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
    <div class="card p-0 mb-4">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
            <div class="app-academy-md-25 card-body py-0">
                <img src="{{ asset('assets/img/illustrations/bulb-light.png') }}"
                    class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand"
                    data-app-light-img="{{ asset('assets/img/illustrations/bulb-light.png') }}" data-app-dark-img="{{ asset('assets/img/illustrations/bulb-dark.png') }}"
                    height="90" />
            </div>
            <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                <h3 class="card-title mb-4 lh-sm px-md-5 lh-lg">
                    Education, talents, and career opportunities.
                    <span class="text-primary fw-medium text-nowrap">All in one place</span>.
                </h3>
                <p class="mb-3">
                    Grow your skill with the most reliable online courses and certifications in marketing,
                    information technology, programming, and data science.
                </p>
                <div class="d-flex align-items-center justify-content-between app-academy-md-80">
                    <input type="search" placeholder="Find your course" class="form-control me-2" />
                    <button type="submit" class="btn btn-primary btn-icon"><i class="ti ti-search"></i></button>
                </div>
            </div>
            <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                <img src="../../assets/img/illustrations/pencil-rocket.png" alt="pencil rocket" height="188"
                    class="scaleX-n1-rtl" />
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between gap-3">
            <div class="card-title mb-0 me-1">
                <h5 class="mb-1">Resource Library</h5>
                <p class="text-muted mb-0">There are total 6 courses</p>
            </div>
            <div class="d-flex justify-content-md-end align-items-center gap-4 flex-wrap">
                <select id="select2_course_select" class="select2 form-select" data-placeholder="Resource Library">
                    <option value="">Select Type</option>
                    <option value="pdf">Pdf</option>
                    <option value="docs">Docs</option>
                    <option value="video">Video</option>
                </select>

                <label class="switch">
                    <input type="checkbox" class="switch-input" />
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    <span class="switch-label text-nowrap mb-0">Hide completed</span>
                </label>
            </div>
        </div>
        <div class="card-body">
            <div class="row gy-4 mb-4">
                {{-- @foreach ($resources as $resource) --}}
                @for ($i = 1; $i <= 6; $i++)
                    <div class="col-sm-6 col-lg-4">
                        <div class="card p-2 h-100 shadow-none border">
                            <div class="rounded-2 text-center mb-3">
                                <a href="javascript:void()"><img class="img-fluid"
                                        src="../../assets/img/pages/app-academy-tutor-{{ $i }}.png"
                                        alt="tutor image 1" /></a>
                            </div>
                            <div class="card-body p-3 pt-2">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span
                                        class="badge bg-label-{{ $i % 2 ? 'info' : 'primary' }}">{{ $resource->name ?? ($i % 2 ? 'pdf' : 'video') }}</span>
                                    <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                        4.4 <span class="text-warning"><i
                                                class="ti ti-star-filled me-1 mt-n1"></i></span><span
                                            class="text-muted">(1.23k)</span>
                                    </h6>
                                </div>
                                {{-- <a href="javascript:void()" class="h5">Basics of Angular</a>
                                <p class="mt-2">Introductory course for Angular and framework basics in web development.
                                </p> --}}
                                <p class="d-flex align-items-center"><i class="ti ti-clock me-2 mt-n1"></i>30 minutes</p>
                                <div class="progress mb-4" style="height: 8px">
                                    <div class="progress-bar w-{{ $i % 2 == 0 ? '0' : '50' }}" role="progressbar"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-2 text-nowrap">
                                    @if ($i % 2 == 0)
                                        <a class="app-academy-md-50 btn btn-label-secondary me-md-2 d-flex align-items-center"
                                            href="javascript:void()">
                                            <i
                                                class="ti ti-rotate-clockwise-2 align-middle scaleX-n1-rtl me-2 mt-n1 ti-sm"></i><span>Start
                                                Over</span>
                                        </a>
                                    @else
                                        <a class="app-academy-md-50 btn btn-label-primary d-flex align-items-center"
                                            href="javascript:void()">
                                            <span class="me-2">Continue</span><i
                                                class="ti ti-chevron-right scaleX-n1-rtl ti-sm"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript"></script>
@endpush
