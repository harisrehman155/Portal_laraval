@extends('portal/layouts/contentLayoutMaster')
@section('title', 'Place a Digitizing Order')
@section('vendor-style')
        <!-- vednor css files -->
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection
@section('mystyle')
        <!-- Page css files -->
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/file-uploaders/dropzone.css')) }}">
@endsection
@section('content')
{{-- Dashboard Analytics Start --}}
    <section id="vector">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard pt-3">
                            <form method="POST" action="{{ isset($order) ? route('update.order', $order->id) : route('place.order') }}">
                                @csrf
                                @if (isset($order))
                                    @method('PATCH')
                                @endif
                                <input type="hidden" value="{{ $order->type ?? 0 }}" name="type" />
                                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id" />
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-label-group">
                                                    <input id="design_name" type="text" class="form-control @error('design_name') is-invalid @enderror" name="design_name" placeholder="Design Name" value="{{ $order->design_name ?? old('design_name') }}" required autocomplete="design_name" autofocus>
                                                    <label for="design_name">Design Name</label>
                                                    @error('design_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-label-group">
                                                    <!-- <input type="text" id="inputName" class="form-control" placeholder="Name" required> -->
                                                    <input id="po_no" type="number" class="form-control @error('po_no') is-invalid @enderror" name="po_no" placeholder="PO#" value="{{ $order->po_no ?? old('po_no') }}" autocomplete="po_no" autofocus>
                                                    <label for="po_no">PO#</label>
                                                    @error('po_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-label-group">
                                                    <!-- <input type="text" id="inputName" class="form-control" placeholder="Name" required> -->
                                                    <input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height" placeholder="Height" value="{{ $order->height ??  old('height') }}" autocomplete="height" autofocus>
                                                    <label for="height">Height</label>
                                                    @error('height')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-label-group">
                                                    <!-- <input type="text" id="inputName" class="form-control" placeholder="Name" required> -->
                                                    <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" placeholder="Weight" value="{{ $order->weight ?? old('weight') }}" autocomplete="weight" autofocus>
                                                    <label for="weight">Weight</label>
                                                    @error('weight')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-label-group">
                                                    <!-- <input type="text" id="inputName" class="form-control" placeholder="Name" required> -->
                                                    <input id="number_of_colors" type="number" class="form-control @error('number_of_colors') is-invalid @enderror" name="number_of_colors" placeholder="Number of Colors" value="{{  $order->number_of_colors ??  old('number_of_colors') }}" autocomplete="number_of_colors" autofocus>
                                                    <label for="number_of_colors">  </label>
                                                    @error('number_of_colors')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-label-group">
                                                    <select name="fabric" id="fabric" class="select2 form-control @error('fabric') is-invalid @enderror">
                                                        <option value="" disabled selected>Select Fabric</option>
                                                        <option {{ isset($order) && $order->fabric == 'Apron' ? 'selected' : '' }} value="Apron">Apron</option>
                                                        <option {{ isset($order) && $order->fabric == 'Blanket' ? 'selected' : '' }} value="Blanket">Blanket</option>
                                                        <option {{ isset($order) && $order->fabric == 'Canvas' ? 'selected' : '' }} value="Canvas">Canvas</option>
                                                        <option {{ isset($order) && $order->fabric == 'Cotton Woven' ? 'selected' : '' }} value="Cotton Woven">Cotton Woven</option>
                                                        <option {{ isset($order) && $order->fabric == 'Chenille' ? 'selected' : '' }} value="Chenille">Chenille</option>
                                                        <option {{ isset($order) && $order->fabric == 'Denim' ? 'selected' : '' }} value="Denim">Denim</option>
                                                        <option {{ isset($order) && $order->fabric == 'Felt' ? 'selected' : '' }} value="Felt">Felt</option>
                                                        <option {{ isset($order) && $order->fabric == 'Fleece' ? 'selected' : '' }} value="Fleece">Fleece</option>
                                                        <option {{ isset($order) && $order->fabric == 'Flannel' ? 'selected' : '' }} value="Flannel">Flannel</option>
                                                        <option {{ isset($order) && $order->fabric == 'Pique' ? 'selected' : '' }} value="Pique">Pique</option>
                                                        <option {{ isset($order) && $order->fabric == 'Single Jersey' ? 'selected' : '' }} value="Single Jersey">Single Jersey</option>
                                                        <option {{ isset($order) && $order->fabric == 'Silk' ? 'selected' : '' }} value="Silk">Silk</option>
                                                        <option {{ isset($order) && $order->fabric == 'Polyester' ? 'selected' : '' }} value="Polyester">Polyester</option>
                                                        <option {{ isset($order) && $order->fabric == 'knit sweater' ? 'selected' : '' }} value="knit sweater">knit sweater</option>
                                                        <option {{ isset($order) && $order->fabric == 'Twill' ? 'selected' : '' }} value="Twill">Twill</option>
                                                        <option {{ isset($order) && $order->fabric == 'Towel' ? 'selected' : '' }} value="Towel">Towel</option>
                                                        <option {{ isset($order) && $order->fabric == 'Leather' ? 'selected' : '' }} value="Leather">Leather</option>
                                                        <option {{ isset($order) && $order->fabric == 'Nylon' ? 'selected' : '' }} value="Nylon">Nylon</option>
                                                        <option {{ isset($order) && $order->fabric == 'polar fleece' ? 'selected' : '' }} value="polar fleece">polar fleece</option>
                                                        <option {{ isset($order) && $order->fabric == 'Mesh knit' ? 'selected' : '' }} value="Mesh knit">Mesh knit</option>
                                                        <option {{ isset($order) && $order->fabric == 'Beanie' ? 'selected' : '' }} value="Beanie">Beanie</option>
                                                        <option {{ isset($order) && $order->fabric == 'Stretchy polyester / light Knit Fabric' ? 'selected' : '' }} value="Stretchy polyester / light Knit Fabric">Stretchy polyester / light Knit Fabric</option>
                                                        <option {{ isset($order) && $order->fabric == 'Other' ? 'selected' : '' }} value="Other">Other</option>
                                                    </select>
                                                    <label for="fabric">Select Fabric</label>
                                                    @error('fabric')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-label-group">
                                                    <select name="placement" id="placement" class="select2 form-control @error('placement') is-invalid @enderror">
                                                        <option value="" disabled selected>Select placement</option>
                                                        <option {{ isset($order) && $order->placement == 'Bags' ? 'selected' : '' }} value="Bags">Bags</option>
                                                        <option {{ isset($order) && $order->placement == 'Cap' ? 'selected' : '' }} value="Cap">Cap</option>
                                                        <option {{ isset($order) && $order->placement == 'Chest' ? 'selected' : '' }} value="Chest">Chest</option>
                                                        <option {{ isset($order) && $order->placement == 'Gloves' ? 'selected' : '' }} value="Gloves">Gloves</option>
                                                        <option {{ isset($order) && $order->placement == 'Cap Side' ? 'selected' : '' }} value="Cap Side">Cap Side</option>
                                                        <option {{ isset($order) && $order->placement == 'Cap Back' ? 'selected' : '' }} value="Cap Back">Cap Back</option>
                                                        <option {{ isset($order) && $order->placement == 'Towel' ? 'selected' : '' }} value="Towel">Towel</option>
                                                        <option {{ isset($order) && $order->placement == 'JacketBack' ? 'selected' : '' }} value="JacketBack">JacketBack</option>
                                                        <option {{ isset($order) && $order->placement == 'Sleeve' ? 'selected' : '' }} value="Sleeve">Sleeve</option>
                                                        <option {{ isset($order) && $order->placement == 'Patches' ? 'selected' : '' }} value="Patches">Patches</option>
                                                        <option {{ isset($order) && $order->placement == 'Visor' ? 'selected' : '' }} value="Visor">Visor </option>
                                                        <option {{ isset($order) && $order->placement == 'Table Cloth' ? 'selected' : '' }} value="Table Cloth">Table Cloth</option>
                                                        <option {{ isset($order) && $order->placement == 'Beanie Caps' ? 'selected' : '' }} value="Beanie Caps">Beanie Caps</option>
                                                        <option {{ isset($order) && $order->placement == 'Apron' ? 'selected' : '' }} value="Apron">Apron</option>
                                                        <option {{ isset($order) && $order->placement == 'other' ? 'selected' : '' }} value="other">other</option>
                                                    </select>
                                                    <label for="placement">Required Format</label>
                                                    @error('placement')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-label-group">
                                                    <select name="required_format" id="required_format" class="select2 form-control @error('required_format') is-invalid @enderror">
                                                        <option value="" disabled selected>Required Format</option>
                                                        <option value="cdr" {{ isset($order) && $order->required_format == 'cdr' ? 'selected' : '' }}>cdr</option>
                                                        <option value="ai" {{ isset($order) && $order->required_format == 'ai' ? 'selected' : '' }}>ai</option>
                                                        <option value="eps" {{ isset($order) && $order->required_format == 'eps' ? 'selected' : '' }}>eps</option>
                                                        <option value="Others" {{ isset($order) && $order->required_format == 'Others' ? 'selected' : '' }}>Others</option>
                                                    </select>
                                                    <label for="required_format">Required Format</label>
                                                    @error('required_format')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-switch switch-md custom-switch-success mr-2 mb-1">
                                            <p class="mb-0">Super Urgent</p>
                                            <input type="checkbox" class="custom-control-input" id="customSwitch100" name="is_urgent" {{ isset($order) && $order->is_urgent ? 'checked' : '' }} value="1">
                                            <label class="custom-control-label" for="customSwitch100">
                                              <span class="switch-text-left">Yes</span>
                                              <span class="switch-text-right">No</span>
                                            </label>
                                        </div>
                                        <div class="form-label-group">
                                            <textarea id="instructions" rows="6" name="instructions" placeholder="instructions" class="form-control @error('instructions') is-invalid @enderror">{{ $order->instructions ?? old('instructions') }}</textarea>
                                            <label for="instructions">Instructions</label>
                                            @error('instructions')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- dropzone --}}
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="needsclick dropzone" id="document-dropzone">
                                                <div class="dz-message">Drop Files Here To Upload</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="submitBtn" class="btn btn-primary float-right btn-inline mb-3">Place Order</a>
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
        <script src="{{ asset(mix('vendors/js/extensions/dropzone.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
@endsection
@section('myscript')
<script src="{{ asset(mix('js/scripts/forms/select/form-select2.js')) }}"></script>
{{-- Page js files --}}
<script>
    var uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
      url: '{{ route('customer.storeMedia') }}',
      maxFilesize: 300, // MB
      addRemoveLinks: true,
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      
      totaluploadprogress: function(progress){
        if(progress == 100){
            $('#submitBtn').removeAttr('disabled');
            $('#submitBtn').html('');
            $('#submitBtn').html('Place Order');
        }else if(progress < 100){
            var html = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...';
            if($('#submitBtn').html() != html){
                $('#submitBtn').attr('disabled', 'true');
                $('#submitBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...');
            }
           
        }
      },
      success: function (file, response) {
        $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
        uploadedDocumentMap[file.name] = response.name
      },
      removedfile: function (file) {
        file.previewElement.remove()
        var name = ''
        if (typeof file.file_name !== 'undefined') {
          name = file.file_name
        } else {
          name = uploadedDocumentMap[file.name]
        }
        $('form').find('input[name="document[]"][value="' + name + '"]').remove()
      },
      init: function () {
        @if(isset($order) && $order->getMedia('document'))
          var files =
            {!! json_encode($order->getMedia('document')) !!}
          for (var i in files) {
            var file = files[i]
            this.options.addedfile.call(this, file)
            file.previewElement.classList.add('dz-complete')
            // console.log(file.file_name);
            $('form').append(`<input type="hidden" name="document[]" value="${file.file_name}">`)
          }
        @endif
      }
    }
  </script>
@endsection
