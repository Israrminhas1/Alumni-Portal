@extends('layouts.app')

@section('title', 'Jobs Listing')

@section('content')
    <div class="gap-40px"></div>
    <div class="searchContainer">
        <form class="flex items-center inputContainer max-w-xl mx-auto">
            <label for="simple-search" class="sr-only">Search</label>
            <input type="text" id="simple-search" style="border:none !important;" placeholder="Search branch name..."
                required />
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path
                            d="M12 2.25C7.175 2.25 3.25 6.175 3.25 11C3.25 16.118 7.94699 19.2199 11.055 21.2729L11.584 21.624C11.71 21.708 11.855 21.75 12 21.75C12.145 21.75 12.29 21.708 12.416 21.624L12.945 21.2729C16.053 19.2199 20.75 16.118 20.75 11C20.75 6.175 16.825 2.25 12 2.25ZM12.119 20.021L12 20.1001L11.881 20.021C8.871 18.033 4.75 15.311 4.75 11C4.75 7.002 8.002 3.75 12 3.75C15.998 3.75 19.25 7.002 19.25 11C19.25 15.311 15.128 18.034 12.119 20.021ZM12 7.75C10.208 7.75 8.75 9.208 8.75 11C8.75 12.792 10.208 14.25 12 14.25C13.792 14.25 15.25 12.792 15.25 11C15.25 9.208 13.792 7.75 12 7.75ZM12 12.75C11.035 12.75 10.25 11.965 10.25 11C10.25 10.035 11.035 9.25 12 9.25C12.965 9.25 13.75 10.035 13.75 11C13.75 11.965 12.965 12.75 12 12.75Z"
                            fill="#333434" />
                    </svg>
                </div>
                <input type="text" id="simple-search" style="border:none !important;"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search branch name..." required />
            </div>
            <button type="submit" style="background-color: #F0F4FF;padding:1rem" class="bg-[#F0F4FF]">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>

        <!-- filter -->
        <div class="gap-40px"></div>
        <form class="left-right-padding jobList flex flex-wrap items-center justify-between  gap-2 mt-4">
            <select id="countries"
                class="base-bg text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>job type</option>
                <option value="US">remote</option>
                <option value="CA">onsite</option>
            </select>
            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>easy apply</option>
                <option value="US">remote</option>
                <option value="CA">onsite</option>
            </select>
            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Full Time</option>
                <option value="US">remote</option>
                <option value="CA">onsite</option>
            </select>
            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>remote</option>
                <option value="US">remote</option>
                <option value="CA">onsite</option>
            </select>
            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Date Posted</option>
                <option value="US">remote</option>
                <option value="CA">onsite</option>
            </select>
            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Not Applied</option>
                <option value="US">remote</option>
                <option value="CA">onsite</option>
            </select>
            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Exclusive Offers</option>
                <option value="US">remote</option>
                <option value="CA">onsite</option>
            </select>
        </form>
        <!-- filter -->
        <div class="gap-40px"></div>

        <div class="responsive-grid left-right-padding">
            <div class="item">
                @for ($i = 0; $i < 4; $i++)
                    <div class="jobCard {{ $i == 0 ? 'activejob' : 'job' }}">
                        <div class="companyTitleandImg flex items-center ">
                            <div><img src="{{ asset('assets/img/company-logo.png') }}" alt="" /></div>
                            <span class="text-white ml-2">META Company</span>
                        </div>
                        <h4 class="text-white">Product Designer</h4>
                        <span class="location text-white">Porto, Portugal (on Site)</span>

                        <div class="easyApply">
                            <div class="btn-container justify-between flex gap-3">
                                <button class="darkborderwalabtn text-white">Easy Apply</button>
                                <button class="darkbackgroundwalabtn">Multiple Candidate</button>
                            </div>
                            <span class="text-white">1d</span>
                        </div>

                    </div>
                    <div style="height:20px"></div>
                @endfor
            </div>
            <div class="eightbg item jobShow">
                <div class="companyTitleandImg flex items-center">
                    <div><img class="w-[32px] h-[32px]" src="{{ asset('assets/img/company-logo.png') }}" alt="" /></div>
                    <span class=" ml-2">META Company</span>
                    <div style="height:20px"></div>
                </div>
                <div style="height:30px"></div>
                <h4 class="">Product Designer</h4>
                <span class="location ">Porto, Portugal (on Site)</span>
                <div style="height:30px"></div>
                <div class="jonbInfoContainer">
                    <div class="jobdata">
                        <div class="jobInfo flex sm:flex-wrap items-baseline gap-2">
                            <p>
                                Where you'll do it:
                            </p>
                            <span>Maya</span>
                        </div>
                        <div class="flex flex-wrap jobInfo items-baseline gap-2">
                            <p class="">
                                The Interview Process:
                            </p>
                            <span class="">It will have 2 stages that include a 45 min HR chat ➡️ 1h
                                Cultural/Technical
                                chat</span>
                        </div>
                        <div class="flex sm:flex-wrap jobInfo items-baseline gap-2">

                            <p>
                                Tools:  </p>
                            <span>Figma </span>
                        </div>
                        <div class="flex sm:flex-wrap jobInfo items-baseline gap-2">

                            <p>
                                Reporting to:  </p>
                            <span>Design Manager, Bruno Mota</span>
                        </div>
                        <div class="flex flex-wrap jobInfo items-baseline gap-2">

                            <p>
                                Your team: </p>
                            <span> You will mainly be part of a UX Designer’s team, working with cross-functional teams
                                and
                                a wider group of UX department</span>
                        </div>
                    </div>
                </div>
                <div style="height:30px"></div>

                <!-- Job Info -->
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                        data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                                data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Job Description</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                aria-controls="dashboard" aria-selected="false">Requirement</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                                aria-controls="settings" aria-selected="false">Benefit</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                                aria-controls="contacts" aria-selected="false">Overview</button>
                        </li>
                    </ul>
                </div>
                <div id="default-tab-content">
                    <div class="hidden p-4 rounded-lg" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h2 class="tabTitle text-left">Job Description</h2>
                        <div style="height:40px"></div>

                        <p class="contactInfo">What will make your journey with us unique?</p>
                        <div style="height:20px"></div>

                        <ul>
                            <li>
                                A supportive manager who cares about your well-being and is invested in your
                                professional growth.
                            </li>
                            <li>
                                A culture of continuous learning with clear targets and feedback.
                            </li>
                            <li>
                                A global company with over 2600 employees located in more than 26 countries, including
                                offices in 3 countries..
                            </li>
                        </ul>
                    </div>
                    <div class="hidden p-4 rounded-lg " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <h2 class="tabTitle text-left">Requirement</h2>
                        <div style="height:40px"></div>

                        <p class="contactInfo">What will make your journey with us unique?</p>
                        <div style="height:20px"></div>
                        <p class="jobinfosubtext">As a UX Designer on our team, you will shape user experiences by
                            leading the design of key
                            features and projects. Your responsibilities include defining user experience flows,
                            developing new product concepts, and crafting user stories. You will design detailed UI
                            layouts, create benchmarks, and develop high-fidelity prototypes while documenting UX and UI
                            strategies. Collaborating with technical teams, you will transform designs into impactful,
                            industry-leading products. This role combines creativity and problem-solving to create
                            meaningful user experiences. Your journey with us is an opportunity to drive innovation and
                            make a significant impact.</p>
                        <div style="height:30px"></div>

                        <p class="contactInfo">What You’ll Bring</p>
                        <div style="height:20px"></div>
                        <ul>
                            <li>Showcase proficiency in collaborative design environments.</li>
                            <li>Demonstrated ability to work independently, think critically, and maintain meticulous
                                attention to detail.</li>
                            <li>Solid grasp of interactive elements, micro-interactions, and animations, contributing to
                                a seamless user experience.</li>
                        </ul>


                    </div>
                    <div class="hidden p-4 rounded-lg" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <h2 class="tabTitle text-left">Benefit</h2>
                        <div style="height:40px"></div>

                        <p class="contactInfo">Base Pay Range</p>
                        <p class="salartRange">$50.00- $60.00 per/h</p>
                        <div style="height:20px"></div>
                        <p class="contactInfo">What’s in it for you?</p>
                        <ul>
                            <li>Embrace work-life balance with hybrid/remote roles and flexible hours.</li>
                            <li>Enjoy 22 days + Birthday + Carnival Tuesday.</li>
                            <li>Participate in team-building activities and events.</li>
                        </ul>




                    </div>
                    <div class="hidden p-4 rounded-lg " id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                        <h2 class="tabTitle text-left">Overview</h2>
                        <div style="height:40px"></div>

                        <div class=" grid grid-cols-1 md:grid-cols-2 gap-8 mt-4">
                            <div class="flex items-center gap-2">
                                <p class="contactInfo">Size:</p>
                                <span>510 to 1000 Employees</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <p class="contactInfo">Founded</p>
                                <span>1959</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <p class="contactInfo">Industry:</p>
                                <span>510 to 1000 Employees</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <p class="contactInfo">Founded</p>
                                <span>1959</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <p class="contactInfo">Sector:</p>
                                <span>510 to 1000 Employees</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <p class="contactInfo">Revenue</p>
                                <span>1959</span>
                            </div>


                        </div>
                        <div style="height:40px"></div>

                        <div class="grid grid-cols-4 gap-4 " style="grid-template-columns: repeat(12, 1fr);">
                            <div class="overviewImg" style=" grid-column: span 6;">
                                <img src="{{ asset('assets/img/img-01.png') }}" alt="" />
                            </div>
                            <div style="grid-column: span 6;">
                                <div class="grid grid-cols-4 gap-4" style="grid-template-columns: repeat(12, 1fr);">
                                    <div class=" overviewImg1" style="grid-column: span 6;">

                                        <img src="{{ asset('assets/img/img-01.png') }}" alt="" />
                                    </div>
                                    <div class=" overviewImg1" style="grid-column: span 6;">

                                        <img src="{{ asset('assets/img/img-01.png') }}" alt="" />
                                    </div>
                                    <div class="overviewImg1" style="grid-column: span 6;">

                                        <img src="{{ asset('assets/img/img-01.png') }}" alt="" />
                                    </div>
                                    <div class="overviewImg1" style="grid-column: span 6;">

                                        <img src="{{ asset('assets/img/img-01.png') }}" alt="" />
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <!-- Job Info -->
            </div>
        </div>
    </div>
@endsection
