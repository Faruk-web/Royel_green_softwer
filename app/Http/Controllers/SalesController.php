<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;
Use App\Models\Business_info;
use App\Models\Customer;
Use App\Models\Sales;
use Image;
Use App\Models\Sales_item;
class SalesController extends Controller
{
    public function balanceindex(){
             $balance = DB::table('business_infos')->first();
        $balance=number_format($balance->balance, 2);
           $banks = DB::table('banklists')->get();
        
           $output='';
                $output .= '
                <div class="col-md-12"><div class="media d-flex align-items-center push shadow rounded p-3">
                 <div class="mr-3"><a class="item item-rounded bg-success" href="javascript:void(0)">
                    <i class="fas fa-coins fa-2x text-white-75"></i></a></div><div class="media-body">
                     <div class="font-w600">Cash Balance</div>
                    <div>'.$balance.' tk</div>
                     </div>
                     </div>
                     </div>
                        <div class="col-md-12">
                        <div class="shadow rounded p-1">
                            <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr class="bg-dark text-light text-center">
                                        <th colspan="2" align="center">Bank Balance</th>
                                        </tr>
                                    </thead>
                            <tbody>';
                            foreach ($banks as $item) {
                                
                                $output.='<tr>'.
                                
                                    '<td>'.$item->name.'</td>'.
                                    '<td>'.number_format("$item->total_amount",2).'</td>'.
                                    
                                    '</tr>';
                                }
                            $output .= '</tbody>
                        </table></div></div>
           ';
       return Response($output);
    }
}
