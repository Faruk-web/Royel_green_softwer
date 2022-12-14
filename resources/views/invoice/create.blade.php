@extends('layouts.app')
@section('body_content')

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <div class="container p-4">
    <div class="row shadow rounded bg-light" style="padding-top:20px">
      <div class="col-md-10">
      <h2>Production Invoice List</h2>
      </div>
      <div class="col-md-2 text-right">
          <!-- <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#exampleModal" style="font-size:14px">Product Invoice</button> -->
      </div>
      <div class="row">
          <div class="col-md-12 text-danger">
              @if($errors->any())
                  {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
              @endif
          </div>
      </div>
      <div class="col-md-12 mb-3">
        <table class="table table-bordered data-table display nowrap">
          <thead>
              <tr>
                  <th>Date</th>
                  <th>Invoice</th>
                  <th>Materials Cost</th>
                  <th>status</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('invoice.list.data') }}",
        columns: [
            {data: 'date', name: 'date'},
            {data: 'invioce_number', name: 'invioce_number'},
            {data: 'total_cost', name: 'total_cost'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'},
        ],
        "scrollY": "300px",
        "pageLength": 50,
        "ordering": false,
    });
  });
</script>

@endsection
