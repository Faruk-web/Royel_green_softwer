@extends('layouts.app')
@section('body_content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<div class="container-fluid">
    <div class="modal fade" id="modal-block-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
            <form action="{{route('bank.add')}}" method="post">
                @csrf
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title text-light">Add Bank </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <div class="form-group">
                        <label for="example-text-input">Bank Name</label>
                        <input  type="text" class="form-control" id="" required name="name">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">Branch</label>
                        <input type="text" class="form-control" id="" required name="branch" >
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">A/c No</label>
                        <input type="text" class="form-control" id="" required name="account_number" >
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">A/c Type</label>
                        <input type="text" class="form-control" id="" required name="account_type" >
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">Opening Balance</label>
                        <input type="text" class="form-control" id="" required name="opening_balance" >
                    </div>
                </div>
                <div class="block-content block-content-full text-right border-top">
                    <button type="button" class="btn btn-alt-primary mr-1" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-9">
                  <h3>Bank List</h3>
                </div>
                <div class="col-12 col-sm-3">
<div class="block-options text-right">
                    <button type="button" class="btn btn-rounded btn-primary push" data-toggle="modal" data-target="#modal-block-fadein">Add Bank</button>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                      
                        
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                          <div class="table-responsive">
                            <table class="table data-table" >
                              <thead>
                                <tr>
                          <th>Bank Name</th>
                        <th>Branch</th>
                        <th>A/C Number</th>
                        <th>A/C Type</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                                </tr>
                              </thead>
                              
                            </table>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
     <script type="text/javascript">

$(document).ready(function () {
    var toggle_yes = $('#toggle_yes').val();
    if (typeof (toggle_yes) != 'undefined' && toggle_yes != null) {
        SidebarColpase();
    }
});

  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('bank.list.data') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'branch', name: 'branch'},
            {data: 'acn', name: 'acn'},
            {data: 'act', name: 'act'},
            {data: 'amount', name: 'amount'},
            {data: 'action', name: 'action'},
           
        ],
        "scrollY": "300px",
        "pageLength": 100,
        "ordering": false,
    });
    
  });

</script>
@endsection