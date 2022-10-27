@extends('layouts.app')
@section('body_content')
@php

    $total_cost = 0;

@endphp
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-0">Materials for {{$product_info->product_name}} To Make</h4>
            <small class="text-danger mb-2">{{$product_info->product_name}} এই প্রোডাক্ট তৈরি করতে যে যে ম্যাটেরিয়াল প্রয়োজন হয়</small>
        </div>

        <div class="col-md-2"></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('material.make.product.submite')}}">
                @csrf
                <div class="row">
                    <div class="col-md-8 p-1">
                        <div class="shadow rounded p-2 mb-4">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="form-group">
                                   <div id="selected_members" class="row p-2">
                                    <table class="table table-bordered">
                                        <thead class="bg-dark text-light">
                                            <tr>
                                                <th width="30%">Material Info</th>
                                                <th>Unit</th>
                                                <th>Price</th>
                                                <th>Total price</th>
                                                <th class="text-center">X</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_output">
                                            @foreach($materials_info as $material)
                                            @php
                                                $total_price = optional($material->MaterialInfo)->price * $material->unit_amount;
                                                $total_cost = $total_cost + $total_price;
                                            @endphp
                                            <tr id="material_row_{{$material->material_id}}">
                                                <td>
                                                    {{optional($material->MaterialInfo)->material_name}}
                                                    <input type="hidden" name="material_id[]" id="material_id_{{$material->material_id}}" value="{{$material->material_id}}">
                                                </td>
                                                <td><input class="form-control qty" type="number" required="" name="quantity[]" oninput="change_quantity()" id="" value="{{$material->unit_amount}}" step="any">{{optional($material->MaterialInfo)->unit_type}}</td>
                                                <td><input class="form-control price" type="number" required="" readonly name="price[]" id="" value="{{optional($material->MaterialInfo)->price}}" step="any"></td>
                                                <td><input class="form-control total" readonly="" type="number" name="total_price[]" id="" value="{{$total_price}}" step="any"></td>
                                                <td><button type="button" onclick="delete_product({{$material->material_id}})" class="mt-2 btn btn-danger btn-sm">X</button></td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <label for="">Total Material Cost</label>
                            <input type="text" class="form-control" readonly id="all_total" value="{{$total_cost}}">
                            <input type="hidden" name="product_id" value="{{$product_info->id}}">
                        </div>
                        </div>
                        </div>
                        <div class="shadow rounded p-2">
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="shadow">
                            <div class="form-group shadow rounded p-3">
                                <label for="example-text-input-alt">Search Materials</label>
                                <input type="text" class="form-control" id="material_search_new" placeholder="Search by product name , product cost" name="material_search_new">
                                <div class="row mt-2 p-3" id="member_show_info">

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

</script>

<script>
    // Begin:: members Search for 
    $('#material_search_new').keyup(function () {
        var material_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/create/search/material',
            data: {
                'material_info': material_info
            },
            success: function (data) {
                $('#member_show_info').html(data);
            }
        });
    });
    // End:: doner Search for 
</script>

<script>

function setMember(id, material_name, price, unit_type) {
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
                            <td><input class="form-control qty" type="number" required name="quantity[]" oninput="change_quantity()" id="" value="" step=any> `+unit_type+`</td>
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

function setDonerInfo(title, code) {
    $('#project_name').val(title);
    $('#project_code').val(code);
    $('#modal_close').click();
    success("project Info set Successfully.");
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


