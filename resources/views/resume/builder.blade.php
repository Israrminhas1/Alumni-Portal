<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="{{ app()->getLocale() }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{ asset(config('app.logo_favicon')) }}" type="image/png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset(config('app.logo_favicon')) }}" />
    <meta name="description" content="{{ config('app.SITE_DESCRIPTION') }}">
    <meta name="keywords" content="{{ config('app.SITE_KEYWORDS') }}">

    <title>{{ $data->name }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet"
        href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link rel="stylesheet" href="{{ asset('assets/css/builder.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/customize.css') }}">
    <script src="{{ asset('assets/js/builder.js') }}"></script>
    <script type="text/javascript">
        var config = {
            all_icons: @json($all_icons),
        };
    </script>
    <script src="{{ asset('assets/js/preset.js') }}"></script>
</head>

<body>
    <div id="mobileAlert">
        <div class="message">
            <h3>Builder not work on mobile</h3>
            <a href ="{{ route('resume.index') }}">Back</a>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>Select a template</h2>
                <span class="close">&times;</span>
            </div>
            <div class="row">
                @foreach ($all_templates as $item)
                    <div class="column">
                        <div class="card card-template" data-templateid="{{ $item->id }}">
                            <img src="{{ URL::to('/') }}/storage/thumb_templates/{{ $item->thumb }}"
                                alt="{{ $item->name }}" data-was-processed="true" class="" />
                            <div class="container">
                                <h4><b>{{ $item->name }}</b></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div id="loadingMessage">
        <div class="lds-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div id="gjs"></div>

    <script type="text/javascript">
        var _token = '{{ csrf_token() }}';
        var upload_Image = '{{ URL::to('resume/uploadimage') }}';
        var url_load_template = "{{ URL::to('resumetemplate/loadtemplate') }}";
        var url_default_css_template = '{{ asset('assets/css/font-awesome.css') }}';
        var urlStore = '{{ URL::to('resume/update-builder/' . $data->id) }}';
        var urlLoad = '{{ URL::to('resume/load-builder/' . $data->id) }}';
        var back_button_url = "{{ URL::to('resume') }}";
        var exportPDF_url = "{{ URL::to('resume/download', $data->code) }}";

        var images_url = @json($images_url);
        var all_fonts = @json($all_fonts);
        var langs = {
            "fontFamily": "FONT FAMILY",
            "changeTemplates": "Change Templates",
            "exportPdf": "Download PDF",
        };
    </script>
    <script src="{{ asset('assets/js/custom-builder.js') }}"></script>
</body>

</html>
