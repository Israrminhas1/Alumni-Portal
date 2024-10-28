@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <!-- Hero Section -->
    <div class="heroSectionContainer">
        <img src="{{ asset('assets/img/banner-img-06.png') }}" alt="" />
        <div class="heroSection px-8">
            <h1 class="text-white">Let’s Create</h1>
            <h1 class="text-white">Progress Together</h1>
            <div class="gap-40px"></div>
            <p class="subText">We’re here to help and answer any questions you may have..</p>
        </div>

    </div>
    <!-- Hero Section -->
    <div class="gap-80px"></div>

    <!-- Get In Touch -->
    <div class="globalheadingAndSubHeading">
        <h2>Get In Touch</h2>
        <p class="text-center mt-3 getInTouch">
            We' love to hear from you. Our friendly team is always here to chat.
        </p>

    </div>
    <div class="gap-80px"></div>

    <div class="left-right-padding grid grid-cols-1 md:grid-cols-2 gap-8 mt-4">
        <div class="formContainer">
            <form>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                            name</label>
                        <input type="text" id="first_name" class="" placeholder="John" required />
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                            name</label>
                        <input type="text" id="last_name" placeholder="Doe" required />
                    </div>
                </div>

                <div class="mb-6">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact
                        Number</label>
                    <input type="tel" id="phone" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
                        required />
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                        address</label>
                    <input type="email" id="email" placeholder="john.doe@company.com" required />
                </div>
                <div class="mb-6">
                    <label for="Message*" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        Subject*</label>
                    <div class="flex">
                        <button id="states-button" data-dropdown-toggle="dropdown-states"
                            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500   border border-gray-300 rounded-s-lg focus:ring-4 focus:outline-none focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                            type="button">
                            <svg aria-hidden="true" class="h-3 me-2" viewBox="0 0 15 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" width="14" height="12" rx="2" fill="white" />
                                <mask id="mask0_12694_49953" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                    width="15" height="12">
                                    <rect x="0.5" width="14" height="12" rx="2" fill="white" />
                                </mask>
                                <g mask="url(#mask0_12694_49953)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.5 0H0.5V0.8H14.5V0ZM14.5 1.6H0.5V2.4H14.5V1.6ZM0.5 3.2H14.5V4H0.5V3.2ZM14.5 4.8H0.5V5.6H14.5V4.8ZM0.5 6.4H14.5V7.2H0.5V6.4ZM14.5 8H0.5V8.8H14.5V8ZM0.5 9.6H14.5V10.4H0.5V9.6ZM14.5 11.2H0.5V12H14.5V11.2Z"
                                        fill="#D02F44" />
                                    <rect x="0.5" width="6" height="5.6" fill="#46467F" />
                                    <g filter="url(#filter0_d_12694_49953)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.83317 1.20005C1.83317 1.42096 1.68393 1.60005 1.49984 1.60005C1.31574 1.60005 1.1665 1.42096 1.1665 1.20005C1.1665 0.979135 1.31574 0.800049 1.49984 0.800049C1.68393 0.800049 1.83317 0.979135 1.83317 1.20005ZM3.1665 1.20005C3.1665 1.42096 3.01727 1.60005 2.83317 1.60005C2.64908 1.60005 2.49984 1.42096 2.49984 1.20005C2.49984 0.979135 2.64908 0.800049 2.83317 0.800049C3.01727 0.800049 3.1665 0.979135 3.1665 1.20005ZM4.1665 1.60005C4.3506 1.60005 4.49984 1.42096 4.49984 1.20005C4.49984 0.979135 4.3506 0.800049 4.1665 0.800049C3.98241 0.800049 3.83317 0.979135 3.83317 1.20005C3.83317 1.42096 3.98241 1.60005 4.1665 1.60005ZM5.83317 1.20005C5.83317 1.42096 5.68393 1.60005 5.49984 1.60005C5.31574 1.60005 5.1665 1.42096 5.1665 1.20005C5.1665 0.979135 5.31574 0.800049 5.49984 0.800049C5.68393 0.800049 5.83317 0.979135 5.83317 1.20005ZM2.1665 2.40005C2.3506 2.40005 2.49984 2.22096 2.49984 2.00005C2.49984 1.77913 2.3506 1.60005 2.1665 1.60005C1.98241 1.60005 1.83317 1.77913 1.83317 2.00005C1.83317 2.22096 1.98241 2.40005 2.1665 2.40005ZM3.83317 2.00005C3.83317 2.22096 3.68393 2.40005 3.49984 2.40005C3.31574 2.40005 3.1665 2.22096 3.1665 2.00005C3.1665 1.77913 3.31574 1.60005 3.49984 1.60005C3.68393 1.60005 3.83317 1.77913 3.83317 2.00005ZM4.83317 2.40005C5.01726 2.40005 5.1665 2.22096 5.1665 2.00005C5.1665 1.77913 5.01726 1.60005 4.83317 1.60005C4.64908 1.60005 4.49984 1.77913 4.49984 2.00005C4.49984 2.22096 4.64908 2.40005 4.83317 2.40005ZM5.83317 2.80005C5.83317 3.02096 5.68393 3.20005 5.49984 3.20005C5.31574 3.20005 5.1665 3.02096 5.1665 2.80005C5.1665 2.57914 5.31574 2.40005 5.49984 2.40005C5.68393 2.40005 5.83317 2.57914 5.83317 2.80005ZM4.1665 3.20005C4.3506 3.20005 4.49984 3.02096 4.49984 2.80005C4.49984 2.57914 4.3506 2.40005 4.1665 2.40005C3.98241 2.40005 3.83317 2.57914 3.83317 2.80005C3.83317 3.02096 3.98241 3.20005 4.1665 3.20005ZM3.1665 2.80005C3.1665 3.02096 3.01727 3.20005 2.83317 3.20005C2.64908 3.20005 2.49984 3.02096 2.49984 2.80005C2.49984 2.57914 2.64908 2.40005 2.83317 2.40005C3.01727 2.40005 3.1665 2.57914 3.1665 2.80005ZM1.49984 3.20005C1.68393 3.20005 1.83317 3.02096 1.83317 2.80005C1.83317 2.57914 1.68393 2.40005 1.49984 2.40005C1.31574 2.40005 1.1665 2.57914 1.1665 2.80005C1.1665 3.02096 1.31574 3.20005 1.49984 3.20005ZM2.49984 3.60005C2.49984 3.82096 2.3506 4.00005 2.1665 4.00005C1.98241 4.00005 1.83317 3.82096 1.83317 3.60005C1.83317 3.37913 1.98241 3.20005 2.1665 3.20005C2.3506 3.20005 2.49984 3.37913 2.49984 3.60005ZM3.49984 4.00005C3.68393 4.00005 3.83317 3.82096 3.83317 3.60005C3.83317 3.37913 3.68393 3.20005 3.49984 3.20005C3.31574 3.20005 3.1665 3.37913 3.1665 3.60005C3.1665 3.82096 3.31574 4.00005 3.49984 4.00005ZM5.1665 3.60005C5.1665 3.82096 5.01726 4.00005 4.83317 4.00005C4.64908 4.00005 4.49984 3.82096 4.49984 3.60005C4.49984 3.37913 4.64908 3.20005 4.83317 3.20005C5.01726 3.20005 5.1665 3.37913 5.1665 3.60005ZM5.49984 4.80005C5.68393 4.80005 5.83317 4.62096 5.83317 4.40005C5.83317 4.17913 5.68393 4.00005 5.49984 4.00005C5.31574 4.00005 5.1665 4.17913 5.1665 4.40005C5.1665 4.62096 5.31574 4.80005 5.49984 4.80005ZM4.49984 4.40005C4.49984 4.62096 4.3506 4.80005 4.1665 4.80005C3.98241 4.80005 3.83317 4.62096 3.83317 4.40005C3.83317 4.17913 3.98241 4.00005 4.1665 4.00005C4.3506 4.00005 4.49984 4.17913 4.49984 4.40005ZM2.83317 4.80005C3.01727 4.80005 3.1665 4.62096 3.1665 4.40005C3.1665 4.17913 3.01727 4.00005 2.83317 4.00005C2.64908 4.00005 2.49984 4.17913 2.49984 4.40005C2.49984 4.62096 2.64908 4.80005 2.83317 4.80005ZM1.83317 4.40005C1.83317 4.62096 1.68393 4.80005 1.49984 4.80005C1.31574 4.80005 1.1665 4.62096 1.1665 4.40005C1.1665 4.17913 1.31574 4.00005 1.49984 4.00005C1.68393 4.00005 1.83317 4.17913 1.83317 4.40005Z"
                                            fill="url(#paint0_linear_12694_49953)" />
                                    </g>
                                </g>
                                <defs>
                                    <filter id="filter0_d_12694_49953" x="1.1665" y="0.800049" width="4.6665" height="5"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="1" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_12694_49953" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_12694_49953"
                                            result="shape" />
                                    </filter>
                                    <linearGradient id="paint0_linear_12694_49953" x1="1.1665" y1="0.800049"
                                        x2="1.1665" y2="4.80005" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" />
                                        <stop offset="1" stop-color="#F0F0F0" />
                                    </linearGradient>
                                </defs>
                            </svg>
                            USA <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="dropdown-states"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="states-button">
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:  dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <div class="inline-flex items-center">
                                            <svg aria-hidden="true" class="h-3.5 w-3.5 rounded-full me-2"
                                                xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-us"
                                                viewBox="0 0 512 512">
                                                <g fill-rule="evenodd">
                                                    <g stroke-width="1pt">
                                                        <path fill="#bd3d44"
                                                            d="M0 0h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                            transform="scale(3.9385)" />
                                                        <path fill="#fff"
                                                            d="M0 10h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                            transform="scale(3.9385)" />
                                                    </g>
                                                    <path fill="#192f5d" d="M0 0h98.8v70H0z" transform="scale(3.9385)" />
                                                    <path fill="#fff"
                                                        d="M8.2 3l1 2.8H12L9.7 7.5l.9 2.7-2.4-1.7L6 10.2l.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7L74 8.5l-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 7.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 24.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 21.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 38.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 35.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 52.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 49.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 66.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 63.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9z"
                                                        transform="scale(3.9385)" />
                                                </g>
                                            </svg>
                                            United States
                                        </div>
                                    </button>
                                </li>
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:  dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <div class="inline-flex items-center">
                                            <svg aria-hidden="true" class="h-3.5 w-3.5 rounded-full me-2"
                                                xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-de"
                                                viewBox="0 0 512 512">
                                                <path fill="#ffce00" d="M0 341.3h512V512H0z" />
                                                <path d="M0 0h512v170.7H0z" />
                                                <path fill="#d00" d="M0 170.7h512v170.6H0z" />
                                            </svg>
                                            Germany
                                        </div>
                                    </button>
                                </li>
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:  dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <div class="inline-flex items-center">
                                            <svg aria-hidden="true" class="h-3.5 w-3.5 rounded-full me-2"
                                                xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-it"
                                                viewBox="0 0 512 512">
                                                <g fill-rule="evenodd" stroke-width="1pt">
                                                    <path fill="#fff" d="M0 0h512v512H0z" />
                                                    <path fill="#009246" d="M0 0h170.7v512H0z" />
                                                    <path fill="#ce2b37" d="M341.3 0H512v512H341.3z" />
                                                </g>
                                            </svg>
                                            Italy
                                        </div>
                                    </button>
                                </li>
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:  dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <div class="inline-flex items-center">
                                            <svg aria-hidden="true" class="h-3.5 w-3.5 rounded-full me-2"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" id="flag-icon-css-cn"
                                                viewBox="0 0 512 512">
                                                <defs>
                                                    <path id="a" fill="#ffde00" d="M1-.3L-.7.8 0-1 .6.8-1-.3z" />
                                                </defs>
                                                <path fill="#de2910" d="M0 0h512v512H0z" />
                                                <use width="30" height="20"
                                                    transform="matrix(76.8 0 0 76.8 128 128)" xlink:href="#a" />
                                                <use width="30" height="20"
                                                    transform="rotate(-121 142.6 -47) scale(25.5827)" xlink:href="#a" />
                                                <use width="30" height="20"
                                                    transform="rotate(-98.1 198 -82) scale(25.6)" xlink:href="#a" />
                                                <use width="30" height="20"
                                                    transform="rotate(-74 272.4 -114) scale(25.6137)" xlink:href="#a" />
                                                <use width="30" height="20"
                                                    transform="matrix(16 -19.968 19.968 16 256 230.4)" xlink:href="#a" />
                                            </svg>
                                            China
                                        </div>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <label for="states" class="sr-only">Choose a state</label>
                        <select id="states">
                            <option selected>Choose a state</option>
                            <option value="CA">California</option>
                            <option value="TX">Texas</option>
                            <option value="WH">Washinghton</option>
                            <option value="FL">Florida</option>
                            <option value="VG">Virginia</option>
                            <option value="GE">Georgia</option>
                            <option value="MI">Michigan</option>
                        </select>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="Message*" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        Message*</label>
                    <textarea id="message" rows="4"></textarea>
                </div>


                <button type="submit"
                    class="text-white w-100  flex items-center justify-center !w-100 base-bg font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <g clip-path="url(#clip0_268_30900)">
                            <path
                                d="M6.455 19L2 22.5V4C2 3.73478 2.10536 3.48043 2.29289 3.29289C2.48043 3.10536 2.73478 3 3 3H21C21.2652 3 21.5196 3.10536 21.7071 3.29289C21.8946 3.48043 22 3.73478 22 4V18C22 18.2652 21.8946 18.5196 21.7071 18.7071C21.5196 18.8946 21.2652 19 21 19H6.455ZM7 10V12H9V10H7ZM11 10V12H13V10H11ZM15 10V12H17V10H15Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_268_30900">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span class="ml-2">
                        Send
                        Message
                    </span>
                </button>
            </form>
        </div>
        <div class="contactContainer">
            <div>
                <div class="nameAndSvg flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"
                        fill="none">
                        <path
                            d="M6.35 5H30.65C31.008 5 31.3514 5.15804 31.6046 5.43934C31.8578 5.72064 32 6.10218 32 6.5V30.5C32 30.8978 31.8578 31.2794 31.6046 31.5607C31.3514 31.842 31.008 32 30.65 32H6.35C5.99196 32 5.64858 31.842 5.39541 31.5607C5.14223 31.2794 5 30.8978 5 30.5V6.5C5 6.10218 5.14223 5.72064 5.39541 5.43934C5.64858 5.15804 5.99196 5 6.35 5ZM18.581 18.0245L9.9248 9.857L8.17655 12.143L18.5985 21.9755L28.8329 12.1355L27.0671 9.866L18.581 18.0245Z"
                            fill="#03111E" />
                    </svg>
                    <div class="ml-3">
                        <h3 class="text-left">Chat with us</h3>
                        <div style="height:10px"></div>
                        <p class="friendMessage">Our friendly team is here to help.</p>
                        <div style="height:10px"></div>
                        <span class="contactInfo">Support@digidiv.pk</span>
                    </div>
                </div>
                <div style="height:20px"></div>

                <div class="nameAndSvg flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"
                        fill="none">
                        <path
                            d="M30.9986 24.8756V30.376C30.9987 30.7698 30.8602 31.1491 30.6109 31.4372C30.3616 31.7253 30.0201 31.9009 29.6553 31.9284C29.0241 31.9751 28.5085 32 28.1098 32C15.346 32 5 20.8576 5 7.11111C5 6.68178 5.02167 6.12645 5.06644 5.44667C5.09204 5.0538 5.25505 4.68602 5.52258 4.41752C5.7901 4.14903 6.14224 3.99982 6.50792 4H11.6152C11.7943 3.99981 11.9672 4.07134 12.1001 4.2007C12.233 4.33006 12.3166 4.50802 12.3345 4.7C12.3677 5.05778 12.398 5.34244 12.4269 5.55867C12.714 7.7161 13.3022 9.81441 14.1717 11.7824C14.3089 12.0936 14.2194 12.4653 13.9594 12.6644L10.8425 15.0631C12.7482 19.8456 16.2871 23.6568 20.7277 25.7093L22.952 22.3587C23.0429 22.2218 23.1756 22.1236 23.3268 22.0812C23.4781 22.0389 23.6383 22.055 23.7796 22.1269C25.6068 23.0616 27.5546 23.6935 29.5571 24.0013C29.7578 24.0324 30.0222 24.0667 30.3515 24.1009C30.5295 24.1205 30.6944 24.2107 30.8142 24.3538C30.934 24.4969 30.9988 24.6828 30.9986 24.8756Z"
                            fill="#03111E" />
                    </svg>
                    <div class="ml-3">
                        <h3 class="text-left">Call us</h3>
                        <div style="height:10px"></div>
                        <p class="friendMessage">Mon-Fri From 10am to 7pm</p>
                        <div style="height:10px"></div>
                        <span class="contactInfo">+923244434447</span>
                    </div>
                </div>
                <div style="height:20px"></div>

                <div class="nameAndSvg flex items-start">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18 3C9.735 3 3 9.735 3 18C3 26.265 9.735 33 18 33C26.265 33 33 26.265 33 18C33 9.735 26.265 3 18 3ZM24.525 23.355C24.315 23.715 23.94 23.91 23.55 23.91C23.355 23.91 23.16 23.865 22.98 23.745L18.33 20.97C17.175 20.28 16.32 18.765 16.32 17.43V11.28C16.32 10.665 16.83 10.155 17.445 10.155C18.06 10.155 18.57 10.665 18.57 11.28V17.43C18.57 17.97 19.02 18.765 19.485 19.035L24.135 21.81C24.675 22.125 24.855 22.815 24.525 23.355Z"
                            fill="black" />
                    </svg>

                    <div class="ml-3">
                        <h3 class="text-left">Office Hours</h3>
                        <div style="height:10px"></div>
                        <p class="friendMessage">Chat to us in person at ourPakistan HQ.</p>
                        <div style="height:10px"></div>
                        <span class="contactInfo">Monday - Friday: 9:00 AM - 5:00 PM</span>
                    </div>
                </div>
                <div style="height:20px"></div>

                <div class="nameAndSvg flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"
                        fill="none">
                        <path
                            d="M27.1924 24.2131L18 33L8.80756 24.2131C6.98949 22.4753 5.75138 20.2611 5.24979 17.8506C4.74819 15.4401 5.00564 12.9416 5.98959 10.671C6.97353 8.40037 8.63977 6.45964 10.7776 5.09422C12.9154 3.72879 15.4289 3 18 3C20.5711 3 23.0846 3.72879 25.2224 5.09422C27.3602 6.45964 29.0265 8.40037 30.0104 10.671C30.9944 12.9416 31.2518 15.4401 30.7502 17.8506C30.2486 20.2611 29.0105 22.4753 27.1924 24.2131ZM18 20.9491C19.5324 20.9491 21.002 20.3673 22.0855 19.3315C23.169 18.2958 23.7778 16.891 23.7778 15.4263C23.7778 13.9615 23.169 12.5568 22.0855 11.5211C21.002 10.4853 19.5324 9.90345 18 9.90345C16.4676 9.90345 14.998 10.4853 13.9145 11.5211C12.831 12.5568 12.2222 13.9615 12.2222 15.4263C12.2222 16.891 12.831 18.2958 13.9145 19.3315C14.998 20.3673 16.4676 20.9491 18 20.9491ZM18 18.1877C17.2338 18.1877 16.499 17.8968 15.9572 17.3789C15.4155 16.8611 15.1111 16.1587 15.1111 15.4263C15.1111 14.6939 15.4155 13.9915 15.9572 13.4737C16.499 12.9558 17.2338 12.6649 18 12.6649C18.7662 12.6649 19.501 12.9558 20.0428 13.4737C20.5845 13.9915 20.8889 14.6939 20.8889 15.4263C20.8889 16.1587 20.5845 16.8611 20.0428 17.3789C19.501 17.8968 18.7662 18.1877 18 18.1877Z"
                            fill="#03111E" />
                    </svg>

                    <div class="ml-3">
                        <h3 class="text-left">Visit us</h3>
                        <div style="height:10px"></div>
                        <p class="friendMessage">Chat to us in person at ourPakistan HQ.</p>
                        <div style="height:10px"></div>
                        <span class="contactInfo">432, Block B2 Block B 2 Phase 1 Johar Town, Islamabad, Punjab 54000,
                            Pakistan</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Get In Touch -->
    <div class="gap-80px"></div>

    <!-- OUR PRESENCE -->
    <div class="PresenceContainer ">
        <h2 class="text-left left-right-padding">OUR PRESENCE</h2>
        <div style="height:20px"></div>
        <img src="{{ asset('assets/img/map.png') }}" alt="" />
    </div>
    <!-- OUR PRESENCE -->
    <div class="gap-80px"></div>

    <!-- Frequently 4sked Questions -->
    <div class="askedQuetionContainer left-right-padding">
        <div class="globalheadingAndSubHeading">
            <h2>Frequently Asked Questions</h2>
            <p class="text-center mt-3 getInTouch">
                Flex is the only saas business platform that lets you run your business on one platform, seamlessly
                across all digital channels.
            </p>
            <div class="gap-40px"></div>
            <div class="left-right-padding grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-4">
                @for ($i = 0; $i < 6; $i++)
                    <div class="askedQuetionComponent">

                        <img src="{{ asset('assets/img/shield-question-icon.png') }}" alt="" />
                        <div class="gap-40px"></div>

                        <h4>What shipping options do you have?</h4>
                        <div style="height:20px"></div>

                        <span class="ansvalue">For USA domestic orders we offer FedEx and USPS shipping. Contact us via
                            email to learn
                            more.</span>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <!-- Frequently Asked Questions -->
    <div class="gap-80px"></div>
@endsection
