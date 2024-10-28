@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <!-- Hero section -->
    <div class="heroSectionContainer">
        <img src="{{ asset('assets/img/banner-img-05.png') }}" alt="" />
        <div class="heroSection px-8">
            <h1 class="text-white">About Us</h1>
            <p class="subText">Committed to Lifelong Learning</p>
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

    <!--Our Core Values -->
    <div class="UpcomingEventContainer">
        <div class="globalheadingAndSubHeading left-right-padding  text-center">
            <h2>Our Core Values</h2>
            <div style="height:20px"></div>
            <span class="text-center">Our vision is to be a leading institution of higher learning, recognized for our
                commitment to
                excellence, innovation, and social responsibility, preparing future leaders for a rapidly changing
                world.</span>

        </div>
        <div class="gap-40px"></div>
        <div class="left-right-padding grid grid-cols-1 md:grid-cols-2  gap-8 mt-4">
            <div class="corValuesContainer">
                <img src="{{ asset('assets/img/collaborate.png') }}" alt="" />
                <div style="height:10px"></div>
                <h2 class="text-left">Integrity</h2>
                <div style="height:10px"></div>
                <span class="corevalueSpan">We uphold the highest standards of integrity in all our actions.</span>
            </div>
            <div class="corValuesContainer base-bg">
                <img src="{{ asset('assets/img/innovation.png') }}" alt="" />
                <div style="height:10px"></div>
                <h2 class="text-left text-white">Innovation</h2>
                <div style="height:10px"></div>
                <span class="corevalueSpan text-white" style="color:white">We foster a culture of creativity and
                    innovation in teaching and
                    learning.</span>
            </div>

        </div>
        <div class="gap-40px"></div>


        <div class="left-right-padding grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-4">
            <div class="corValuesContainer">
                <img src="{{ asset('assets/img/excellence.png') }}" alt="" />
                <div style="height:10px"></div>
                <h2 class="text-left">Excellence</h2>
                <div style="height:10px"></div>
                <span class="corevalueSpan">Processes serve people,
                    not the other way around.</span>
            </div>
            <div class="corValuesContainer">
                <img src="{{ asset('assets/img/together.png') }}" alt="" />
                <div style="height:10px"></div>
                <h2 class="text-left">Diversity</h2>
                <div style="height:10px"></div>
                <span class="corevalueSpan text-white">We choose action over passiveness</span>
            </div>
            <div class="corValuesContainer">
                <img src="{{ asset('assets/img/meeting.png') }}" alt="" />
                <div style="height:10px"></div>
                <h2 class="text-left">Community</h2>
                <div style="height:10px"></div>
                <span class="corevalueSpan text-white">We approach everyone with respect and do not get fooled by
                    appearances</span>
            </div>
        </div>
        <div class="gap-40px"></div>

    </div>
    <!-- Our Core Values-->
    <div class="gap-80px"></div>

    <!-- Our Journey -->
    <div class="UpcomingEventContainer">
        <div class="globalheadingAndSubHeading left-right-padding  text-center">
            <h2>Our Journey</h2>
            <div style="height:20px"></div>
            <span class="text-center">Our vision is to be a leading institution of higher learning, recognized for our
                commitment to
                excellence, innovation, and social responsibility, preparing future leaders for a rapidly changing
                world.</span>

        </div>
        <div class="gap-40px"></div>
        <div class="left-right-padding grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4  gap-8 mt-4">
            <div class="corValuesContainer">
                <div style="height:20px"></div>
                <h2>1990</h2>
                <div style="height:20px"></div>
                <p class="corevalueSpan">Founded with a vision to provide world-class education in Pakistan.</p>
                <div style="height:20px"></div>
            </div>
            <div class="corValuesContainer">
                <div style="height:20px"></div>
                <h2>2000</h2>
                <div style="height:20px"></div>
                <p class="corevalueSpan">Expanded our academic programs to include technology and business disciplines.
                </p>
                <div style="height:20px"></div>
            </div>
            <div class="corValuesContainer">
                <div style="height:20px"></div>
                <h2>2010</h2>
                <div style="height:20px"></div>
                <p class="corevalueSpan">Achieved accreditation and recognition for excellence in education.</p>
                <div style="height:20px"></div>
            </div>
            <div class="corValuesContainer">
                <div style="height:20px"></div>
                <h2>2020</h2>
                <div style="height:20px"></div>
                <p class="corevalueSpan">Launched innovative online learning platforms to adapt to modern educational
                    needs.</p>
                <div style="height:20px"></div>
            </div>
        </div>

    </div>
    <!-- Our Journey -->
    <div class="gap-80px"></div>

    <!-- Why Choose Alumni Network -->
    <div class="UpcomingEventContainer">
        <div class="globalheadingAndSubHeading left-right-padding  text-center">
            <h2>Why Choose Alumni Network</h2>
            <div style="height:20px"></div>
            <span class="text-center">Our vision is to be a leading institution of higher learning, recognized for our
                commitment to excellence, innovation, and social responsibility, preparing future leaders for a rapidly
                changing world.</span>

        </div>
        <div class="gap-40px"></div>
        <div class="left-right-padding grid grid-cols-1 md:grid-cols-2  gap-8 mt-4">
            <div class="corValuesContainer">
                <img src="{{ asset('assets/img/personal-trainer.png') }}" alt="" />
                <div style="height:10px"></div>
                <h2 class="text-left">Expert Faculty</h2>
                <div style="height:10px"></div>
                <span class="corevalueSpan">Learn from industry leaders and accomplished academics.</span>
            </div>
            <div class="corValuesContainer base-bg">
                <img src="{{ asset('assets/img/flask.png') }}" alt="" />
                <div style="height:10px"></div>
                <h2 class="text-left text-white">State-of-the-Art</h2>
                <div style="height:10px"></div>
                <span class="corevalueSpan text-white" style="color:white">Access to modern classrooms, labs, and
                    libraries.</span>
            </div>

        </div>
        <div class="gap-40px"></div>


        <div class="left-right-padding grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-4">
            <div class="corValuesContainer">
                <img src="{{ asset('assets/img/team.png') }}" alt="" />
                <div style="height:10px"></div>
                <h2 class="text-left">Global Network</h2>
                <div style="height:10px"></div>
                <span class="corevalueSpan">Join a diverse community with connections across the world.</span>
            </div>
            <div class="corValuesContainer">
                <img src="{{ asset('assets/img/career-development.png') }}" alt="" />
                <div style="height:10px"></div>
                <h2 class="text-left">Career Support</h2>
                <div style="height:10px"></div>
                <span class="corevalueSpan text-white">Benefit from our strong industry ties and career
                    services.</span>
            </div>
            <div class="corValuesContainer">
                <img src="{{ asset('assets/img/learning-journey.png') }}" alt="" />
                <div style="height:10px"></div>
                <h2 class="text-left">Innovative Programs</h2>
                <div style="height:10px"></div>
                <span class="corevalueSpan text-white">Engage in cutting-edge programs designed for future
                    success.</span>
            </div>
        </div>
        <div class="gap-40px"></div>
    </div>
    <!-- Why Choose Alumni Network -->
@endsection
