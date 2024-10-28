@extends('layouts.admin.master')

@push('styles')
    <!-- Page CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/fullcalendar/fullcalendar.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/pages/app-calendar.css') }}" />
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card app-calendar-wrapper">
            <div class="row g-0">
                <div class="col app-calendar-content">
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
                            <h5 class="offcanvas-title" id="addEventSidebarLabel">Session</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body pt-0">
                            <form>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <div id="title" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Session Day</label>
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
            appOverlay = document.querySelector('.app-overlay'),
            btnToggleSidebar = document.querySelector('.btn-toggle-sidebar'),
            title = document.querySelector('#title'),
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

                    // Capture date range on view change (Next/Previous click)
                    datesSet: function(info) {
                        // Send the dates via AJAX to the backend
                        fetchEvents;

                        updatePrevButtonState(info.start);
                    },

                    eventClick: function(info) {
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
                        title.innerHTML = eventToUpdate.title;
                    },
                });

                // Render calendar
                calendar.render();

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

                // Function to send week start and end dates via AJAX
                function fetchEvents(info, successCallback) {
                    // Get start and end of the week from the info object
                    const startDate = moment(info.start).format('YYYY-MM-DD');
                    const endDate = moment(info.end).format('YYYY-MM-DD');

                    $.ajax({
                        url: "{{ route('bookings.fetch') }}",
                        type: "GET",
                        data: {
                            start_date: startDate,
                            end_date: endDate,
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
            })();
        });
    </script>
@endpush
