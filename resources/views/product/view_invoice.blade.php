{{--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Invoice</title>
</head>
<style>
    @page {
        header: page-header;
        footer: page-footer;
        margin-top: 30mm;


    }
    body {
        font-family: 'examplefont', nikosh;
    }

    li {
        list-style: none;
        float: left;
        overflow: hidden;
    }

    p {
        font-size: 13px;
    }

    .customar_info {
        width: 100%;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid black;
        text-align: left;
        padding: 5px;
        font-size: 13px;
    }

    .invoiceIDandDate {
        text-align: right;

    }

    .clientInfo {
        background-color: red;
    }

</style>

<body>
    <htmlpageheader name="page-header">
        <div>
            <table style="margin-top: 10px;">
            <tr>
                <td style="border: 0px solid white;">
                    <div>
                        <img src="{{asset(optional($shop_info)->shop_logo)}}" alt="">
                    </div>
                </td>
                <td style="text-align: right; border: 0px solid white;">
                    <div>
                    <p style="font-size: 13px; text-align: right; overflow: hidden;"><span style="font-size: 15px; font-weight: bold;">
                        {{$shop_info->name}}</span><br>
                            {!!$shop_info->website!!}<br>
                            {{$shop_info->phone}}, </b><br>
                            {{$shop_info->email}}<br>
                        </p>
                        </div>
                </td>
            </tr>
        </table>
        
            <hr style="border: 1px solid #81d4fa;">
        </div>
    </htmlpageheader>

    <htmlpagefooter name="page-footer">
        <table width="100%">
            <tr>
                <td width="5%" align="center" style="border: 0px solid white;">{PAGENO}/{nbpg}</td>
                <td width="90%" style="text-align: center; border: 0px solid white;">
                    <p style="font-size: 13px; text-align: center; font-family: Arial;">This Software Created by <b>FARA
                            IT Fusion</b>(www.faraitfusion.com)</p>
                </td>
                <td width="5%" style="text-align: right; border: 0px solid white;"></td>
            </tr>
        </table>
    </htmlpagefooter>
    @php($btb_info = $btb_invoice_info)
    <div>
        <table>
            <tr>
                <th style="border: 0px solid white;">
                    <div>
                        <p>
                            invioce_number: {{$btb_info->invioce_number}}<br>
                            total_cost: {{optional($btb_info)->total_cost}}<br>
                            status: {{optional($btb_info)->status}}<br>
                            note: {{optional($btb_info)->note}}<br>
                            date : {{optional($btb_info)->date}}<br>
                           
                        </p>
                    </div>
                </th>
                <th style="text-align: right; border: 0px solid white;">
                    <p class="invoiceIDandDate" style="font-family: Arial;">Invoice #
                        {{str_replace("_","/", $btb_invoice_info->supp_invoice_id)}}<br>Supplier
                        Voucher Num. {{optional($btb_invoice_info)->supp_voucher_num}}<br>Date:
                        {{date('d M, Y', strtotime(optional($btb_invoice_info)->date))}}</p>
                </th>
            </tr>
        </table>
    </div>
    <br />

    <div>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr style="text-align: right; background-color: #dddddd;">
                    <th scope="col" style="text-align: center;">SN</th>
                    <th width="50px" style="text-align: left;">Product Name</th>
                    <th scope="col" style="text-align: center;">Qty</th>
                </tr>
            </thead>
            <tbody>
            @php($i = 1)
                @foreach($btb_invoice_info->production_materials as $product)
                <tr style="text-align: right;">
                    <th scope="row" style="text-align: center;">{{$i}}</th>
                    <td width="350px" style="text-align: left;">{{$product->material_name }} </td>
                    <td style="text-align: center;">{{$product->quantity}}
                    </td>
                </tr>
                @php($i += 1)
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div>
        <p><b>Note:</b></p>
        {{optional($btb_invoice_info)->note}}
    </div>
</body>
</html>
--}}

@extends('layouts.app')
@section('body_content')
<style>
    li {
        list-style: none;
        float: left;
        overflow: hidden;
    }

    p {
        font-size: 15px;
    }

    .customar_info {
        width: 100%;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid black;
        text-align: left;
        padding: 5px;
        font-size: 13px;
    }

    .invoiceIDandDate {
        text-align: right;

    }

    .clientInfo {
        background-color: red;
    }

    @media  print {
        .hidden-print,
        .hidden-print * {
            display: none !important;
        }
    }

</style>
<div class="content">

    <div class="row">
        <div class="col-md-8"><h4></h4></div>
        <div class="col-md-2"></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('purchase.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12 p-1">
                        <div class="rounded p-1 mb-4 px-3">
                            <div>
                                <table style="margin-top: 10px; border-bottom: 2px solid #0c0d0e;">
                                <tr>
                                    <td style="border: 0px solid white;">
                                        <div>
                                            <img width="200px" src="{{asset(optional($business_info)->logo)}}" alt="Company Logo">
                                        </div>
                                    </td>
                                    <td style="text-align: right; border: 0px solid white;">
                                        <div>
                                            <p style="font-size: 13px; text-align: right; overflow: hidden;"><span style="font-size: 15px; font-weight: bold;">
                                            {{$business_info->name}}</span><br>
                                            {!!$business_info->website!!}<br>
                                            {{$business_info->phone}}, </b><br>
                                            {{$business_info->email}}<br>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            @php($btb_info = $btb_invoice_info)
                            <div>
                                <table>
                                    <tr>
                                        <th style="border: 0px solid white;">
                                            <div>
                                                <p>
                                                    <b>Status: </b> {{optional($btb_info)->status}}
                                                </p>
                                            </div>
                                        </th>
                                        <th style="text-align: right; border: 0px solid white;">
                                            <p class="invoiceIDandDate" style="font-family: Arial;">Production Invoice<br>Invoice: {{optional($btb_info)->invioce_number}}<br>
                                                Date: {{date('d M, Y', strtotime(optional($btb_invoice_info)->date))}}</p>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                            
                            <div>
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr style="text-align: right; background-color: #dddddd;">
                                            <th scope="col" width="5%" style="text-align: center;">SN</th>
                                            <th width="50px" style="text-align: left;">Material Name</th>
                                            <th scope="col" style="text-align: center;">Qty</th>
                                            <th scope="col" style="text-align: center;">Price</th>
                                            <th scope="col" style="text-align: center;">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @foreach($btb_invoice_info->production_materials as $material)
                                        <tr style="text-align: right;">
                                            <th scope="row" style="text-align: center;">{{$i}}</th>
                                            <td width="350px" style="text-align: left;">{{optional($material->MaterialInfo)->material_name }}</td>
                                            <td style="text-align: center;">{{$material->quantity}} {{optional($material->MaterialInfo)->unit_type }}</td>
                                            <td style="text-align: center;">{{$material->price}}</td>
                                            <td style="text-align: center;">{{$material->total_price}}</td>
                                        </tr>
                                        @php($i += 1)
                                        @endforeach
                                        <tr>
                                            <td colspan="4" class="text-right"><h4 class="mb-0"><b>Total</b></h4></td>
                                            <td class="text-center">{{number_format(optional($btb_info)->total_cost, 2)}} TK</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div>
                                <p><b>Note:</b></p>
                                {{optional($btb_invoice_info)->note}}
                            </div>
                            </div>
                            <div class="mt-4">
                                <div class="shadow rounded border p-2">
                                    <h4 class="mb-2">Made Products <span class="text-primary">for Invoice: {{$btb_invoice_info->invioce_number}}</span> </h4>
                                    @if(count($btb_invoice_info->production_to_product_output) > 0)
                                        <table class="table table-bordered">
                                            <thead class="bg-dark text-light">
                                            <tr>
                                                <th width="60%">Product Name</th>
                                                <th>QTY</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($btb_invoice_info->production_to_product_output as $made_product)
                                                <tr>
                                                    <td>{{$made_product->ProductInfo->product_name}}</td>
                                                    <td>{{$made_product->quantity}} {{$made_product->ProductInfo->unit_type}}</td>
                                                    <td>{{date('d-m-Y', strtotime($made_product->date))}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <h2 class="text-center"><b>No Products Made Before</b></h2>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                        <div class="row hidden-print">
                            <div class="col-md-9"></div>
                            <div class="p-2 rounded col-md-3">
                                <button type="button" id="btnPrint" class="btn btn-primary btn-lg btn-block btn-rounded">Print</button>
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
    // Begin:: doner Search for 
    $('#doner_search').keyup(function () {
        var project_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/purchase/invoice/search-project',
            data: {
                'project_info': project_info
            },
            success: function (data) {
                $('#doner_show_info').html(data);
            }
        });
    });
    // End:: doner Search for
</script>

<script>

    const $btnPrint = document.querySelector("#btnPrint");
    $btnPrint.addEventListener("click", () => {
        window.print();
    });

</script>

@endsection


