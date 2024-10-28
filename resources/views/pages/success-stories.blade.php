@extends('layouts.app')

@section('title', 'Success Stories')

@section('content')
    <!-- Hero Section -->
    <div class="heroSectionContainer">
        <img src="{{ asset('assets/img/banner-img-02.png') }}" alt="" />
        <div class="heroSection px-8">
            <h1 class="text-white">Success Stories</h1>
            <p class="subText">Discover the inspiring journeys of our alumni and </p>
            <p class="subText">students who have achieved remarkable success.</p>
        </div>
    </div>
    <!-- Hero Section -->
    <div class="gap-80px"></div>

    <!-- Annual Alumni Reunion 2024 -->
    <div class="AlumniReunion">
        <div class="left-right-padding grid grid-cols-1 md:grid-cols-2 gap-8 mt-4">
            <div class="leftSide w-100">
                <div class="nameAndPassingYears flex flex-wrap items-center justify-between !w-[100%]">
                    <h2 class="text-left">Ayesha Khan</h2>

                    <span>Class of 2019s</span>
                </div>
                <div style="height:20px"></div>

                <span>CEO at InnovateTech</span>
                <div style="height:20px"></div>
                <span class="block grayshade">From classroom to boardroom, Emma’s journey is a testament to hard work,
                    determination, and the solid foundation she received at [Institute Name].</span>
                <div style="height:20px"></div>
                <!-- <button class="viewmore base-bg p-2 flex items-center">View more </button> -->
            </div>
            <div class="rightSide">
                <img src="{{ asset('assets/img/img-05.png') }}" alt="" />
            </div>
        </div>
    </div>
    <div class="gap-80px"></div>

    <!-- Success 2024 -->
    <div class="UpcomingEventContainer successStoriesPage">
        <div class="gap-40px"></div>
        <div class="gap-40px"></div>
        <div class="globalheadingAndSubHeading">
            <h2>Success Stories</h2>
            <p class="text-center mt-3">
                Inspiring Journeys of Our Alumni
            </p>
        </div>
        <div class="gap-40px"></div>
        <div class="left-right-padding grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-4">
            @for ($i = 0; $i < 3; $i++)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img style="width:100%;height:300px" class="rounded-t-lg"
                            src="{{ asset('assets/img/avatar-01.png') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#" class="mt-2">
                            <h2 class="cardTitle text-left mb-2 text-2xl tracking-tight text-gray-900 dark:text-white">
                                Jane Doe
                            </h2>
                        </a>
                        <span class="mb-3 font-normal text-[1rem] text-gray-700 dark:text-gray-400">
                            Jane graduated in 2020 and is now a successful entrepreneur in the tech industry.
                        </span>
                        <a href="#"
                            class="flex items-center cardTitle pt-4 text-sm font-medium text-center text-white">
                            <p class="readmore">
                                Read more
                            </p>
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
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
        <div class="gap-40px"></div>
        <div class="gap-40px"></div>
    </div>
    <!-- Success Stories -->
    <div class="gap-80px"></div>
@endsection
