@extends('layouts.app')

@section('title', 'Events and News')

@section('content')
    <!-- Hero section -->
    <div class="heroSectionContainer">
        <img src="{{ asset('assets/img/banner-img-03.png') }}" alt="" />
        <div class="heroSection px-8">
            <h1 class="text-white">Event</h1>
            <p class="subText">Discover the inspiring journeys of our alumni and </p>
            <p class="subText">students who have achieved remarkable success.</p>
        </div>
    </div>
    <!-- Hero section -->
    <div class="gap-80px"></div>

    <!-- Annual Alumni Reunion 2024 -->
    <div class="AlumniReunion">
        <div class="left-right-padding grid grid-cols-1 md:grid-cols-2 gap-8 mt-4">
            <div class="leftSide">
                <h2 class="text-left">Annual Alumni Reunion 2024</h2>
                <div style="height:20px"></div>

                <span>August 1, 2024</span>
                <div style="height:20px"></div>
                <span class="block">Reconnect with fellow alumni and celebrate our shared journey. Enjoy a night of
                    memories,
                    networking,
                    and inspiring speeches</span>
                <div style="height:20px"></div>
                <button class="viewmore base-bg p-2 flex items-center">View more </button>
            </div>
            <div class="rightSide">
                <img src="{{ asset('assets/img/img-03.png') }}" alt="" />
            </div>
        </div>
    </div>
    <!-- Annual Alumni Reunion 2024 -->
    <div class="gap-80px"></div>

    <!-- Upcoming Events -->
    <div class="UpcomingEventContainer">
        <div class="globalheadingAndSubHeading">
            <h2>Upcoming Events</h2>
            <p class="text-center mt-3">
                Join Us in Our Upcoming Workshops, Lectures, and Fairs
            </p>
        </div>
        <div class="gap-40px"></div>
        <div class="left-right-padding grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-4">
            @for ($i = 0; $i < 6; $i++)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img style="width:100%" class="rounded-t-lg" src="{{ asset('assets/img/img-02.png') }}"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <span class="!text-slate-500">19 Jan 2022</span>
                        <a href="#" class="mt-2">
                            <h2 class="cardTitle text-left mb-2 text-2xl tracking-tight text-gray-900 dark:text-white">
                                Innovations in Education
                            </h2>
                        </a>
                        <span class="mb-3 font-normal text-[1rem] text-gray-700 dark:text-gray-400">
                            Join us for an insightful lecture on the latest trends in
                            education and Network.
                            </sp>
                            <a href="#"
                                class="flex items-center cardTitle pt-4 text-sm font-medium text-center text-white">
                                <p class="readmore">

                                    Read more
                                </p>
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                    </div>
                </div>
            @endfor
        </div>
        <div class="gap-40px"></div>
        <div class="flex justify-end left-right-padding ">
            <button class="viewmore base-bg p-2 flex items-center">View more <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg></button>
        </div>
    </div>
    <!-- Upcoming Events -->
    <div class="gap-80px"></div>
@endsection
