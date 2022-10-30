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
<input type="hidden" id="bid" value="{{$id}}">
<!-- END Fade In Block Modal -->
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-9">
                  <h3>HISTORY</h3>
                </div>
                <div class="col-12 col-sm-3">
        
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
                         <th>Sl</th>
                        <th>Deposit Amount</th>
                        <th>Withdraw Amount</th>
                        <th>Note</th>
                        <th>Date</th>
                       
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
                  <form action="{{route('bank.deposit.delete')}}" method="post">
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
       var id = $('#bid').val();
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/bank/history/') }}"+'/' + id,

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'deposit', name: 'deposit'},
            {data: 'withdraw', name: 'withdraw'},
            {data: 'reason', name: 'reason'},
            {data: 'created_at', name: 'created_at'},
           
           
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