@extends('layouts.admin.master')

@section('title', 'My Resumes')

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/quill/editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/tagify/tagify.css') }}"">
    <style>
        .accordion-button::after {
            margin-left: 0;
        }
    </style>
@endpush

@section('content')
    <!-- Multi Column with Form Separator -->
    <div class="card mb-4">
        <h5 class="card-header">{{ $template->name }}</h5>
        <form class="card-body" action="{{ route('resume.save') }}" method="POST">
            @csrf

            <input type="hidden" name="template_id" value="{{ $template->id }}">

            <h5>Personal Details</h5>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label" for="multicol-job-title">Job Title</label>
                    <input type="text" id="multicol-job-title" class="form-control" name="job_title" value="" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="profile-photo">Upload Photo</label>
                    <input type="file" id="profile-photo" class="form-control" name="profile_photo" value="" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-first-name">First Name</label>
                    <input type="text" id="multicol-first-name" class="form-control" name="first_name" value="{{ $user->name }}" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-last-name">Last Name</label>
                    <input type="text" id="multicol-last-name" class="form-control" name="last_name" value="" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-email">Email</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="multicol-email" class="form-control" name="email" value="{{ $user->email }}"
                            aria-label="" aria-describedby="multicol-email2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-phone">Phone No</label>
                    <input type="text" id="multicol-phone" class="form-control phone-mask" name="phone" value="{{ $user->phone }}"
                        placeholder="+92 xxx xxxxxxx" aria-label="" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-country">Country</label>
                    <select id="multicol-country" class="select2 form-select" name="country" data-allow-clear="true">
                        <option value="">Select</option>
                        <option value="Australia">Australia</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Canada">Canada</option>
                        <option value="China">China</option>
                        <option value="France">France</option>
                        <option value="Germany">Germany</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Japan">Japan</option>
                        <option value="Korea">Korea, Republic of</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Russia">Russian Federation</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="collapsible-state">State</label>
                    <select id="collapsible-state" class="select2 form-select" name="state" data-allow-clear="true">
                        <option value="">Select</option>
                        <option value="1">Azad Kashmir</option>
                        <option value="2">Balochistan</option>
                        <option value="3">Federally Administered Tribal Areas</option>
                        <option value="4">Gilgit-Baltistan</option>
                        <option value="5">Islamabad Capital Territory</option>
                        <option value="6">Khyber Pakhtunkhwa</option>
                        <option value="7">Punjab</option>
                        <option value="8">Sindh</option>
                    </select>
                </div>
                <!-- Collapsible Section -->
                <div class="mt-4 p-0">
                    <div class="accordion" id="collapsibleSection">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingDeliveryAddress">
                                <button type="button" class="accordion-button text-primary" data-bs-toggle="collapse"
                                    data-bs-target="#collapseDeliveryAddress" aria-expanded="false"
                                    aria-controls="collapseDeliveryAddress">
                                    Add more detail
                                </button>
                            </h2>
                            <div id="collapseDeliveryAddress" class="accordion-collapse collapse"
                                data-bs-parent="#collapsibleSection">
                                <div class="accordion-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="collapsible-pincode">Postal Code</label>
                                            <input type="text" id="collapsible-pincode" class="form-control"
                                                name="postal_code" value="{{ $user->postal_code }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="collapsible-phone">Driving License</label>
                                            <input type="text" id="collapsible-phone" class="form-control phone-mask"
                                                name="driving_license" value="{{ $user->driving_license }}" aria-label="" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="collapsible-address">Address</label>
                                            <textarea name="address" class="form-control" id="collapsible-address" rows="2">
                                                {{ $user->address }}
                                            </textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="collapsible-nationality">Nationality</label>
                                            <input type="text" id="collapsible-nationality" class="form-control"
                                                name="nationality" value="{{ $user->nationality }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="multicol-birthdate">Date of Birth</label>
                                            <input type="text" id="multicol-birthdate" class="form-control dob-picker"
                                                name="date_of_birth" value="{{ $user->dob }}" placeholder="YYYY-MM-DD" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4 mx-n4" />
            <div class="row">
                <div class="col-12">
                    <h5 class="m-0"> Professional Summary</h5>
                    <span>
                        Write 2-4 short, energetic sentences about how great you are. Mention the role and what you
                        did. What were the big achievements? Describe your motivation and list your skills.
                    </span>
                    <div class="my-3">
                        <div id="snow-toolbar-2">
                            <span class="ql-formats">
                                <select class="ql-font"></select>
                                <select class="ql-size"></select>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-bold"></button>
                                <button class="ql-italic"></button>
                                <button class="ql-underline"></button>
                                <button class="ql-strike"></button>
                            </span>
                            <span class="ql-formats">
                                <select class="ql-color"></select>
                                <select class="ql-background"></select>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-script" value="sub"></button>
                                <button class="ql-script" value="super"></button>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-header" value="1"></button>
                                <button class="ql-header" value="2"></button>
                                <button class="ql-blockquote"></button>
                                <button class="ql-code-block"></button>
                            </span>
                        </div>
                        <div id="snow-editor-2">
                            <p>
                                Curious science teacher with 8+ years of experience and a track record of...
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4 mx-n4" />
            <div class="row">
                <div class="col-12">
                    <h5 class="m-0">Employment History</h5>
                    <span>Show your relevant experience. Use bollet points to note your achievements.</span>
                    <!-- Employment Repeater -->
                    <div class="employment-repeater mt-3">
                        <div data-repeater-list="experience">
                            <div data-repeater-item>
                                <div class="row">
                                    <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                        <label class="form-label" for="employment-repeater-1-1">Job Title</label>
                                        <input type="text" id="multicol-repeater-1-1" class="form-control"
                                            name="job_title" value="" />
                                    </div>
                                    <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                        <label class="form-label" for="employment-repeater-1-2">Employer</label>
                                        <input type="text" id="employment-repeater-1-2" class="form-control" />
                                    </div>
                                    <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                        <label for="employment-repeater-1-3" class="form-label">Start & End
                                            Date</label>
                                        <div class="input-group input-daterange" id="bs-datepicker-daterange">
                                            <input type="text" id="dateRangePicker employment-repeater-1-3"
                                                placeholder="MM/YYYY" class="form-control" name="start_date" value="" />
                                            <span class="input-group-text">to</span>
                                            <input type="text" placeholder="MM/YYYY" class="form-control" name="end_date" value=""/>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                        <label class="form-label" for="employment-repeater-1-4">City</label>
                                        <select id="employment-repeater-1-4" class="select2 form-select" name="city"
                                            data-allow-clear="true">
                                            <option value="">Select</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Canada">Canada</option>
                                            <option value="China">China</option>
                                            <option value="France">France</option>
                                            <option value="Germany">Germany</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Korea">Korea, Republic of</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Russia">Russian Federation</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <h5 class="m-0">Description</h5>
                                        <div id="description-repeater-1-5">
                                            <div id="snow-toolbar-1">
                                                <span class="ql-formats">
                                                    <select class="ql-font"></select>
                                                    <select class="ql-size"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-bold"></button>
                                                    <button class="ql-italic"></button>
                                                    <button class="ql-underline"></button>
                                                    <button class="ql-strike"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <select class="ql-color"></select>
                                                    <select class="ql-background"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-script" value="sub"></button>
                                                    <button class="ql-script" value="super"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-header" value="1"></button>
                                                    <button class="ql-header" value="2"></button>
                                                    <button class="ql-blockquote"></button>
                                                    <button class="ql-code-block"></button>
                                                </span>
                                            </div>
                                            <div id="snow-editor-1">
                                                <p>
                                                    Curious science teacher with 8+ years of experience and a track record
                                                    of...
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                        <a href="javascript:void(0);" class="text-center" data-repeater-delete>
                                            <i class="text-danger tf-icons ti ti-trash-x"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <a href="javascript:void(0);" class="text-primary" data-repeater-create>
                                <i class="ti ti-plus me-1"></i>
                                <span class="align-middle">Add Employment</span>
                            </a>
                        </div>
                    </div>
                    <!-- /Employment Repeater -->
                </div>
            </div>

            <hr class="my-4 mx-n4" />
            <div class="row">
                <div class="col-12">
                    <h5 class="m-0">Education</h5>
                    <span>A varied education on your resume that sum up the value that your learnings and background will
                        bring to job.</span>
                    <!-- Education Repeater -->
                    <div class="education-repeater mt-3">
                        <div data-repeater-list="education">
                            <div data-repeater-item>
                                <ul class="list-group list-group-flush" id="handle-list-1">
                                    <li class="list-group-item lh-1 px-0">
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="me-4">
                                                <i
                                                    class="drag-handle cursor-grab ti ti-grip-vertical align-text-bottom"></i>
                                            </div>
                                            <div class="row m-3">
                                                <div class="">
                                                    <label class="form-label" for="education-repeater-1-1">School</label>
                                                    <input type="text" id="education-repeater-1-1"
                                                        class="form-control" name="school" value="" />
                                                </div>
                                                <div class="mt-3">
                                                    <label for="education-repeater-1-3" class="form-label">Start & End
                                                        Date</label>
                                                    <div class="input-group input-daterange" id="bs-datepicker-daterange">
                                                        <input type="text" id="dateRangePicker education-repeater-1-3"
                                                            placeholder="MM/YYYY" class="form-control" name="start_date" value="" />
                                                        <span class="input-group-text">to</span>
                                                        <input type="text" placeholder="MM/YYYY"
                                                            class="form-control" name="end_date" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row m-3">
                                                <div class="">
                                                    <label class="form-label" for="education-repeater-1-1">Degree</label>
                                                    <input type="text" id="education-repeater-1-2"
                                                        class="form-control" name="degree" value="" />
                                                </div>
                                                <div class="mt-3">
                                                    <label class="form-label" for="education-repeater-1-4">City</label>
                                                    <select id="education-repeater-1-4" class="form-select" name="city">
                                                        <option value="Designer">Designer</option>
                                                        <option value="Developer">Developer</option>
                                                        <option value="Tester">Tester</option>
                                                        <option value="Manager">Manager</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="me-2">
                                                <a href="javascript:void(0);" class="" data-repeater-delete>
                                                    <i class="text-danger tf-icons ti ti-trash-x"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-0">
                            <a href="javascript:void(0);" class="text-primary" data-repeater-create>
                                <i class="ti ti-plus me-1"></i>
                                <span class="align-middle">Add Education</span>
                            </a>
                        </div>
                    </div>
                    <!-- /Education Repeater -->
                </div>
            </div>

            <hr class="my-4 mx-n4" />
            <div class="row">
                <div class="col-12">
                    <h5 class="m-0">Websites & Social Links</h5>
                    <span>You can add links to websites you want hiring managers to see! Perhaps it will be a link to your
                        portfolio, LinkedIn profile, or personal website.</span>
                    <!-- Websites & Social Links Repeater -->
                    <div class="link-repeater mt-3">
                        <div data-repeater-list="social_link">
                            <div data-repeater-item>
                                <ul class="list-group list-group-flush" id="handle-list-2">
                                    <li class="list-group-item lh-1 px-0">
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="me-4">
                                                <i
                                                    class="drag-handle cursor-grab ti ti-grip-vertical align-text-bottom"></i>
                                            </div>
                                            <div class="me-2">
                                                <label class="form-label" for="link-repeater-1-1">Label</label>
                                                <input type="text" id="link-repeater-1-1" class="form-control"
                                                    name="social_label" value="" />
                                            </div>
                                            <div class="me-2">
                                                <label class="form-label" for="link-repeater-1-1">Link</label>
                                                <input type="text" id="link-repeater-1-2" class="form-control"
                                                    name="social_link" value="" />
                                            </div>
                                            <div class="me-2">
                                                <a href="javascript:void(0);" class="" data-repeater-delete>
                                                    <i class="text-danger tf-icons ti ti-trash-x"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-0">
                            <a href="javascript:void(0);" class="text-primary" data-repeater-create>
                                <i class="ti ti-plus me-1"></i>
                                <span class="align-middle">Add one or more link</span>
                            </a>
                        </div>
                    </div>
                    <!-- /Websites & Social Links Repeater -->
                </div>
            </div>

            <hr class="my-4 mx-n4" />
            <div class="row">
                <div class="col-12">
                    <h5>Skills</h5>
                    <!-- Custom Suggestions: Inline -->
                    <div class="col-md-6">
                        <label for="TagifyCustomInlineSuggestion" class="form-label">Choose 5 important skills that show
                            you fit the position. Make sure they match the key skills mentioned in the job listing
                            (especially when applying via an online system).</label>
                        <input id="TagifyCustomInlineSuggestion" name="skill" class="form-control"
                            placeholder="select technologies" value="css, html, javascript" />
                    </div>
                    <!-- Custom Suggestions: List -->
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" value="save" class="btn btn-primary me-sm-3 me-1">Save</button>
                <button type="submit" value="saveandpreview" class="btn btn-primary me-sm-3 me-1" id="saveandbuilder">Save & Preview</button>
                <button type="reset" class="btn btn-label-secondary">Cancel</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin-assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('admin-assets/js/forms-editors.js') }}"></script>

    <script src="{{ asset('admin-assets/js/forms-extras.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/sortablejs/sortable.js') }}"></script>
    <script src="{{ asset('admin-assets/js/extended-ui-drag-and-drop.js') }}"></script>
    <script src="{{ asset('admin-assets/js/forms-tagify.js') }}"></script>
    <script></script>
@endpush
