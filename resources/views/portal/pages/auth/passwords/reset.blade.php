@extends('portal/layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('mystyle')
        {{-- Page Css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}">
@endsection
@section('content')
<section class="row flexbox-container">
  <div class="col-xl-8 col-11 d-flex justify-content-center">
      <div class="card bg-authentication rounded-0 mb-0">
          <div class="row m-0">
              <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                  <img src="{{ asset('images/pages/login.png') }}" alt="branding logo">
              </div>
              <div class="col-lg-6 col-12 p-0">
                  <div class="card rounded-0 mb-0 px-2 pb-2">
                      <div class="card-header pb-1">
                          <div class="card-title">
                              <h4 class="mb-0">Login</h4>
                          </div>
                      </div>
                      <p class="px-2">Welcome back, please login to your account.</p>
                      <div class="card-content">
                          <div class="card-body pt-1">
                            
                            @if(session()->has('error'))
                                <div class="m-0 mb-3 alert alert-danger">
                                    {!! session()->get('error') !!}
                                </div>
                            @endif
                          <form action="{{ route('password.update') }}" method="post">
                            
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                                  <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input type="email" class="form-control" id="user-name" name="email" value="{{ request()->get('email') }}" placeholder="Email" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                        <label for="user-name">email</label>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                  </fieldset>

                                  <fieldset class="form-label-group position-relative has-icon-left">
                                        <input type="password" class="form-control" id="user-password" name="password" placeholder="New Password" required autocomplete="false">
                                        <div class="form-control-position">
                                            <i class="feather icon-lock"></i>
                                        </div>
                                        <label for="user-password">New Password</label>
                                        @if ($errors->has('password'))
                                            <span class="error" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                  </fieldset>

                                <fieldset class="form-label-group position-relative has-icon-left">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="ConfirmPassword" required autocomplete="false">
                                    <div class="form-control-position">
                                        <i class="feather icon-lock"></i>
                                    </div>
                                    <label for="password_confirmation">Password</label>
                                    @if ($errors->has('password'))
                                        <span class="error" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </fieldset>
                                  
                                  <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                              </form>
                          </div>
                      </div>
                      
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
