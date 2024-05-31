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

        <title>@yield('title') - {{ env('APP_NAME') }}</title>
        
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

        <link rel="stylesheet" href="{{ asset(mix('css/main.css')) }}">

        @yield('mystyle')

        <style>
            .form-label-group > label {
                z-index: -1!important;
            }
            
            h1.text-bold-700.mt-0.mr-auto.text-2xl {
                font-size: 50px;
                top: -20px;
                position: relative;
            }

            .avatar-content .feather.font-xl {
                font-size: 10em;
                opacity: 0.5;
                top: 34px;
                right: 40px;
                position: relative;
            }
            h2.text-bold-700.mt-1.mr-auto {
                font-size: 4em;
                position: relative;
                top: -50px;
                left: 5px;
            }
            p.mb-2.d-inline.text-dark.mr-auto {
                position: relative;
                top: -55px;
            }
            .card.order-card {
                height: 150px;
            }

            .avatar .avatar-content {
                width: 52px;
                height: 52px;
                
            }
        </style>
        
        <style>
            div#DataTables_Table_0_processing {
                background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
                box-shadow: 0 0 8px 1px rgba(115, 103, 240, 0.6);
                color: #fff;
            }
        </style>
    </head>

    {{-- {!! Helper::applClasses() !!} --}}
    @php
        $configData = Helper::applClasses();
    @endphp

    @extends((( $configData["mainLayoutType"] === 'horizontal') ? 'portal/layouts/horizontalLayoutMaster' : 'portal/layouts.verticalLayoutMaster' ))
    