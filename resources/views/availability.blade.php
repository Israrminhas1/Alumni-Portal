@extends('layouts.admin.master')

@push('styles')
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin-assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/fonts/fontawesome.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/fullcalendar/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/select2/select2.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/pages/app-calendar.css') }}" />

    <style>
        .fc-v-event {
            background-color: #1E3A8A !important;
        }
    </style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container">
        <div class="row">
            <h2>Availabilities</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Availabilities
                    </li>
                </ol>
            </div>
        </div>
        <div class="card app-calendar-wrapper">
            <div class="row mt-4 me-4">
                <!-- Calendar Sidebar -->
                <div class="col-6 offset-6 text-end">
                    <button class="btn btn-primary btn-toggle-sidebar" data-bs-toggle="offcanvas"
                        data-bs-target="#addEventSidebar" aria-controls="addEventSidebar">
                        <i class="ti ti-plus me-1"></i>
                        <span class="align-middle">Add new availability</span>
                    </button>
                </div>
                <!-- /Calendar Sidebar -->

                <!-- Calendar & Modal -->
                <div class="app-calendar-content">
                    <div class="card shadow-none border-0">
                        <div class="card-body pb-0">
                            <!-- FullCalendar -->
                            <div id="calendar"></div>
                        </div>
                    </div>
                    <div class="app-overlay"></div>
                    <!-- FullCalendar Offcanvas -->
                    <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="addEventSidebar"
                        aria-labelledby="addEventSidebarLabel">
                        <div class="offcanvas-header my-1">
                            <h5 class="offcanvas-title" id="addEventSidebarLabel">Add new availability</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body pt-0">
                            <form class="pt-0" id="availabilityForm" action="" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label" for="dayOfWeek">Day of Week</label>
                                    <input type="text" class="form-control" id="dayOfWeek" name="day_of_week"
                                        placeholder="Enter day of week" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="startTime">Start Time</label>
                                    <input type="text" class="form-control startTime" name="start_time"
                                        placeholder="YYYY-MM-DD HH:MM" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="endTime">End Time</label>
                                    <input type="text" class="form-control endTime" name="end_time"
                                        placeholder="YYYY-MM-DD HH:MM" />
                                </div>
                                <div class="mb-3 d-flex justify-content-sm-start my-4">
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-add me-sm-3 me-1">Add</button>
                                    </div>
                                    <div><button class="btn btn-label-danger btn-delete d-none">Delete</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Calendar & Modal -->
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection

@push('scripts')
    <!-- Core JS -->
    <script src="{{ asset('admin-assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('admin-assets/vendor/libs/fullcalendar/fullcalendar.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

    <script>
        let direction = 'ltr';

        if (isRtl) {
            direction = 'rtl';
        }

        const calendarEl = document.getElementById('calendar'),
            addEventSidebar = document.getElementById('addEventSidebar'),
            appOverlay = document.querySelector('.app-overlay'),
            offcanvasTitle = document.querySelector('.offcanvas-title'),
            btnToggleSidebar = document.querySelector('.btn-toggle-sidebar'),
            btnSubmit = document.querySelector('button[type="submit"]'),
            btnDelete = document.querySelector('.btn-delete'),
            dayOfWeek = document.querySelector('#dayOfWeek'),
            startTime = document.querySelector('.startTime'),
            endTime = document.querySelector('.endTime');

        let eventToUpdate,
            isFormValid = false;

        // Init event Offcanvas
        const bsAddEventSidebar = new bootstrap.Offcanvas(addEventSidebar);

        document.addEventListener('DOMContentLoaded', function() {
            (function() {
                // Event start (flatpicker)
                if (startTime) {
                    var start = startTime.flatpickr({
                        enableTime: true,
                        noCalendar: true,
                        altFormat: 'H:i K',
                        onReady: function(selectedDates, dateStr, instance) {
                            if (instance.isMobile) {
                                instance.mobileInput.setAttribute('step', null);
                            }
                        }
                    });
                }
                // Event end (flatpicker)
                if (endTime) {
                    var end = endTime.flatpickr({
                        enableTime: true,
                        noCalendar: true,
                        altFormat: 'H:i K',
                        onReady: function(selectedDates, dateStr, instance) {
                            if (instance.isMobile) {
                                instance.mobileInput.setAttribute('step', null);
                            }
                        }
                    });
                }

                let calendar = new Calendar(calendarEl, {
                    initialView: 'timeGridWeek',
                    events: fetchEvents, // fetching events from a function or API
                    plugins: [interactionPlugin, timegridPlugin],
                    editable: true,
                    dragScroll: true,
                    selectable: true, // Enable selecting time slots
                    selectMirror: true, // Enables mirror feedback when selecting time slots
                    eventResizableFromStart: true,
                    allDaySlot: false,
                    headerToolbar: {
                        start: '',
                        end: ''
                    },
                    dayHeaderFormat: {
                        weekday: 'short' // This will display only the weekday name without the date
                    },
                    direction: direction,

                    eventContent: function(info) {

                        // Create the element for the time (start and end)
                        let timeEl = document.createElement('div');
                        timeEl.innerHTML = info
                            .timeText; // FullCalendar automatically generates the time text
                        timeEl.style.color = 'white'; // Set time color to white

                        return {
                            domNodes: [timeEl]
                        };
                    },

                    // Function to update UI when selecting time slots
                    select: function(info) {
                        // Format the start and end time using moment.js
                        const formattedStart = moment(info.start).format('hh:mm A');
                        const formattedEnd = moment(info.end).format('hh:mm A');

                        // Show the sidebar or form to add the event after selection
                        resetValues(); // Reset previous values
                        bsAddEventSidebar.show(); // Show the sidebar

                        // Set the title and button for adding a new event
                        if (offcanvasTitle) {
                            offcanvasTitle.innerHTML = 'Add new availability';
                        }
                        btnSubmit.innerHTML = 'Add';
                        btnSubmit.classList.remove('btn-update');
                        btnSubmit.classList.add('btn-add');
                        btnDelete.classList.add('d-none');

                        // Update input fields with selected start and end times
                        dayOfWeek.value = moment(info.start).format('dddd');
                        startTime.value = formattedStart;
                        endTime.value = formattedEnd;

                        // Set the Flatpickr calendar inputs with selected date/time
                        start.setDate(info.start, true); // Set start date/time
                        end.setDate(info.end || info.start, true); // Set end date/time
                    },

                    eventClick: function(info) {
                        // Populate the form with the clicked event's data
                        eventToUpdate = info.event;
                        bsAddEventSidebar.show(); // Open sidebar

                        // Change title and button to indicate "Update availability"
                        if (offcanvasTitle) {
                            offcanvasTitle.innerHTML = 'Update availability';
                        }
                        btnSubmit.innerHTML = 'Update';
                        btnSubmit.classList.add('btn-update');
                        btnSubmit.classList.remove('btn-add');
                        btnDelete.classList.remove('d-none');

                        // Set the form fields with event data
                        const formattedStart = moment(eventToUpdate.start).format('hh:mm A');
                        const formattedEnd = moment(eventToUpdate.end || eventToUpdate.start)
                            .format('hh:mm A');
                        dayOfWeek.value = moment(eventToUpdate.start).format('dddd');
                        startTime.value = formattedStart;
                        endTime.value = formattedEnd;

                        // Set the Flatpickr fields to reflect the event data
                        start.setDate(eventToUpdate.start, true);
                        end.setDate(eventToUpdate.end || eventToUpdate.start, true);
                    },
                });

                // Render calendar
                calendar.render();

                btnSubmit.addEventListener('click', e => {
                    let formData = $('#availabilityForm').serialize();

                    if (isFormValid) {
                        if (eventToUpdate?.id) {
                            formData += '&id=' + eventToUpdate.id;
                        }
                        addEvent(formData);
                        bsAddEventSidebar.hide();

                    }
                });

                const availabilityForm = document.getElementById('availabilityForm');
                const fv = FormValidation.formValidation(availabilityForm, {
                        fields: {
                            dayOfWeek: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please enter day of week '
                                    }
                                }
                            },
                            startTime: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please enter start time '
                                    }
                                }
                            },
                            endTime: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please enter end time '
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap5: new FormValidation.plugins.Bootstrap5({
                                // Use this for enabling/changing valid/invalid class
                                eleValidClass: '',
                                rowSelector: function(field, ele) {
                                    // field is the field name & ele is the field element
                                    return '.mb-3';
                                }
                            }),
                            submitButton: new FormValidation.plugins.SubmitButton(),
                            // Submit the form when all fields are valid
                            // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                            autoFocus: new FormValidation.plugins.AutoFocus()
                        }
                    })
                    .on('core.form.valid', function() {
                        // Jump to the next step when all fields in the current step are valid
                        isFormValid = true;
                    })
                    .on('core.form.invalid', function() {
                        // if fields are invalid
                        isFormValid = false;
                    });

                // Add Event
                function addEvent(eventData) {
                    $.ajax({
                        url: "{{ route('availabilities.store') }}", // Get form action URL
                        type: "POST", // Get form method (POST, GET, etc.)
                        data: eventData, // Set form data
                        success: function(response) {
                            if (response.success) {
                                // Validation passed, handle success case
                                bsAddEventSidebar.hide();
                                calendar.refetchEvents();
                                formData = {};

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
                }

                function fetchEvents(info, successCallback) {
                    $.ajax({
                        url: "{{ route('availabilities.fetch') }}", // Get form action URL
                        type: 'GET', // Get form method (POST, GET, etc.)
                        success: function(response) {
                            if (response.success) {
                                console.log(response.data);
                                successCallback(response.data);
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
                }

                // Delete Event
                btnDelete.addEventListener('click', e => {
                    e.preventDefault();
                    $.ajax({
                        url: "availabilities/" + eventToUpdate.id, // Get form action URL
                        type: 'DELETE', // Get form method (POST, GET, etc.)
                        success: function(response) {
                            if (response.success) {
                                // Validation passed, handle success case
                                bsAddEventSidebar.hide();
                                calendar.refetchEvents();

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

                // Reset event form inputs values
                // ------------------------------------------------
                function resetValues() {
                    endTime.value = '';
                    startTime.value = '';
                    dayOfWeek.value = '';
                }

                // When modal hides reset input values
                addEventSidebar.addEventListener('hidden.bs.offcanvas', function() {
                    resetValues();
                });

                // Hide left sidebar if the right sidebar is open
                btnToggleSidebar.addEventListener('click', e => {
                    if (offcanvasTitle) {
                        offcanvasTitle.innerHTML = 'Add new availability';
                    }
                    btnSubmit.innerHTML = 'Add';
                    btnSubmit.classList.remove('btn-update');
                    btnSubmit.classList.add('btn-add');
                    btnDelete.classList.add('d-none');
                    appCalendarSidebar.classList.remove('show');
                    appOverlay.classList.remove('show');
                });
            })();
        });
    </script>
@endpush
