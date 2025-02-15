@php
    $configData = Helper::applClasses();
@endphp
<div class="main-menu {{ $configData['menuType'] }} {{($configData['theme'] === 'light') ? "menu-light" : "menu-dark"}} menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header bg-dark">
        <ul class="nav navbar-nav flex-row ">
            <li class="nav-item mx-auto"><a class="navbar-brand" href="dashboard-analytics">
                    {{-- <div class="brand-logo"></div> --}}
                    <h4 class="mb-0 pl-0 bold text-white">TERMINATOR PUNCH</h4>
                </a></li>
                {{-- <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary collapse-toggle-icon" data-ticon="icon-disc"></i></a></li> --}}
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- Foreach menu item starts --}}
            @foreach($menuData[0]->menu as $menu)
                @if(isset($menu->navheader))
                    <li class="navigation-header">
                        <span>{{ $menu->navheader }}</span>
                    </li>
                @else
                  {{-- Add Custom Class with nav-item --}}
                  @php
                    $custom_classes = "";
                    if(isset($menu->classlist)) {
                      $custom_classes = $menu->classlist;
                    }
                    $translation = "";
                    if(isset($menu->i18n)){
                        $translation = $menu->i18n;
                    }
                  @endphp
                    @if((auth()->user()->email == env('MANAGE_ORDER_EMAIL')) && !$menu->type)
                        <li class="nav-item p-0 m-0 {{ (request()->is($menu->url.'/*') || request()->is($menu->url)) ? 'active' : '' }} {{ $custom_classes }}">
                            <a href="{{ route($menu->route) }}" class="rounded-none">
                                <i class="{{ $menu->icon }}"></i>
                                <span class="menu-title" data-i18n="{{ $translation }}">{{ $menu->name }}</span>
                                @if (isset($menu->badge))
                                    <?php $badgeClasses = "badge badge-pill badge-primary float-right" ?>
                                    <span class="{{ isset($menu->badgeClass) ? $menu->badgeClass.' test' : $badgeClasses.' notTest' }} ">{{$menu->badge}}</span>
                                @endif
                            </a>
                            @if(isset($menu->submenu))
                                @include('portal/panels/submenu', ['menu' => $menu->submenu])
                            @endif
                        </li>
                    @else
                        @if((auth()->user()->email != env('MANAGE_ORDER_EMAIL')))
                            <li class="nav-item p-0 m-0 {{ (request()->is($menu->url.'/*') || request()->is($menu->url)) ? 'active' : '' }} {{ $custom_classes }}">
                                <a href="{{ route($menu->route) }}" class="rounded-none">
                                    <i class="{{ $menu->icon }}"></i>
                                    <span class="menu-title" data-i18n="{{ $translation }}">{{ $menu->name }}</span>
                                    @if (isset($menu->badge))
                                        <?php $badgeClasses = "badge badge-pill badge-primary float-right" ?>
                                        <span class="{{ isset($menu->badgeClass) ? $menu->badgeClass.' test' : $badgeClasses.' notTest' }} ">{{$menu->badge}}</span>
                                    @endif
                                </a>
                                @if(isset($menu->submenu))
                                    @include('portal/panels/submenu', ['menu' => $menu->submenu])
                                @endif
                            </li>
                        @endif
                    @endif
                @endif
            @endforeach
            {{-- Foreach menu item ends --}}
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
