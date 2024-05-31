@extends('portal/components/datatable')

@section('title', 'Users')

@section('table')
<table class="table data-list-view">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Company</th>
      <th>Company Type</th>
      <th>Phone Number</th>
      <th>Cell Number</th>
      <th>Address</th>
      <th>City</th>
      <th class="action">Action</th>
    </tr>
  </thead>
</table>
@endsection

@section('myscript')
<script>
  $(function() {
    var table = $('.table').DataTable({
      processing: true,
      serverSide: true,
      searchDelay: 800,
      order: [
        [0, "desc"]
      ],
      ajax: '{!! route('usersList') !!}',
      columns: [{
          data: 'id',
          name: 'id',
          class: 'align-middle'
        },
        {
          data: 'name',
          name: 'name',
          class: 'align-middle'
        },
        {
          data: 'email',
          name: 'email',
          class: 'align-middle'
        },
        {
          data: 'company',
          name: 'company',
          class: 'align-middle'
        },
        {
          data: 'company_type',
          name: 'company_type',
          class: 'align-middle'
        },
        {
          data: 'phone_number',
          name: 'phone_number',
          class: 'align-middle'
        },
        {
          data: 'cell_number',
          name: 'cell_number',
          class: 'align-middle'
        },
        {
          data: 'address',
          name: 'address',
          class: 'align-middle'
        },
        {
          data: 'city',
          name: 'city',
          class: 'align-middle'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false,
          class: 'align-middle'
        }
      ]
    });

    var $searchBox = $("#DataTables_Table_0_filter input[type='search']");
    $searchBox.off();

    var searchDebouncedFn = debounce(function() {
      table.search($searchBox.val()).draw();
    }, 800);

    $searchBox.on("keyup", searchDebouncedFn);

    function debounce(func, wait, immediate) {
      var timeout;
      return function() {
        var context = this,
          args = arguments;
        var later = function() {
          timeout = null;
          if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
      };
    }

    $('#DataTables_Table_0_filter input').addClass('form-control-md').removeClass('custom-select-sm form-control-sm');
    $('#dataTables_length select').addClass('form-control-md').removeClass('form-control-sm');

  });
</script>
@endsection