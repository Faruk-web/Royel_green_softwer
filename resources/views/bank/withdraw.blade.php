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
<!-- Fade In Block Modal -->
<div class="modal fade" id="modal-block-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
            <form action="{{route('bank.store.withdraw')}}" method="post">
                @csrf
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title text-light">Withdraw</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <div class="form-group">
                        <label for="example-text-input">Bank</label>
                       <Select class="form-control" name="bank_id">
                           <option selected disabled>Select Bank</option>
                           @foreach ($banks as $bank)
                               <option value="{{$bank->id}}">{{$bank->name}}</option>
                           @endforeach
                       </Select>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">Amount</label>
                        <input type="number" class="form-control" id="" required name="withdraw" >
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">Note</label>
                        <textarea name="reason"  type="text" class="form-control" cols="30" rows="3"></textarea>
                        
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
<!-- END Fade In Block Modal -->
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-9">
                  <h3>Withdraw List</h3>
                </div>
                <div class="col-12 col-sm-3">
           <div class="block-options text-right">
                  <button type="button" class="btn btn-rounded btn-primary push" data-toggle="modal" data-target="#modal-block-fadein">Add withdraw</button>
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
                        <th>Bank_info</th>
                        <th>Withdraw Amount</th>
                        <th>Note</th>
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
          
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Owner Transaction</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="modal-content">
              <div class="modal-body">
                  <div class="text-info" style="text-align:center;">
                      <i class="fas fa-exclamation-triangle" style="font-size: 60px;"></i>
                  </div>
                  <div><h2 class="text-center font-bold">Are You Sure?</h2></div>
                  <div><p class="text-center">You will not be able to recover this content!</p></div>
                  <form action="{{route('bank.withdraw.delete')}}" method="post">
                      @csrf
                      <div class="row">
                          <input type="hidden" name="ot_id" id="ot_id" value="">
                          <div class="col-md-6 text-center"><button type="submit" name="sellConfirm" class="btn btn-primary">Confirm</button></div>
                          <div class="col-md-6 text-center"><button class="btn btn-danger" data-dismiss="modal">Cancel</button></div>
                      </div>
                  </form>
                  
              </div>
          </div>
        </div>
        <div class="modal-footer"></div>
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
        ajax: "{{ route('bank.withdraw.data') }}",
        columns: [
            {data: 'bank_info', name: 'bank_info'},
            {data: 'withdraw', name: 'withdraw'},
            {data: 'reason', name: 'reason'},
            {data: 'action', name: 'action'},
           
        ],
        "scrollY": "300px",
        "pageLength": 100,
        "ordering": false,
    });
    
  });

</script>
<script>
    function delete_ot(id) {
    $('#ot_id').val(id);
  }
</script>
@endsection