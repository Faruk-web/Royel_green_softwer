@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-8"><h4>Bill Prepare</h4></div>
        <div class="col-md-2"></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('bill.preparation.store')}}">
                @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12 p-2">
                                    <div class="shadow rounded p-2 mb-4">
                                        <h4 class="fw-bold">Set Client Info or <span class="badge badge-pill badge-primary" data-toggle="modal" data-target="#exampleModal" style="cursor: grab;">Search Client</span></h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input-alt"><span class="text-danger">*</span>Client Name</label>
                                                    <input type="text" class="form-control" name="client_name" id="client_name" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input-alt"><span class="text-danger">*</span>Client Phone</label>
                                                    <input type="text" class="form-control" maxlength="11" minlength="11" name="client_phone" value="" id="client_phone" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class=" p-3 shadow my-1">
                                <div  class="row">
                                <table class="table table-bordered">
                                    <thead class="bg-dark text-light">
                                        <tr>
                                            <th width="30%">Product Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                            <th>X</th>
                                        </tr>
                                    </thead>
                                <tbody id="tbody_output"></tbody>
                            </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <label for="">Total Tk:</label>
                                    <input type="text" class="form-control" id="all_total" readonly>
                                </div>
                                <div class="col-md-8"></div>
                                <div class="col-md-4 mt-2">
                                    <label for=""><span class="text-danger">*</span>Paid</label>
                                    <input type="number" step="any" class="form-control" id="paid" name="paid" required>
                                </div>
                                
                                </div>
                                
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">PVS</label>
                                            <input type="text"  class="form-control" id="pvs" name="pvs">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Gate pass Number</label>
                                            <input type="text"  class="form-control" id="gate_pass_number" name="gate_pass_number">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Place Details</label>
                                            <textarea class="form-control" name="place_details" cols="30" rows="2" value=""></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Note</label>
                                            <textarea class="form-control" name="note" cols="30" rows="2" value=""></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="">Date</label>
                                        <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control" id="all_total">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="">Voucher Number</label>
                                        <input type="text" name="voucher_number" value="" class="form-control" id="">
                                    </div>
                                    
                                </div>
                                <div class="" style="padding-top:10px">
                                    <div class="form-group text-right" id="submit_button_div">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                        </div>
                         </div>
                       <div class="col-md-4">
                        <div class="shadow">
                            <div class="form-group shadow rounded p-3">
                                <label for="example-text-input-alt">Search Products</label>
                                <input type="text" class="form-control" id="product_search" placeholder="Search By Material Name" name="product_search">
                                <div class="row mt-2 p-3" id="product_show_info">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light" id="exampleModalLabel">Search Client and set</h5>
          <button type="button" class="close text-light" id="modal_close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="form-group shadow rounded p-1">
                        <input type="text" class="form-control" id="client_search" placeholder="Search by Client info (name, phone)" name="company_name">
                    </div>
                </div>
                <div class="col-md-3 text-center">

                </div>
                <div class="col-md-12">
                    <div class="pl-1 pr-1 pb-2">
                        <div class="card-body shadow rounded">
                            <table class="table table-bootstrap">
                                <tbody id="client_show_info"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"
referrerpolicy="no-referrer"></script>

<script>

    $(document).ready(function () {
        SidebarColpase();
    });

    $("form").bind("keypress", function (e) {
        if (e.keyCode == 13) {
            return false;
        }
    });

    // Begin:: client Search for 
    $('#client_search').keyup(function () {
        var client_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/bill_preparation/search_client',
            data: {
                'client_info': client_info
            },
            success: function (data) {
                $('#client_show_info').html(data);
            }
        });
    });

    // End:: client Search for
    function setClientInfo(id, name, phone) {
        
        $('#client_name').val(name);
        $('#client_phone').val(phone);
        $('#modal_close').click();
        success("Client Info set Successfully.");


}


    // Begin:: members Search for
    $('#product_search').keyup(function () {
        var product_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/bill_preparation/search_products',
            data: {
                'product_info': product_info
            },
            success: function (data) {
                $('#product_show_info').html(data);
            }
        });
    });
    // End:: doner Search for
</script>

<script>

function set_product(id, product_name, price, stock_qty, unit_type) {
    console.log(id);
    var check = $('#material_id_'+id).val();
    if(check) {
        error("Product is exist.");
    }
    else {
        const cartDom = `<tr id="material_row_`+id+`">
                            <td>
                                `+product_name+`
                                <input type="hidden" name="product_id[]" id="material_id_`+id+`" value="`+id+`" >
                            </th>
                            <td><input class="form-control qty" type="number" required max="`+stock_qty+`" name="quantity[]" oninput="change_quantity()" id="" value="" step=any> <small class="text-danger">Max: `+stock_qty+` `+unit_type+`</small></td>
                            <td><input class="form-control price" type="number" required name="price[]" id="" readonly value="`+price+`" step=any></td>
                            <td><input class="form-control total" readonly type="number" name="total_price[]" id="" value="" step=any></td>
                            <td><button type="button" onclick="delete_product(`+id+`)" class="mt-2 btn btn-danger btn-sm">X</button></td>
                        </tr>`;

        $('#tbody_output').append(cartDom);
    }
}

    function delete_product(id) {
        $('#material_row_'+id).remove();
        success("Material Deleted.");
        multiply();
    }


    function change_quantity(id) {
        multiply();
    }

    function price(id) {
        multiply();
    }

    function multiply() {

        var qty = document.querySelectorAll(".qty");
        var i, qty = qty.length;

        for (i = 0; i < qty; i++) {
            perprice = Number(document.getElementsByClassName('price')[i].value);
            qty = Number(document.getElementsByClassName('qty')[i].value);
            tk = perprice*qty;
            document.getElementsByClassName('total')[i].value=tk.toFixed(2);
            calculateSum();

        }
        function calculateSum() {
            var final_tk = 0;
            $(".total").each(function() {
                if(!isNaN(this.value) && this.value.length!=0) {
                    final_tk += parseFloat(this.value);
                }
            });

            $('#all_total').val(final_tk.toFixed(2));
        }
    }

</script>

@endsection


