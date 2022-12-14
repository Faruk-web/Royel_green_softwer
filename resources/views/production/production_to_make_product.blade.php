@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-8"><h4></h4></div>
        <div class="col-md-2"></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('production.product.store')}}">
                @csrf
                    <div class="row">
                        <div class="col-md-8 p-1">
                        <div class=" p-3 shadow">
                                <h4 class="m-0">Production To Make Product <span class="text-primary">for Invoice: {{$production_invoice->invioce_number}}</span> </h4>
                                <span><b>Production Date: </b> {{date('d M, Y', strtotime($production_invoice->date))}}</span>
                                <div  class="row p-1">
                                <table class="table table-bordered">
                                    <thead class="bg-success text-light">
                                    <tr>
                                        <th width="60%">Product Name</th>
                                        <th>QTY</th>
                                        <th>X</th>
                                    </tr>
                                </thead>
                                <tbody id="selected_products"></tbody>

                        </table>
                        </div>
                       
                            <label for="">Date</label>
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" id="date">

                            <div class="" style="padding-top:10px">
                                <div class="form-group text-right">
                                    <input type="hidden" name="invoice_number" value="{{$production_invoice->invioce_number}}">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="shadow rounded border p-2">
                                    <h4 class="m-0">Previous Made Products <span class="text-primary">for Invoice: {{$production_invoice->invioce_number}}</span> </h4>
                                    {{$production_invoice->production_to_product_output}}
                                </div>
                                
                            </div>
                    </div>
                         </div>
                       <div class="col-md-4 p-1">
                            
                            <div class="shadow">
                                <div class="form-group shadow rounded p-3">
                                    <label for="example-text-input-alt">Search Product</label>
                                    <input type="text" class="form-control" id="product_search" placeholder="Search By product Name" name="product_search">
                                    <div class="row mt-2 p-3" id="product_show_info">

                                    </div>
                                </div>
                        </div>
                    <div class="col-md-4">
                        </div>
                    </div>
                </div>
            </form>
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



    // Begin:: doner Search for
    $('#doner_search').keyup(function () {
        var doner_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/project/create/search-doner',
            data: {
                'doner_info': doner_info
            },
            success: function (data) {
                $('#doner_show_info').html(data);
            }
        });
    });
    // End:: doner Search for

    // Begin:: members Search for
    $('#product_search').keyup(function () {
        var product_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/search/product',
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

function setMember(id, name, phone, type) {
    var check = $('#product_id_'+id).val();
    if(check) {
        error("Products is exist.");
    }
    else {
        const cartDom = `
            <tr id="product_column_`+id+`">
            <td>`+name+`</td>
            <td>
                <input type="hidden" name="product_id[]" id="product_id_`+id+`" value="`+id+`">
                <input type="number" class="form-control qty" step=any required name="quantity[]" oninput="qty(`+id+`)" value="" id="qty`+id+`" >
            </td>
            <td><button type="button" onclick="delete_product(`+id+`)" class="mt-2 btn btn-danger btn-sm">X</button></td>
            </tr>`;

        $('#selected_products').append(cartDom);
        success("product Added.");
    }
}

function delete_product(id) {
    $('#product_column_'+id).remove();
    success("Product Deleted.");
    multiply();
}

function setDonerInfo(name, phone) {
    $('#doner_name').val(name);
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


