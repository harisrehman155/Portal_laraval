
@extends('portal/layouts/contentLayoutMaster')

@section('title')
    @yield('title')
@endsection

@section('vendor-style')
        {{-- vednor files --}}
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
@endsection
@section('mystyle')
        {{-- Page css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
        {{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}"> --}}
@endsection
@section('content')
{{-- Data list view starts --}}
<section id="data-thumb-view" class="data-thumb-view-header mb-5">
    @yield('buttons')
    {{-- dataTable starts --}}
    <div class="table-responsive">
      @yield('table')
    </div>
    {{-- dataTable ends --}}

  </section>
  {{-- Data list view end --}}
@endsection
@section('vendor-script')
{{-- vednor js files --}}
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>


        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            function confirmDelete(url,obj) {
                        swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover this record!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    type: 'POST',
                                    data:{ _token : '{{ csrf_token() }}', _method: 'DELETE' },
                                    url: url,
                                    success:function(result){
                                        if(result.status){
                                            $(obj).closest('tr').remove();
                                            swal("Success! Your record has been deleted!", {
                                                icon: "success",
                                            });
                                        }else{
                                            swal("!Oops, something went wrong please try again later.", {
                                                icon: "error",
                                            });
                                        }
                                    }
                                });
                            }
                        });
                    }
        </script>
@endsection

