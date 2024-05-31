@extends('portal/layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('mystyle')
        {{-- Page Css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}">
@endsection
@section('content')
<section class="row flexbox-container">
  <div class="col-xl-12 col-12 d-flex justify-content-center">
      <div class="bg-authentication rounded-0 mb-0 col-6 p-0">
          <div class="row m-0">
              {{-- <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                  <img src="{{ asset('images/pages/register.jpg') }}" alt="branding logo">
              </div> --}}
              <div class="col-lg-12 col-12 p-0">
                  <div class="card rounded-0 mb-0 p-2">
                      <div class="card-header pt-50 pb-1">
                          <div class="card-title">
                              <h4 class="mb-0">Create Account</h4>
                          </div>
                      </div>
                      <p class="px-2">Fill the below form to create a new account.</p>
                      <div class="card-content ">
                          <div class="card-body pt-0">
                            <hr>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <h5 class="text-md mb-1">User Info</h5>
                                        <div class="form-label-group">
                                            <!-- <input type="text" id="inputName" class="form-control" placeholder="Name" required> -->
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            <label for="name">Name</label>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <!-- <input type="text" id="inputName" class="form-control" placeholder="Name" required> -->
                                            <input id="cell_number" type="number" class="form-control @error('cell_number') is-invalid @enderror" name="cell_number" placeholder="Cell number" value="{{ old('cell_number') }}" autocomplete="cell_number" autofocus>
                                            <label for="cell_number">Cell Number</label>
                                            @error('cell_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <!-- <input type="text" id="inputName" class="form-control" placeholder="Name" required> -->
                                            <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Phone number" value="{{ old('phone_number') }}" autocomplete="phone_number" autofocus>
                                            <label for="phone_number">Phone Number</label>
                                            @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" value="{{ old('address') }}" autocomplete="address">
                                            <label for="address">Address</label>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <input id="fax_number" type="number" class="form-control @error('fax_number') is-invalid @enderror" name="fax_number" placeholder="Fax number" value="{{ old('fax_number') }}" autocomplete="fax_number">
                                            <label for="fax_number">fax_number</label>
                                            @error('fax_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
        
                                        <div class="form-label-group">
                                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="City" value="{{ old('city') }}" autocomplete="city">
                                            <label for="city">city</label>
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
        
                                        <div class="form-label-group">
                                            <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" placeholder="Company" value="{{ old('company') }}" autocomplete="company">
                                            <label for="company">Company</label>
                                            @error('company')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
        
                                        <div class="form-label-group">
                                            <select name="company_type" class="form-control" id="company_type">
                                                <option value="">Company Type</option>
                                                <option value="Embroidery">Embroidery</option>
                                                <option value="Screen Printing">Screen Printing</option>
                                                <option value="Exporter">Exporter</option>
                                                <option value="Marketing">Marketing</option>
                                                <option value="Clotths">Clotthing</option>
                                                <option value="Uniform/Apparels">Uniform/Apparels</option>
                                                <option value="Other">Others</option>
                                            </select>
                                            <label for="city">city</label>
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <h5 class="text-md mb-1">Login Credential</h5>
                                        <div class="form-label-group">
                                            <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email" required> -->
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                                            <label for="email">Email</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required> -->
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                                            <label for="password">Password</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <!-- <input type="password" id="inputConfPassword" class="form-control" placeholder="Confirm Password" required> -->
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                            <label for="password-confirm">Confirm Password</label>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <fieldset class="checkbox">
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" required>
                                                    <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                    </span>
                                                    <span class=""> I accept the terms & conditions.</span>
                                                </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p class="float-left btn-inline my-50">Already have account <a href="login" class="font-weight-bold">Login</a></p> 
                                <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</a>
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
