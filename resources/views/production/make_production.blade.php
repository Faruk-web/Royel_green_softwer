@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-8"><h4></h4></div>
        <div class="col-md-2"></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('production.material.store')}}">
                @csrf
                    <div class="row">
                        <div class="col-md-8 p-1">
                            <div class="shadow p-2">
                                <h4 class="m-0">Make Production</h4>
                                <table class="table table-bordered">
                                    <thead class="bg-dark text-light">
                                        <tr>
                                            <th width="30%">Name</th>
                                            <th>Qty</th>
                                            <th>Per Price</th>
                                            <th>Total</th>
                                            <th>X</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_output"></tbody>
                                </table>
                            
                            <div class="row">
                                <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <label for="">Total Production Cost</label>
                                        <input type="hidden" class="form-control" name="invioce_number" value="">
                                        <input type="text" class="form-control" id="all_total" readonly>
                                    </div>
                                </div>
                                <label for="">Date</label>
                                <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control" id="">
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Note</label>
                                            <textarea class="form-control" name="note" cols="30" rows="5" value=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            <div class="" style="padding-top:10px">
                                <div class="form-group text-right">
                                <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                       </div>
                       <div class="col-md-4">
                        <div class="shadow">
                            <div class="form-group shadow rounded p-3">
                                <label for="example-text-input-alt">Search Material</label>
                                <input type="text" class="form-control" id="search_materials" placeholder="Search By product Name" name="search_materials">
                                <div class="row mt-2 p-3" id="product_show_info">

                                </div>
                            </div>
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

    // Begin:: members Search for
    $('#search_materials').keyup(function () {
        var material_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/make-production/search_materials',
            data: {
                'material_info': material_info
            },
            success: function (data) {
                $('#product_show_info').html(data);
            }
        });
    });
    // End:: doner Search for
</script>

<script>

function set_materials(id, material_name, price, stock_qty, unit_type) {
    var check = $('#material_id_'+id).val();
    if(check) {
        error("Material is exist.");
    }
    else {
        const cartDom = `<tr id="material_row_`+id+`">
                            <td>
                                `+material_name+`
                                <input type="hidden" name="material_id[]" id="material_id_`+id+`" value="`+id+`" >
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


