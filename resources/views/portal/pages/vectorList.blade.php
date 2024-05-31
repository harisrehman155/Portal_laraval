@extends('portal/components/datatable')

@section('title', 'Vector Orders')

@section('table')

<table class="table data-list-view">
  <thead>
    <tr>
      <th>Id</th>
      <th>UserName</th>
      <th>Date</th>
      <th>Design name</th>
      <th>Number of colors</th>
      <th>Required format</th>
      <th>Color type</th>
      <th>Is urgent</th>
      <th>Instructions</th>
      <th class="action">Action</th>
    </tr>
  </thead>
</table>

@endsection

@section('myscript')

<!-- <script>
  $(function() {

    var table = $('.table').DataTable({
      processing: true,
      serverSide: true,
      searchDelay: 800,
      order: [
        [0, "desc"]
      ],
      ajax: '{!! route('vectorList') !!}',
      columns: [{
          data: 'id',
          name: 'id',
          class: 'align-middle'
        },
        {
          data: 'user_name',
          name: 'user_name',
          class: 'align-middle'
        },
        {
          data: 'formatted_created_at',
          name: 'formatted_created_at',
          class: 'align-middle'
        },
        {
          data: 'design_name',
          name: 'design_name',
          class: 'align-middle'
        },
        {
          data: 'number_of_colors',
          name: 'number_of_colors',
          class: 'align-middle'
        },
        {
          data: 'required_format',
          name: 'required_format',
          class: 'align-middle'
        },
        {
          data: 'color_type',
          name: 'color_type',
          class: 'align-middle'
        },
        {
          data: 'is_urgent',
          name: 'is_urgent',
          class: 'align-middle'
        },
        {
          data: 'instructions',
          name: 'instructions',
          class: 'align-middle'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false,
          class: 'align-middle'
        }]

    });

    var $searchBox = $("#DataTables_Table_0_filter input[type='search']");
    $searchBox.off();

    var searchDebouncedFn = debounce(function() {
      $('.table').DataTable().search($searchBox.val()).draw();
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
    };

    $('#DataTables_Table_0_filter input').addClass('form-control-md').removeClass('custom-select-sm form-control-sm');
    $('#dataTables_length select').addClass('form-control-md').removeClass('form-control-sm');
    
  });
</script> -->

<script>
  $(function() {
    var table = $('.table').DataTable({
      processing: true,
      serverSide: true,
      searchDelay: 800,
      order: [
        [0, "desc"]
      ],
      ajax: '{!! route('vectorList') !!}',
      columns: [{
          data: 'id',
          name: 'id',
          class: 'align-middle'
        },
        {
          data: 'user_name',
          name: 'users.name',
          class: 'align-middle'
        },
        {
          data: 'formatted_created_at',
          name: 'formatted_created_at',
          class: 'align-middle'
        },
        {
          data: 'design_name',
          name: 'design_name',
          class: 'align-middle'
        },
        {
          data: 'number_of_colors',
          name: 'number_of_colors',
          class: 'align-middle'
        },
        {
          data: 'required_format',
          name: 'required_format',
          class: 'align-middle'
        },
        {
          data: 'color_type',
          name: 'color_type',
          class: 'align-middle'
        },
        {
          data: 'is_urgent',
          name: 'is_urgent',
          class: 'align-middle'
        },
        {
          data: 'instructions',
          name: 'instructions',
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