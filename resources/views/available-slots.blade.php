@extends('layouts.admin.master')

@push('styles')
    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/fullcalendar/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/pages/app-calendar.css') }}" />

    <style>
        .fc-v-event {
            background-color: #1E3A8A;
        }

        /* Capitalize and style the day short name */
        .fc-col-header-cell .day-name {
            font-size: 10px;
            text-transform: uppercase;
            /* Capitalize letters */
        }

        /* Increase the font size of the numeric day */
        .fc-col-header-cell .day-number {
            font-size: 20px;
        }
    </style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card app-calendar-wrapper">
            <div class="row mt-4 ms-4">
                <div class="col-4">
                    <select id="instructor_id" name="instructor_id" class="select2 form-select" required>
                        @foreach ($counselors as $counselor)
                            <option value="{{ $counselor->id }}">{{ $counselor->user->name }}</option>
                        @endforeach
                    </select>
                </div>

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
                            <h5 class="offcanvas-title" id="addEventSidebarLabel">Booking Request</h5>
                            <button type="button" class="btn-close text-reset" onclick="reset()" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body pt-0">
                            <div class="alert alert-danger mt-1 alert-validation-msg d-none" role="alert">
                                <div class="alert-body d-flex align-items-center">
                                    <span id="validationMsg"></span>
                                </div>
                            </div>
                            <form>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required
                                        placeholder="Enter a title">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Booking Day</label>
                                    <div id="dayOfWeek" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Start Time</label>
                                    <div id="startTime" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">End Time</label>
                                    <div id="endTime" class="form-control">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between my-4">
                                    <button type="button" class="btn btn-primary btn-add">Book Now</button>
                                    <button type="button" class="btn btn-secondary btn-cancel">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
            btnAdd = document.querySelector('.btn-add'),
            btnCancel = document.querySelector('.btn-cancel'),
            dayOfWeek = document.querySelector('#dayOfWeek'),
            startTime = document.querySelector('#startTime'),
            endTime = document.querySelector('#endTime');

        let eventToUpdate;

        // Init event Offcanvas
        const bsAddEventSidebar = new bootstrap.Offcanvas(addEventSidebar);

        document.addEventListener('DOMContentLoaded', function() {
            (function() {
                let calendar = new Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: fetchEvents, // fetching events from an AJAX
                    plugins: [interactionPlugin, dayGridPlugin, timegridPlugin],
                    editable: true,
                    dragScroll: true,
                    eventResizableFromStart: true,
                    allDaySlot: false,
                    direction: direction,
                    // headerToolbar: {
                    //     start: 'prev,next',
                    //     left: 'title'
                    // },
                    headerToolbar: {
                        left: 'prev,next today', // Navigation buttons
                        center: 'title', // Displays current date range and title
                        right: 'dayGridMonth,timeGridWeek,timeGridDay' // View buttons: Month, Week, Day, Year (list view)
                    },
                    // dayHeaderFormat: {
                    //     weekday: 'short', // 'short' gives abbreviated weekday names (Mon, Tue)
                    //     day: 'numeric' // 'numeric' adds the day of the month (2, 3, etc.)
                    // },
                    // Custom day header content
                    dayHeaderContent: function(arg) {
                        // Get day name (e.g., 'Mon') and day number (e.g., '2')
                        let dayName = new Intl.DateTimeFormat('en', {
                            weekday: 'short'
                        }).format(arg.date);
                        let dayNumber = new Intl.DateTimeFormat('en', {
                            day: 'numeric'
                        }).format(arg.date);

                        // Return the custom HTML structure for day name and number
                        return {
                            html: `<div class="day-name">${dayName}</div><div class="fs-16 day-number">${dayNumber}</div>`
                        };
                    },

                    eventContent: function(info) {
                        // Create the element for the time (start and end)
                        let timeEl = document.createElement('div');
                        timeEl.innerHTML = info
                            .timeText; // FullCalendar automatically generates the time text
                        timeEl.style.color = 'white'; // Set time color to white

                        function formatTime(date) {
                            // Get the hour, minute, and AM/PM parts
                            let hours = date.getHours();
                            let minutes = date.getMinutes().toString().padStart(2,
                                '0'); // Always show two digits for minutes
                            let ampm = hours >= 12 ? 'pm' : 'am'; // Lowercase am/pm

                            // Convert hours to 12-hour format
                            hours = hours % 12 || 12; // Convert 0 to 12 for midnight

                            return `${hours}:${minutes}${ampm}`; // Format time as "h:mmam/pm"
                        }

                        timeEl.innerHTML =
                            `${formatTime(info.event.start)} - ${formatTime(info.event.end)}`; // Show start and end time

                        // Check the event's status
                        if (info.event.extendedProps.status === 'booked' || info.event.extendedProps
                            .status === 'not-available') {
                            timeEl.style.color =
                                'white'; // Change the color to indicate it's not available

                            // Create a label element for the status
                            let statusLabel = document.createElement('div');
                            statusLabel.innerText = info.event.extendedProps.status === 'booked' ?
                                'Booked' : 'Not Available';

                            // Append the label to the time element
                            timeEl.appendChild(statusLabel);
                        }

                        return {
                            domNodes: [timeEl]
                        };
                    },

                    // Capture date range on view change (Next/Previous click)
                    datesSet: function(info) {
                        // Send the dates via AJAX to the backend
                        fetchEvents;

                        updatePrevButtonState(info.start);
                    },

                    eventDidMount: function(info) {
                        // Check the status of the event and style accordingly
                        if (info.event.extendedProps.status === 'booked' || info.event.extendedProps
                            .status === 'not-available') {
                            // Disable the event (you can also add a class to style it)

                            info.el.style.backgroundColor = '#A9A9A9';
                            if (info.event.extendedProps.status === 'not-available') {
                                info.el.style.textDecoration = 'line-through';
                            }
                            info.el.classList.add('disabled-event');
                            info.el.style.pointerEvents = 'none'; // Disable pointer events
                            info.el.style.opacity = '0.5'; // Make it look disabled
                        } else {
                            info.el.style.backgroundColor = '#1E3A8A';
                        }
                    },

                    eventClick: function(info) {
                        if (info.event.extendedProps.status === 'booked' || info.event.extendedProps
                            .status === 'not-available') {
                            // Prevent the default action
                            return;
                        }
                        // Get the clicked event
                        eventToUpdate = info.event;

                        // Open the sidebar to edit the event
                        bsAddEventSidebar.show();

                        // Populate the form with the event data (you can format this accordingly)
                        const formattedDayOfWeek = moment(eventToUpdate.start).format('dddd');
                        const formattedStart = moment(eventToUpdate.start).format('hh:mm A');
                        const formattedEnd = moment(eventToUpdate.end || eventToUpdate.start)
                            .format('hh:mm A');

                        dayOfWeek.innerHTML = formattedDayOfWeek;
                        startTime.innerHTML = formattedStart;
                        endTime.innerHTML = formattedEnd;
                    },
                });

                // Render calendar
                calendar.render();

                // Fetch events when counselor is selected
                $('#instructor_id').on('change', function() {
                    calendar.refetchEvents(); // Refresh calendar events
                });

                btnAdd.addEventListener('click', e => {
                    eventBookingRequest();
                });

                function updatePrevButtonState(startDate) {
                    // TODO Fix - prev btn should disabled on current week
                    const todayStartOfWeek = moment().day('Sunday').startOf('week');

                    // Disable the previous button if the selected week is before today's week
                    const prevButton = document.querySelector('.fc-prev-button');

                    if (moment(startDate).isBefore(todayStartOfWeek)) {
                        prevButton.disabled = true; // Disable the button
                        prevButton.classList.add(
                            'fc-button-disabled'); // Optionally add a class to visually indicate it's disabled
                    } else {
                        prevButton.disabled = false; // Enable the button
                        prevButton.classList.remove('fc-button-disabled'); // Remove disabled class
                    }
                }

                // Add Event
                function eventBookingRequest() {
                    $.ajax({
                        url: "{{ route('booking-requests.store') }}",
                        type: "POST",
                        data: {
                            availability_id: eventToUpdate.id,
                            title: $('#title').val(),
                            date: moment(eventToUpdate.start).format('YYYY-MM-DD'),
                        },
                        success: function(response) {
                            if (response.success) {
                                // Validation passed, handle success case
                                calendar.refetchEvents();
                                bsAddEventSidebar.hide();
                                reset();

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

                // Function to send week start and end dates via AJAX
                function fetchEvents(info, successCallback) {
                    // Get start and end of the week from the info object
                    const startDate = moment(info.start).format('YYYY-MM-DD');
                    const endDate = moment(info.end).format('YYYY-MM-DD');

                    $.ajax({
                        url: "{{ route('availabilities.fetch') }}", // Your backend route
                        type: "GET",
                        data: {
                            instructor_id: $('#instructor_id').val(),
                            start_date: startDate, // Pass start date
                            end_date: endDate, // Pass end of the week
                        },
                        success: function(response) {
                            if (response.success) {
                                console.log(response.data);
                                successCallback(response.data);
                            } else {
                                console.log(response.errors);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('AJAX Error:', error);
                        }
                    });
                }

                btnCancel.addEventListener('click', e => {
                    bsAddEventSidebar.hide();
                    reset();
                });
            })();
        });

        function reset(){
            $('.alert-validation-msg').addClass('d-none');
            $('#title').val('');
        }
    </script>
@endpush
