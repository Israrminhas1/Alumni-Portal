<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #resumecv-layout {
            width: 100%;
            max-width: 210mm;
            padding: 0;
            box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
        }

        #resumecv-main {
            font-size: 14px;
            line-height: 24px;
            display: flex;
            flex-wrap: nowrap;
            padding: 20px;
            background-color: #ffff;
        }

        #rb-left-top {
            margin-bottom: 60px;
        }

        #rb-left {
            width: 28%;
            padding: 10px 5px;
            padding-left: 15px;
            padding-top: 20px;
        }

        #resumecv-content {
            width: 72%;
            background: #fff;
            padding-right: 10px;
            padding-left: 20px;
            padding-top: 20px;
        }

        #resumecv-content-top {
            color: #fff;
            background: #383838;
            padding: 15px;
            padding-bottom: 0px;
            margin-bottom: 50px
        }

        #resumecv-content-top hr {
            width: 200px;
            align-items: left;
            border: 1px solid #fff;
        }

        #resumecv-content-top .resumecv-block {
            position: relative;
            padding: 5px 10px;
            display: flex;
        }

        #resumecv-ava {
            width: 150px;
            border-radius: 50%;
        }

        #resumecv-content .resumecv-block {
            position: relative;
        }

        #rb-left .resumecv-box-content {
            padding-bottom: 0;
            margin: 0;
        }

        .skill {
            margin-top: 15px
        }

        #resumecv-content-top h1 {
            font-size: 32px;
            margin: 0;
            padding-top: 0px;
            line-height: normal;
            text-transform: capitalize;
            font-weight: 800;
        }

        #resumecv-content-top .resumecv-block {
            padding-left: 0px;
        }

        #resumecv-content-top .job_position {
            font-size: 22px;
            font-weight: 500;
        }

        .box-name p {
            overflow: hidden;
        }

        .box-name {
            overflow: hidden;
            background: #2f3a40;
        }

        #resumecv-content p {
            margin-bottom: 5px
        }

        #rb-left .h3 {
            font-size: 18px;
            font-weight: bold;
            margin-top: 0;
            text-transform: uppercase;
        }

        #resumecv-content .head {
            font-size: 18px;
            color: #2f3a40;
            padding-bottom: 5px;
            /* border-bottom: 2px solid #9B9C8F; */
            font-weight: bold;
            margin-top: 0;
            text-transform: uppercase;
        }

        #resumecv-content-main {
            padding-left: 10px;
        }

        #resumecv-content h3 {
            font-weight: bold;
            font-size: 14px;
            line-height: 30px;
            margin-bottom: 10px;
            color: #333;
        }

        #resumecv-content span {
            display: inline-block;
            padding-right: 15px;
            padding-left: 15px;
        }

        #rb-left .h3:first-child {
            margin-top: 0
        }

        .resumecv-box-content {
            margin-bottom: 25px;
            position: relative;
        }

        #resumecv-box-ava {
            text-align: center;
            padding: 2px;
            margin-bottom: 10px;
            auto;
        }

        #resumecv-box-ava img {
            padding: 0;
            border: 0;
            width: 150px;
            height: 150px;
        }

        .bar-exp span {
            display: block;
            height: 8px;
            background: #d9d9d9;
        }

        .bar-exp {
            background: #2f3a40;
            border: solid 2px white;
            margin-bottom: 12px;
        }

        .icoweb label {
            display: block;
            color: #627e88;
        }

        .icoweb span {
            display: block;
        }

        .box-contact {
            font-size: 13px;
            padding-top: 0px;
            margin-bottom: 50px;
        }

        .icoweb i.fa,
        .icoweb i.fab,
        .icoweb i.far {
            width: 20px;
            height: 20px;
            background-color: #ffff;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            display: inline-block;
            text-align: center;
            font-size: 13px;
            line-height: 20px;
            color: #2f3a40 !important;
            margin-right: 10px;
            margin-top: 3px;
            float: left
        }

        .head i {
            font-size: 25px;
            margin-right: 10px;
        }

        #resumecv-content span.exp-date {
            float: right;
        }

        .icon_fa {
            text-align: center;
        }

        .icon_fa i.fa {
            font-size: 20px;
            border: solid 1px #ffffff;
            border-radius: 50%;
            padding: 5px;
            width: 20px;
            color: white;
            background: #ffffff;
            margin-bottom: 5px;
        }

        p.head i.fa {
            float: left
        }

        .tag {
            background-color: #383838;
            margin-right: 2px;
            margin-bottom: 5px;
            padding-top: 0.2em;
            padding-right: 0.6em;
            padding-bottom: 0.3em;
            padding-left: 0.6em;
            font-size: 16px;
            font-weight: 700;
            color: rgb(255, 255, 255);
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            display: inline-block;
            border-top-left-radius: 0.25em;
            border-top-right-radius: 0.25em;
            border-bottom-right-radius: 0.25em;
            border-bottom-left-radius: 0.25em;
        }
    </style>
</head>

<body>
    <div id="resumecv-layout">
        <div id="resumecv-main">
            <div id="rb-left">
                <div id="rb-left-top">
                    <div class="resumecv-block">
                        <div> <img
                                id="resumecv-ava\" src="{{ auth()->user()->profile_photo ? asset('images/' . auth()->user()->profile_photo) : '##image_url##resumecv-avatar.jpg' }}">
                        </div>
                    </div>
                </div>
                <div id="resumecv-main-left">
                    <div class="block resumecv-block">
                        <p class="h3"><span class="box-title rb_data">Information</span></p>
                    </div>
                    <div class="box-contact">
                        <p class="icoweb"><i class="fa fa-calendar"></i><span>{{ auth()->user()->dob }}</span> </p>
                        <p class="icoweb"><i class="fa fa-user"></i><span>{{ auth()->user()->gender }}</span> </p>
                        <p class="icoweb\" ><i class="fa fa-phone"></i><span>{{ auth()->user()->phone }}</span></p>
                        <p class="icoweb\" ><i class="fa fa-envelope-square">
                            </i><span>{{ auth()->user()->email }}</span> </p>
                        <p class="icoweb"><i class="fa fa-map-marker"></i><span>{{ auth()->user()->address }}</span> </p>
                        <p class="icoweb"><i class="fa fa-info"></i><span>fb.com/me</span> </p>
                    </div>
                    <p class="h3"><span class="box-title rb_data">Skill</span></p>
                    <div>
                        <div class="resumecv-box-content">
                            @foreach ($skils as $skill)
                                <span class="tag">SEO</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div id="resumecv-content">
                <div id="resumecv-content-top">
                    <div class="resumecv-block">
                        <div>
                            <h1><span>{{ auth()->user()->name }}</span></h1>
                            <h1 class="job_position"><span>Job position</span></h1>
                            <hr align="left">
                            <p>{{ auth()->user()->bio }}</p>
                        </div>
                    </div>
                </div>
                <div id="resumecv-content-main">
                    <div class="resumecv-block">
                        <p class="head"> <i class="fa fa-graduation-cap\" aria-hidden="true"></i>
                            <span>Education</span>
                        </p>
                        <div>
                            <div class="resumecv-box-content">
                                <h3> <span>{{ auth()->user()->education->school }}</span> <span
                                        class="exp-date"><em>{{ auth()->user()->education->from_date }}</em> -
                                        <em>{{ auth()->user()->education->to_date }}</em></span> </h3>
                                <p class="h3"> <span>Major</span> </p>
                                <div class="exp-content">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy.Lorem Ipsum
                                    is simply dummy text of the printing and typesetting industry. </div>
                            </div>
                        </div>
                    </div>
                    <div class="resumecv-block">
                        <p class="head"> <i class="fa fa-briefcase\" aria-hidden="true"></i> <span>Expericence</span>
                        </p>
                        <div>
                            <div class="resumecv-box-content">
                                <h3> <span>Company's name</span> <span class="exp-date"><em>04/2022</em> -
                                        <em>Now</em></span> </h3>
                                <p class="h3"> <span>Position</span> </p>
                                <div class="exp-content">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy.Lorem Ipsum
                                    is simply dummy text of the printing and typesetting industry. </div>
                            </div>
                        </div>
                    </div>
                    <div class="resumecv-block">
                        <p class="head"> <i class="fa fa-user\" aria-hidden="true"></i> <span>Activities</span> </p>
                        <div>
                            <div class="resumecv-box-content">
                                <h3> <span>Organization's name</span> <span class="exp-date"><em>01/2019</em> -
                                        <em>03/2022</em></span> </h3>
                                <p class="h3"> <span>Position</span> </p>
                                <div class="exp-content">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy.Lorem Ipsum
                                    is simply dummy text of the printing and typesetting industry. </div>
                            </div>
                        </div>
                    </div>
                    <div class="resumecv-block">
                        <p class="head"> <i class="fa fa-trophy\" aria-hidden="true"></i> <span>AWARD</span> </p>
                        <div>
                            <div class="resumecv-box-content">
                                <h3> <span>Award's name</span> <span class="exp-date"><em>01/2019</em></span> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="resumecv-block">
                        <p class="head"> <i class="fa fa-caret-square-o-down\" aria-hidden="true"></i> <span>More
                                information</span> </p>
                        <div>
                            <div class="resumecv-box-content">
                                <div class="exp-content">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy.Lorem Ipsum
                                    is simply dummy text of the printing and typesetting industry. </div>
                            </div>
                        </div>
                    </div>
                    <div class="resumecv-block">
                        <p class="head"> <i class="fa fa-link\" aria-hidden="true"></i> <span>References</span> </p>
                        <div>
                            <div class="resumecv-box-content">
                                <div class="exp-content">Name, company, phone, email,... </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
