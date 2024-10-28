@extends('layouts.app')

@section('title', 'Career Advisors')

@section('content')
    <!-- Hero section -->
    <div class="heroSectionContainer">
        <img src="{{ asset('assets/img/banner-img-04.png') }}" alt="" />
        <div class="heroSection px-8">
            <h1 class="text-white">Meet Our Career Advisors</h1>
            <p class="subText">Get to know the dedicated professionals</p>
            <p class="subText">behind Alumni Network success.</p>
        </div>
    </div>
    <!-- Hero section -->
    <div class="gap-80px"></div>

    <!-- Annual Alumni Reunion 2024 -->
    <div class="AlumniReunion">
        <div class="left-right-padding grid grid-cols-1 md:grid-cols-2 gap-8 mt-4">
            <div class="leftSide">
                <h2 class="text-left">Dr. Qadeer Ahmad</h2>
                <div style="height:20px"></div>

                <span>President & CEO</span>
                <div style="height:20px"></div>
                <span class="block">Dr. Carter, with over 20 years of pioneering leadership in education, has been the
                    driving force behind fostering innovation and excellence within the Alumni Network. His vision
                    continues to shape the future of our community, creating opportunities for alumni to grow, connect,
                    and thrive.</span>
                <div style="height:20px"></div>
                <button class="viewmore base-bg p-2 flex items-center">View more </button>
            </div>
            <div class="rightSide">
                <img src="{{ asset('assets/img/tm.png') }}" alt="" />
            </div>
        </div>
    </div>
    <div class="gap-80px"></div>

    <!-- Our Esteemed Career Advisors. -->
    <div class="UpcomingEventContainer">
        <div class="globalheadingAndSubHeading left-right-padding ">
            <h2 class="text-left">Our Esteemed Career Advisors</h2>
        </div>
        <div class="gap-40px"></div>
        <div class="left-right-padding grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-4">
            @for ($i = 0; $i < 6; $i++)
                <div class="counsellorsCard">
                    <img class="w-30 h-30 rounded-full" src="{{ asset('assets/img/avatar-02.png') }}" alt="" />
                    <div style="height:20px"></div>
                    <h3 class="nameCon ">Macauley Herring</h3>
                    <div style="height:10px"></div>
                    <span class="designation text-center">CEO & Founder</span>
                    <div style="height:20px"></div>
                    <span class="block voice">Dance is the hidden language of the soul.</span>
                    <div style="height:40px"></div>
                    <div class="socialLinks flex flex-wrap items-center gap-8">
                        <a href="#"><img src="{{ asset('assets/img/linkedin.png') }}" alt="" /></a>
                        <a href="#"><img src="{{ asset('assets/img/twitter.png') }}" alt="" /></a>
                        <a href="#"><img src="{{ asset('assets/img/instagram.png') }}" alt="" /></a>
                        <a href="#"><img src="{{ asset('assets/img/facebook.png') }}" alt="" /></a>
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
    <!-- Our Esteemed Career Advisors. -->
    <div class="gap-80px"></div>

    <!-- Our Support Team -->
    <div class="UpcomingEventContainer">
        <div class="globalheadingAndSubHeading left-right-padding ">
            <h2 class="text-left">Our Support Team</h2>

        </div>
        <div class="gap-40px"></div>
        <div class="left-right-padding grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-4">
            @for ($i = 0; $i < 6; $i++)
                <div class="counsellorsCard">
                    <img class="w-30 h-30 rounded-full" src="{{ asset('assets/img/avatar-02.png') }}" alt="Rounded avatar">
                    <div style="height:20px"></div>
                    <h3 class="nameCon ">Macauley Herring</h3>
                    <div style="height:10px"></div>
                    <span class="designation text-center">CEO & Founder</span>
                    <div style="height:20px"></div>
                    <span class="block voice">Dance is the hidden language of the soul.</span>
                    <div style="height:40px"></div>
                    <div class="socialLinks flex flex-wrap items-center gap-8">
                        <a href="#"><img src="{{ asset('assets/img/linkedin.png') }}" alt="" /></a>
                        <a href="#"><img src="{{ asset('assets/img/twitter.png') }}" alt="" /></a>
                        <a href="#"><img src="{{ asset('assets/img/instagram.png') }}" alt="" /></a>
                        <a href="#"><img src="{{ asset('assets/img/facebook.png') }}" alt="" /></a>
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
    </div>
    <!-- Our Support Team -->
@endsection
