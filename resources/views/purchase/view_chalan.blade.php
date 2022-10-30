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
                                                    Supplier Name: {{optional($btb_info->senderSupplierInfo)->supplier_name}}<br>
                                                    Supplier Phone: {{optional($btb_info->senderSupplierInfo)->phone}}
                                                </p>
                                            </div>
                                        </th>
                                        <th style="text-align: right; border: 0px solid white;">
                                            <p class="invoiceIDandDate" style="font-family: Arial;">Raw Material Purchase Invoice<br>Invoice: {{optional($btb_info)->invioce_number}}<br>
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
                                            <th width="70%" style="text-align: left;">Material Name</th>
                                            <th scope="col" style="text-align: center;">Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @foreach($btb_invoice_info->purchase_materials as $material)
                                        <tr style="text-align: right;">
                                            <th scope="row" style="text-align: center;">{{$i}}</th>
                                            <td width="350px" style="text-align: left;">{{optional($material->MaterialInfo)->material_name }}</td>
                                            <td style="text-align: center;">{{$material->quantity}} {{optional($material->MaterialInfo)->unit_type }}</td>
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


