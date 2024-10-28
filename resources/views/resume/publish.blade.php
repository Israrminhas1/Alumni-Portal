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
    <title>{{ $item->name }}</title>
    <link rel="icon" href="{{ asset(config('app.logo_favicon')) }}" type="image/png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset(config('app.logo_favicon')) }}" />
    <meta name="description" content="{{ config('app.SITE_DESCRIPTION') }}">
    <meta name="keywords" content="{{ config('app.SITE_KEYWORDS') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
</head>

<body>
    @if ($check_remove_brand == false)
        <div class="action_footer">
            <a href="{{ URL::to('/') }}" class="cd-top">
                {{ config('app.name') }}
            </a>
        </div>
    @endif
    <script>
        window._loadPageLink = "{{ url('/') . '/get-page-json/' . $item->code }}";
        window._token = "{{ csrf_token() }}";
    </script>
    <link rel="stylesheet" href="{{ asset('assets/css/publish.css') }}">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/publish.js') }}"></script>
</body>

</html>
