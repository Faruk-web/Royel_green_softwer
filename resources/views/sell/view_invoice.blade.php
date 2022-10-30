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
                                            <img src="{{asset(optional($business_info)->logo)}}" alt="Company Logo">
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
                                                    Client Name: {{optional($btb_info->clientInfo)->name}}<br>
                                                    Client Phone: {{optional($btb_info->clientInfo)->phone}}
                                                </p>
                                            </div>
                                        </th>
                                        <th style="text-align: right; border: 0px solid white;">
                                            <p class="invoiceIDandDate" style="font-family: Arial;">
                                                Bill / Sell Invoice<br>
                                                Invoice: {{optional($btb_info)->invioce_number}}<br>
                                                Date: {{date('d M, Y', strtotime(optional($btb_invoice_info)->date))}}<br>
                                                <b>PVS</b>: {{optional($btb_info)->pvs}}<br>
                                                <b>Gate Pass Number:</b> {{optional($btb_info)->gate_pass_number}}
                                            </p>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                            
                            <div>
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr style="text-align: right; background-color: #dddddd;">
                                            <th scope="col" width="5%" style="text-align: center;">SN</th>
                                            <th width="50px" style="text-align: left;">Product Info</th>
                                            <th scope="col" style="text-align: center;">Qty</th>
                                            <th scope="col" style="text-align: center;">Price</th>
                                            <th scope="col" style="text-align: center;">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @foreach($btb_invoice_info->sold_products as $product)
                                        @php( $product_info = optional($product->productInfo) )
                                        <tr style="text-align: right;">
                                            <th scope="row" style="text-align: center;">{{$i}}</th>
                                            <td width="350px" style="text-align: left;">{{$product_info->product_name }}<br><b>Class: </b>{{$product_info->class }}<br><b>Size: </b>{{$product_info->size }}</td>
                                            <td style="text-align: center;">{{$product->quantity}} {{$product_info->unit_type }}</td>
                                            <td style="text-align: center;">{{$product->price}}</td>
                                            <td style="text-align: center;">{{$product->total_price}}</td>
                                        </tr>
                                        @php($i += 1)
                                        @endforeach
                                        <tr>
                                            <td colspan="4" class="text-right"  style="border-left: 1px solid #ffffff !important; border-bottom: 1px solid #ffffff !important;"><h4 class="mb-0"><b>Total</b></h4></td>
                                            <td class="text-center">{{number_format(optional($btb_info)->total_gross, 2)}} TK</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right" style="border-left: 1px solid #ffffff !important; border-bottom: 1px solid #ffffff !important;"><h4 class="mb-0"><b>Paid</b></h4></td>
                                            <td class="text-center">{{number_format(optional($btb_info)->paid, 2)}} TK</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div>
                                <p><b>Place Details:</b></p>
                                {!!optional($btb_invoice_info)->place_details!!}
                            </div>
                            <div>
                                <p><b>Note:</b></p>
                                {{optional($btb_invoice_info)->note}}
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

    const $btnPrint = document.querySelector("#btnPrint");
    $btnPrint.addEventListener("click", () => {
        window.print();
    });

</script>

@endsection


