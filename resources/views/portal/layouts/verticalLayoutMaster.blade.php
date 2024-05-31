@php
    $configData = Helper::applClasses();
@endphp
<body class="vertical-layout vertical-menu-modern 2-columns {{ $configData['blankPageClass'] }} {{ $configData['bodyClass'] }} {{($configData['theme'] === 'light') ? '' : $configData['theme'] }} {{ $configData['navbarType'] }} {{ $configData['sidebarClass'] }} {{ $configData['footerType'] }} " data-menu="vertical-menu-modern" data-col="2-columns">
    
    
    {{-- Include Sidebar --}}
    @include('portal.panels.sidebar')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <!-- BEGIN: Header-->
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

        {{-- Include Navbar --}}
        @include('portal.panels.navbar')

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
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Success</h4>
                                    <p class="mb-0">
                                        {{ $message }}
                                    </p>
                                </div>
                            @endif
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Error</h4>
                                <p class="mb-0">{{ $message }}</p>
                            </div>
                            @endif
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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Success</h4>
                            <p class="mb-0">
                                {{ $message }}
                            </p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Error</h4>
                        <p class="mb-0">{{ $message }}</p>
                    </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        @endif

    </div>
    <!-- End: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    {{-- include footer --}}
    @include('portal.panels.footer')

    {{-- include default scripts --}}
    @include('portal.panels.scripts')

    {{-- Include page script --}}
    @yield('myscript')


</body>
</html>
