@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Banner -->
    <div class="bannerContainer">
        <img src="{{ asset('assets/img/banner-img-01.png') }}" alt="" />
        <div class="wordsAndBtn px-8">
            <div class="bannerwords">
                <h1 class="!text-left sm:text-center md:!text-left">
                    Empowering Alumni,
                </h1>
                <h1 class="text-left sm:text-center md:text-left">Shaping Futures</h1>
                <p class="text-left sm:text-center md:text-left">
                    Connecting You with Opportunities &
                </p>
                <p class="text-left sm:text-center">Resources for Lifelong Success</p>
            </div>
            <div class="mt-10 flex justify-center flex-wrap gap-2">
                <a href="#"
                    class="btn base-bg text-white base-bg focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Join
                    the Network</a>
                <a href="#"
                    class="tertiary-bg btn text-white base-bg focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Explore
                    Success Stories</a>
            </div>
        </div>
    </div>
    <!-- Banner -->

    <!-- Our Global Impact -->
    <div class="globalImpactContainer">
        <div class="globalImg">
            <img src="{{ asset('assets/img/BG.png') }}" alt="" />
        </div>
        <div class="globalStatics">
            <div class="globalheadingAndSubHeading">
                <h2 class="text-white">Our Global Impact</h2>
                <p class="text-center mt-3 text-white">
                    Connecting Alumni Across the World
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                <div class="flex justify-center flex-col items-center">
                    <h1 class="text-white">32,060</h1>
                    <p class="text-white">Active Alumni Profiles</p>
                </div>
                <div class="text-center flex justify-center flex-col items-center text-white">
                    <h1 class="text-white">64</h1>
                    <p>Countries Represented</p>
                </div>
                <div class="text-center flex justify-center flex-col items-center text-white">
                    <h1 class="text-white">40</h1>
                    <p>Industrial Sectors</p>
                </div>
                <div class="text-center flex justify-center flex-col items-center text-white">
                    <h1 class="text-white">17</h1>
                    <p>Constituent Alumni Associations</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Global Impact -->
    <div class="gap-40px"></div>

    <!-- Explore Your Career Path -->
    <div class="careerPathContainer">
        <div class="globalheadingAndSubHeading">
            <h2>Explore Your Career Path</h2>
            <p class="text-center mt-3">
                Discover job opportunities that align with your skills and ambitions.
            </p>
        </div>
        <div class="gap-40px"></div>

        <div class="left-right-padding grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-4">
            <div class="base-bg componentContainer">
                <img style="border: 1px solid #f2f2f2" src="{{ asset('assets/img/mail-icon.png') }}./assets/mail-icon.png"
                    alt="" />
                <div style="height: 20px"></div>
                <h3 class="text-white">Project Manager</h3>
                <div style="height: 20px"></div>
                <p class="text-white">
                    Oversee projects from initiation to completion, ensuring timely
                    delivery.
                </p>
            </div>
            <div class="componentContainer">
                <img style="border: 1px solid #f2f2f2" src="{{ asset('assets/img/chart-line-icon.png') }}" alt="" />
                <div style="height: 20px"></div>
                <h3>Software Developer</h3>
                <div style="height: 20px"></div>
                <p>Join our development team and work on cutting-edge projects.</p>
            </div>
            <div class="componentContainer">
                <img style="border: 1px solid #f2f2f2" src="{{ asset('assets/img/user-icon.png') }}" alt="" />
                <div style="height: 20px"></div>
                <h3>Financial Analyst</h3>
                <div style="height: 20px"></div>
                <p>Analyze financial data and help guide investment decisions.</p>
            </div>
            <div class="componentContainer">
                <img style="border: 1px solid #f2f2f2" src="{{ asset('assets/img/pencil-icon.png') }}" alt="" />
                <div style="height: 20px"></div>
                <h3>Content Writer</h3>
                <div style="height: 20px"></div>
                <p>
                    Craft compelling content for our website and marketing materials.
                </p>
            </div>
            <div class="componentContainer">
                <img style="border: 1px solid #f2f2f2" src="{{ asset('assets/img/layout-grid-icon.png') }}"
                    alt="" />
                <div style="height: 20px"></div>
                <h3>Graphic Designer</h3>
                <div style="height: 20px"></div>
                <p>Design visually appealing graphics for digital and print media.</p>
            </div>
            <div class="componentContainer">
                <img style="border: 1px solid #f2f2f2" src="{{ asset('assets/img/settings-icon.png') }}" alt="" />
                <div style="height: 20px"></div>
                <h3>Data Scientist</h3>
                <div style="height: 20px"></div>
                <p>Work with big data to extract meaningful insights and trends</p>
            </div>
        </div>
    </div>
    <!-- Explore Your Career Path -->
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

    <!-- latest News -->
    <div class="UpcomingEventContainer">
        <div class="globalheadingAndSubHeading">
            <h2>Latest News</h2>
            <p class="text-center mt-3">
                Stay Updated with the Latest Happenings
            </p>
        </div>
        <div class="gap-40px"></div>
        <div class="left-right-padding grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-4">
            @for ($i = 0; $i < 6; $i++)
                <div class="max-w-sm bg-white">
                    <a href="#">
                        <img style="width:100%" class="rounded-t-lg" src="{{ asset('assets/img/img-02.png') }}"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <span class="!text-slate-500">19 Jan 2022</span>
                        <a href="#" class="mt-2">
                            <h2 class="cardTitle text-left mb-2 text-2xl tracking-tight text-gray-900 dark:text-white">
                                Alumni Launch New Scholarship Program
                            </h2>
                        </a>
                        <span class="mb-3 font-normal text-[1rem] text-gray-700 dark:text-gray-400">
                            Our alumni have established a new scholarship to support undergraduates pursuing degrees in
                            engineering.
                        </span>
                        <div class="techtags">

                            techtags
                        </div>
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
    <!-- latest News -->
    <div class="gap-80px"></div>

    <!-- Success Stories -->
    <div class="UpcomingEventContainer successStories">
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
        <div class="gap-40px"></div>
        <div class="gap-40px"></div>
    </div>
    <!-- Success Stories -->
    <div class="gap-80px"></div>

    <!-- Our Counsellors are the best in the business. -->
    <div class="UpcomingEventContainer">
        <div class="globalheadingAndSubHeading">
            <h2>Our Counsellors are the best in the business.</h2>
            <p class="text-center mt-3">
                Highly professional and capable of running your business across all digital channels.
            </p>
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
    <!-- Our Counsellors are the best in the business. -->
    <div class="gap-80px"></div>
@endsection
