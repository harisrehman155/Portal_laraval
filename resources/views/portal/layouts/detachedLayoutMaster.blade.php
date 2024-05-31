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

        <title>@yield('title') - Vuexy Vuejs, HTML & Laravel Admin Dashboard Template</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/logo/favicon.ico">

        {{-- Include core + vendor Styles --}}
        @include('admin/panels/styles')
        {{-- Include page Style --}}
        @yield('mystyle')

        

    </head>

    {{-- {!! Helper::applClasses() !!} --}}
    @php
    $configData = Helper::applClasses();
    @endphp

    <body class="vertical-layout vertical-menu-modern 2-columns {{ $configData['blankPageClass'] }} {{ $configData['bodyClass'] }} {{($configData['theme'] === 'light') ? '' : $configData['theme'] }} {{ $configData['navbarType'] }} {{ $configData['sidebarClass'] }} {{ $configData['footerType'] }}  footer-light" data-menu="vertical-menu-modern" data-col="2-columns">
        {{-- Include Sidebar --}}
        
        
        
        @include('admin/panels.sidebar')

        <!-- BEGIN: Content-->
        <div class="app-content content">
            <!-- BEGIN: Header-->
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>

            {{-- Include Navbar --}}
            @include('admin/panels.navbar')

            <div class="content-wrapper">
                {{-- Include Breadcrumb --}}
                @if($configData['pageHeader'] == true)
                    @include('admin/panels.breadcrumb')
                @endif
                <div class="{{ $configData['sidebarPositionClass'] }}">
                    <div class="sidebar">
                        {{-- Include Sidebar Content --}}
                        @yield('content-sidebar')
                    </div>
                </div>
                <div class="{{ $configData['contentsidebarClass'] }}">
                    <div class="content-body">
                        {{-- Include Page Content --}}
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- End: Content-->
        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        {{-- include footer --}}
        @include('admin/panels/footer')

        {{-- include default scripts --}}
        @include('admin/panels/scripts')

        {{-- Include page script --}}
        @yield('myscript')

    </body>
</html>

