
@extends('portal/layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
        <!-- vednor css files -->
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/tether-theme-arrows.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/tether.min.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/shepherd-theme-default.css')) }}">
@endsection
@section('mystyle')
        <!-- Page css files -->
        <link rel="stylesheet" href="{{ asset(mix('css/pages/dashboard-analytics.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/pages/card-analytics.css')) }}">
        {{-- <link rel="stylesheet" href="{{ asset(mix('css/plugins/tour/tour.css')) }}"> --}}
        <style>
          .card:hover {
                background: #f5f5f5;
                border: 1px solid #7a6ef0;
            }
        </style>
  @endsection

  @section('content')
    {{-- Dashboard Analytics Start --}}
    <section id="dashboard-analytics">
      <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="card bg-analytics text-white">
              <div class="card-content">
                <div class="card-body text-center">
                  <img src="{{ asset('images/elements/decore-left.png') }}" class="img-left" alt="card-img-left">
                  <img src="{{ asset('images/elements/decore-right.png')}}" class="img-right" alt="card-img-right">
                  <div class="avatar avatar-xl bg-primary shadow mt-0">
                      <div class="avatar-content">
                          <i class="feather icon-award white font-large-1"></i>
                      </div>
                  </div>
                  <div class="text-center">
                    <h1 class="mb-2 text-white">Welcome {{ auth()->user()->name }},</h1>
                    <p class="m-auto w-75">Your Cation here</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
      </div>

      <div class="row">
        @if (auth()->user()->email == env('MANAGE_ORDER_EMAIL'))
          <div class="col-lg-3 col-md-6 col-12">
            <div class="card order-card">
              <a href="{{ route('manage.orders') }}" class="">
                <div class="card-header d-flex flex-column  pb-0">
                    <div class="avatar bg-rgba-primary m-0 ml-auto">
                        <div class="avatar-content">
                            <i class="feather  icon-shopping-cart text-primary font-xl"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mr-auto">{{ App\Order::all()->count() }}</h2>
                    <p class="mb-2 d-inline text-dark mr-auto">Manage Orders</p>
                </div>
                <div class="card-content">
                    <div id="subscribe-gain-chart"></div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="card order-card">
              <a href="{{ route('users') }}" class="">
                <div class="card-header d-flex flex-column  pb-0">
                    <div class="avatar bg-rgba-warning m-0 ml-auto">
                        <div class="avatar-content">
                            <i class="feather  icon-users text-warning font-xl"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mr-auto">{{ App\User::all()->count() - 1 }}</h2>
                    <p class="mb-2 d-inline text-dark mr-auto">Users</p>
                </div>
                <div class="card-content">
                    <div id="subscribe-gain-chart"></div>
                </div>
              </a>
            </div>
          </div>
        @else
          <div class="col-lg-3 col-md-6 col-12">
            <div class="card order-card">
              <a href="{{ route('vectorListView') }}" class="">
                <div class="card-header d-flex flex-column  pb-0">
                    <div class="avatar bg-rgba-primary m-0 ml-auto">
                        <div class="avatar-content">
                            <i class="feather  icon-shopping-cart text-primary font-xl"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mr-auto">{{ auth()->user()->orders()->where('type',1)->count() }}</h2>
                    <p class="mb-2 d-inline text-dark mr-auto">View Vector Orders</p>
                </div>
                <div class="card-content">
                    <div id="subscribe-gain-chart"></div>
                </div>
              </a>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6 col-12">
            <div class="card order-card">
                <a href="{{ route('digitizingListView') }}" class="">
                <div class="card-header d-flex flex-column pb-0">
                    <div class="avatar bg-rgba-warning m-0 ml-auto">
                        <div class="avatar-content">
                            <i class="feather icon-shopping-cart text-warning font-xl"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mr-auto">{{ auth()->user()->orders()->where('type',0)->count() }}</h2>
                  <p class="mb-2 d-inline text-dark mr-auto">View Digitizing Orders</p>
                </div>
                <div class="card-content">
                    <div id="orders-received-chart"></div>
                </div>
                </a>
            </div>
          </div>
        @endif
      </div>
      
    </section>
  <!-- Dashboard Analytics end -->
  @endsection

@section('vendor-script')
        <!-- vednor files -->
        <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/extensions/tether.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/extensions/shepherd.min.js')) }}"></script>
@endsection
@section('myscript')
        <!-- Page js files -->
        {{-- <script src="{{ asset(mix('js/scripts/pages/dashboard-analytics.js')) }}"></script> --}}
@endsection

