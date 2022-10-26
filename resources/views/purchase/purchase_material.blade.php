@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-8"><h4></h4></div>
        <div class="col-md-2"></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('purchase.material.submite')}}">
                @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12 p-2">
                                    <div class="rounded shadow p-2">
                                        <div class="rounded">
                                            <input type="text" class="form-control" id="search_supplier" placeholder="Search by supplier info (name, phone)" name="company_name">
                                        </div>
                                        <table class="table table-bootstrap">
                                            <tbody id="supplier_show_info"></tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-12 my-1" id="supplier_info_show" style="display: none;">
                                    <div class="shadow rounded p-2">
                                        <h4 class="mb-1"><b>Supplier Name: </b> <span id="supplier_name"></span></h4>
                                        <h4 class="mb-1"><b>Supplier Phone: </b> <span id="supplier_phone"></span></h4>
                                        <input type="hidden" name="supplier_id" id="supplier_id" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class=" p-3 shadow my-1">
                                <div  class="row">
                                <table class="table table-bordered">
                                    <thead class="bg-dark text-light">
                                        <tr>
                                            <th width="30%">Material Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                            <th>X</th>
                                        </tr>
                                    </thead>
                                <tbody id="selected_products"></tbody>
                            </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <label for="">Total Tk:</label>
                                        <input type="text" class="form-control" id="all_total" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Note</label>
                                            <textarea class="form-control" name="note" cols="30" rows="5" value=""></textarea>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Date</label>
                                        <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control" id="all_total">
                                    </div>
                                </div>
                                <div class="" style="padding-top:10px">
                                    <div class="form-group text-right" id="submit_button_div" style="display: none;">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                        </div>
                         </div>
                       <div class="col-md-4">
                        <div class="shadow">
                            <div class="form-group shadow rounded p-3">
                                <label for="example-text-input-alt">Search Raw Material</label>
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

    // Begin:: doner Search for 
    $('#search_supplier').keyup(function () {
        var project_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/purchase/invoice/search-project',
            data: {
                'project_info': project_info
            },
            success: function (data) {
                $('#supplier_show_info').html(data);
            }
        });
    });

    // End:: doner Search for
    function setSupplierInfo(id, supplier_name, phone) {
        //alert(id);
        $('#supplier_name').text(supplier_name);
        $('#supplier_phone').text(phone);
        $('#supplier_info_show').show();
        $('#submit_button_div').show();
        $('#supplier_id').val(id);
        $('#search_supplier').val(supplier_name);
        $('#supplier_show_info').html('');
}


    // Begin:: members Search for
    $('#product_search').keyup(function () {
        var product_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/search//raw/material',
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

function setMember(id, name,type, price) {
    var check = $('#material_id'+id).val();
    if(check) {
        error("Products is exist.");
    }
    else {
        const cartDom = `
            <tr id="product_column_`+id+`">
                <td>`+name+`</td>
                <td><input type="hidden" name="material_id[]" id="product_id_`+id+`" value="`+id+`">
                <input type="number" class="form-control qty" required name="quantity[]" oninput="qty(`+id+`)" value="" id="qty`+id+`" ></td>
                <td> <input type="number" class="form-control price" required name="price[]" oninput="price(`+id+`)" value="`+price+`" id="price`+id+`" ></td>
                <td> <input type="number" class="form-control total" name="total_price[]" value="0" id="total`+id+`" readonly></td>
                <td><button type="button" onclick="delete_product(`+id+`)" class="mt-2 btn btn-danger btn-sm">X</button></td>
            </tr>`;

        $('#selected_products').append(cartDom);
        $('#product_show_info').html('');
        $('#product_search').val('');
        //success("product Added.");
    }
}

function delete_product(id) {
    $('#product_column_'+id).remove();
    success("Product Deleted.");
    multiply();
}

function setDonerInfo(supplier_name, phone) {
    $('#doner_name').val(supplier_name);
    $('#doner_phone').val(phone);
    $('#modal_close').click();
    success("Doner Info set Successfully.");
}

function qty(id) {
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

		$('#all_total').val(final_tk);
    }

    }

</script>

@endsection


