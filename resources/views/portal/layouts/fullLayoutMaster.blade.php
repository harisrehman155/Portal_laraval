@isset($pageConfigs)
    {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/logo/favicon.ico">
        <link rel="apple-touch-icon" sizes="57x57" href="images/logo/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="images/logo/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/logo/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="images/logo/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/logo/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="images/logo/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="images/logo/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="images/logo/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="images/logo/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="images/logo/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/logo/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="images/logo/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/logo/favicon-16x16.png">
        <link rel="manifest" href="images/logo/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#57a404">
        {{-- Include core + vendor Styles --}}
        @include('portal/panels/styles')
        {{-- Include page Style --}}
        @yield('mystyle')

    </head>

    {{-- {!! Helper::applClasses() !!} --}}
    @php
    $configData = Helper::applClasses();
    @endphp

    <body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                

                    <div class="content-body">
                        {{-- Include Page Content --}}
                        @yield('content')
                    </div>

            </div>
        </div>
        <!-- END: Content-->

        

       

        {{-- include footer --}}
        @include('portal/panels/footer')

        {{-- include default scripts --}}
        @include('portal/panels/scripts')

        {{-- Include page script --}}
        @yield('myscript')

    </body>
</html>
