@extends('portal/layouts/contentLayoutMaster')
@section('title', 'Profile')
@section('vendor-style')
        <!-- vednor css files -->
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}">
@endsection
@section('content')
{{-- Dashboard Analytics Start --}}
    <section id="vector">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard py-3">
                           
                            <form method="POST" action="{{ route('update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <h5 class="text-md mb-1">User Info</h5>
                                        <div class="form-label-group">
                                            <!-- <input type="text" id="inputName" class="form-control" placeholder="Name" required> -->
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ auth()->user()->name }}" required autocomplete="name" autofocus>
                                            <label for="name">Name</label>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <!-- <input type="text" id="inputName" class="form-control" placeholder="Name" required> -->
                                            <input id="cell_number" type="number" class="form-control @error('cell_number') is-invalid @enderror" name="cell_number" placeholder="Cell number" value="{{ auth()->user()->cell_number }}" autocomplete="cell_number" autofocus>
                                            <label for="cell_number">Cell Number</label>
                                            @error('cell_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <!-- <input type="text" id="inputName" class="form-control" placeholder="Name" required> -->
                                            <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Phone number" value="{{ auth()->user()->phone_number }}" autocomplete="phone_number" autofocus>
                                            <label for="phone_number">Phone Number</label>
                                            @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" value="{{ auth()->user()->address }}" autocomplete="address">
                                            <label for="address">Address</label>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <input id="fax_number" type="number" class="form-control @error('fax_number') is-invalid @enderror" name="fax_number" placeholder="Fax number" value="{{ auth()->user()->fax_number }}" autocomplete="fax_number">
                                            <label for="fax_number">fax_number</label>
                                            @error('fax_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="City" value="{{ auth()->user()->city }}" autocomplete="city">
                                            <label for="city">city</label>
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" placeholder="Company" value="{{ auth()->user()->company }}" autocomplete="company">
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
                                                <option {{ auth()->user()->company_type == 'Embroidery' ? 'selected' : '' }} value="Embroidery">Embroidery</option>
                                                <option {{ auth()->user()->company_type == 'Screen Printing' ? 'selected' : '' }} value="Screen Printing">Screen Printing</option>
                                                <option {{ auth()->user()->company_type == 'Exporter' ? 'selected' : '' }} value="Exporter">Exporter</option>
                                                <option {{ auth()->user()->company_type == 'Marketing' ? 'selected' : '' }} value="Marketing">Marketing</option>
                                                <option {{ auth()->user()->company_type == 'Clotths' ? 'selected' : '' }} value="Clotths">Clotthing</option>
                                                <option {{ auth()->user()->company_type == 'Uniform/Apparels' ? 'selected' : '' }} value="Uniform/Apparels">Uniform/Apparels</option>
                                                <option {{ auth()->user()->company_type == 'Other' ? 'selected' : '' }} value="Other">Others</option>
                                            </select>
                                            <label for="city">city</label>
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <h5 class="text-md mb-1">Login Credential</h5>
                                        <div class="form-label-group">
                                            <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email" required> -->
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ auth()->user()->email }}" required autocomplete="email">
                                            <label for="email">Email</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required> -->
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"  autocomplete="new-password">
                                            <label for="password">Password</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <!-- <input type="password" id="inputConfPassword" class="form-control" placeholder="Confirm Password" > -->
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"  autocomplete="new-password">
                                            <label for="password-confirm">Confirm Password</label>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <h5 class="text-md mb-1">Profile Picture</h5>
                                        <div class="image-upload mb-2 w-full" >    
                                            <div class="max-width-200 my-1">
                                                <img src="{{ auth()->user()->image ? asset("storage/".auth()->user()->image) : '/images/placeholder.png' }}" data-src="/images/placeholder.png" id="profile" class="img-thumbnail d-block" />
                                                

                                                <div class="input-group mb-3">        
                                                    <div class="custom-file">
                                                        <input type="file" id="profileImage" class="custom-file-input" name="image" id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>                         
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right btn-inline mb-50 pb-10">Update</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Dashboard Analytics end -->
@endsection
@section('vendor-script')
        <!-- vednor files -->
        <script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
@endsection
@section('myscript')
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#profile').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  
  $("#profileImage").change(function() {
    readURL(this);
  });

</script>
  @endsection