@extends('portal/layouts/contentLayoutMaster')
@section('title', 'Manage Order')
@section('vendor-style')
<!-- vednor css files -->
<link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection
@section('mystyle')
<!-- Page css files -->
<link rel="stylesheet" href="{{ asset(mix('css/plugins/file-uploaders/dropzone.css')) }}">
<style>
    i.feather.icon-x-circle {
        font-size: 18px;
        color: red;
    }

    i.feather.icon-check-circle {
        font-size: 18px;
        color: green;
    }
</style>
@endsection
@section('content')
{{-- Dashboard Analytics Start --}}
<section id="vector">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body card-dashboard pt-3">
                        <form method="POST" action="{{ route('complete.order') }}">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                    <div class="form-label-group">
                                        <select name="order_id" id="order_id" class="select2-icons form-control @error('order_id') is-invalid @enderror">
                                            <option value="" disabled selected>Select Order</option>
                                            @foreach ($orders as $item)
                                            <option data-icon="feather icon-{{ $item->status ? 'check-circle' : 'x-circle' }}" value="{{ $item->id }}">0{{ $item->id .'-'. $item->design_name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="order_id">Color Type</label>
                                        @error('order_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="document">Files To Upload</label>
                                        <div class="needsclick dropzone" id="document-dropzone">
                                            <div class="dz-message">Drop Files Here To Upload</div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-label-group">
                                            <textarea id="detail" rows="6" name="detail" placeholder="detail" class="form-control @error('detail') is-invalid @enderror">{{ $order->detail ?? old('detail') }}</textarea>
                                    <label for="detail">Detail</label>
                                    @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                {{-- <div class="form-group">
                                            <label for="document">Files To Upload</label>
                                            <div class="needsclick dropzone" id="document-dropzone">
                                                <div class="dz-message">Drop Files Here To Upload</div>
                                            </div>
                                        </div> --}}
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
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/forms/select/form-select2.js')) }}"></script>
<script>
    var uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
        url: '{{ route('customer.storeMedia') }}',
        maxFilesize: 300, // MB
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        totaluploadprogress: function(progress) {
            if (progress == 100) {
                $('#submitBtn').removeAttr('disabled');
                $('#submitBtn').html('');
                $('#submitBtn').html('Place Order');
            } else if (progress < 100) {
                var html = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...';
                if ($('#submitBtn').html() != html) {
                    $('#submitBtn').attr('disabled', 'true');
                    $('#submitBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...');
                }
            }
        },
        success: function(file, response) {
            $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function(file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="document[]"][value="' + name + '"]').remove()
        },
        init: function() {
            @if(isset($order) && $order -> getMedia('document'))
            var files = {
                !!json_encode($order -> getMedia('document')) !!
            }
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