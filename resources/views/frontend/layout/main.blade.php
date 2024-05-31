<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }} ">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg') }}" color="#59595c">
    <meta name="msapplication-TileColor" content="#edf2f7">
    <meta name="theme-color" content="#e8242b">

    @yield('meta')

    <title>{{ Str::snakeToTitle(config('app.name')) }}</title>
    
    <link rel="stylesheet" href="{{ asset('frontend/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.circliful.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="alternate stylesheet" href="{{ asset('frontend/css/colors/color2.css') }}" title="color2" /> <!-- Color2 -->

    @stack('myStyle')

</head>
<body class="bg-gray-200">
    
    @yield('afterBodyContent')

    <main>
        @includeFirst(['frontend.components.nav'])

        @yield('content')

        @includeFirst(['frontend.components.footer'])
    </main>
    

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/downCount.js') }}"></script>
    <script src="{{ asset('frontend/js/fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/perfectscrollbar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.circliful.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom-scripts.js') }}"></script>
    
    

    @stack('pageScript')

    <script src="{{ asset('js/app.js') }}"></script>

    @stack('myScript')

</body>
</html>