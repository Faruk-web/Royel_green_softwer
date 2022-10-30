<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Invoice | {{$btb_invoice_info->supp_invoice_id}}</title>
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
                            note: {{optional($btb_info)->note}}<br
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
                @foreach($btb_invoice_info->production_to_product_output as $product)
               
                <tr style="text-align: right;">
                    <th scope="row" style="text-align: center;">{{$i}}</th>
                    <td width="350px" style="text-align: left;">{{$product->production_to_product_output->p_name}} {{$variation_name}}</td>
                    <td style="text-align: center;">{{$product->quantity}}
                        {{$product->production_to_product_output->unit_type_name->unit_name}}</td>
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
