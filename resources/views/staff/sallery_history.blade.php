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
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6" style="padding-top: 20px">
                  <h3>Payment History</h3>
                </div>
                <div class="col-12 col-sm-6">

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
                                  <th scope="col">Date</th>
                                  <th scope="col">Staff Name</th>
                                  <th scope="col">Month Name</th>
                                  <th scope="col">Paid</th>
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
            $(function () {
              var table = $('.data-table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: "{{ route('staff.sallery.index') }}",
                  columns: [
                    {data: 'day', name: 'day'},
                    {data: 'staff_info', name: 'staff_info'}, 
                    {data: 'month', name: 'month'}, 
                    {data: 'paid', name: 'paid'},
                  ],
                  "scrollY": "400px",
                  "pageLength": 50,
                  "ordering": false,
              });
            });
          </script>
@endsection