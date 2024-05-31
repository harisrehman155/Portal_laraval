@php
    $configData = Helper::applClasses();
@endphp
    <body class="horizontal-layout horizontal-menu {{ $configData['blankPageClass'] }} {{ $configData['bodyClass'] }} {{($configData['theme'] === 'light') ? '' : $configData['theme'] }} {{ $configData['navbarType'] }} {{ $configData['sidebarClass'] }} {{ $configData['footerType'] }}  footer-light" data-menu="horizontal-menu" data-col="2-columns" data-open="hover">

        {{-- Include Sidebar --}}
        @include('portal.panels.sidebar')

        <!-- BEGIN: Header-->
        {{-- Include Navbar --}}
        @include('portal.panels.navbar')

        {{-- Include Sidebar --}}
        @include('portal.panels.horizontalMenu')

        <!-- BEGIN: Content-->
        <div class="app-content content">
          <div class="content-overlay"></div>
          <div class="header-navbar-shadow"></div>
            @if(!empty($configData['contentLayout']))
                <div class="content-area-wrapper">
                    <div class="{{ $configData['sidebarPositionClass'] }}">
                        <div class="sidebar">
                            {{-- Include Sidebar Content --}}
                            @yield('content-sidebar')
                        </div>
                    </div>
                    <div class="{{ $configData['contentsidebarClass'] }}">
                        <div class="content-wrapper">
                            <div class="content-body">
                                {{-- Include Page Content --}}
                                @yield('content')

                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="content-wrapper">
                    {{-- Include Breadcrumb --}}
                    @if($configData['pageHeader'] == true)
                        @include('portal.panels.breadcrumb')
                    @endif

                    <div class="content-body">

                        {{-- Include Page Content --}}
                        @yield('content')

                    </div>
                </div>
            @endif

        </div>
        <!-- End: Content-->

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        {{-- include footer --}}
        @include('portal.panels/footer')

        {{-- include default scripts --}}
        @include('portal.panels/scripts')

        {{-- Include page script --}}
        @yield('myscript')

    </body>
</html>
