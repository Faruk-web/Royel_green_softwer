<?php

namespace App\Http\Controllers;

use App\Models\SellInvoice;
use App\Models\SoldProducts;
use App\Models\Business_info;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\clients;
use Illuminate\Support\Facades\DB;
use DataTables;


class SellInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sell.index');
    }

    public function index_data(Request $request){
        if ($request->ajax()) {
            $data = SellInvoice::orderBy('id', 'desc')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('bills.show', ['invoice_number'=>$row->invioce_number]).'" class="btn btn-info btn-sm btn-rounded">Invoice</a> <a href="'.route('bills.show.chalan', ['invoice_number'=>$row->invioce_number]).'" class="btn btn-success btn-sm btn-rounded">Chalan</a>';
                })
                ->addColumn('client_info', function($row){
                    return optional($row->clientInfo)->name." [".optional($row->clientInfo)->phone." ]";
                })
                ->addColumn('date', function($row){
                    return date('d-m-Y', strtotime($row->date));
                })
                
                ->rawColumns(['action', 'client_info', 'date'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sell.create');
    }

    public function search_client(Request $request)
    {
        $output = '';
        $client_info = $request->client_info;
          $clients = clients::where(function ($query) use ($client_info) {
                                $query->where('name', 'LIKE', '%'. $client_info. '%')
                                    ->orWhere('phone', 'LIKE', '%'. $client_info. '%');
                            })
                            ->get(['name', 'phone', 'id', 'balance']);
          // dd($clients);
          if(!empty($clients)) {
              if(count($clients) > 0) {
                foreach ($clients as $client) {
                    $output.='<tr>
                        <td>'.$client->name.'</td>
                        <td>'.$client->phone.'</td>
                        <td><button type="button" onclick="setClientInfo(\''.$client->id.'\', \''.$client->name.'\', \''.$client->phone.'\')" class="btn btn-primary btn-sm btn-rounded">Select</button></td>
                        </tr>';
                    }
              }
              else {
                $output.='<tr><td colspan="6" class="text-center"><h2>No Result Found</h2></td></tr>';
            }
        }
        return Response($output);
    }

    
    public function search_products(Request $request) {
        $output = '';
        $product_info = $request->product_info;

        $products = DB::table('product_stocks')
                        ->join('products', 'product_stocks.product_id', '=', 'products.id')
                        ->Where('products.product_name', 'like', "%$product_info%")
                        ->select('products.*', 'product_stocks.*')
                        ->get();

          if(!empty($product_info)) {
              if(count($products) > 0) {
                $output .= '<table class="table table-sm table-bordered">
                <thead class="bg-success text-light">
                    <tr>
                        <th width="50%">Product Info</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
                foreach ($products as $product) {
    
                    $output.='<tr>'.
                    '<td>
                        '.$product->product_name.'<br><b>Size: </b>'.$product->size.'<br><b>Class: </b>'.$product->class.'
                    </td>'.
                    '<td>
                        '.$product->stock_quantity.' '.$product->unit_type.' 
                    </td>'.
                    '<td>  
                        <button type="button" onclick="set_product('.$product->product_id.', \''.$product->product_name.'\', \''.$product->price.'\', \''.$product->stock_quantity.'\', \''.$product->unit_type.'\')" class="mt-2 btn btn-success btn-sm btn-block btn-rounded">Select</button></td>'.
                    '</tr>';
                    }
                $output .= '</tbody>
            </table>';
    
    
              }
              else {
                $output.='<div colspan="6" class="text-center"><h2>No Result Found</h2></div>';
            }
        }
        return Response($output);
    }


    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
            $total_invoice = SellInvoice::count('id');
            $update_count = $total_invoice + 1;
            $invoice_number = "S".rand(1000, 9999).$update_count;
            
            if(is_null($request->product_id)) {
                return Redirect()->back()->with('error', 'No Products Found!');
            }

            $total_gross = 0;

            foreach($request->product_id as $key => $item) {

                $product_id = $request->product_id[$key];
                $quantity = $request->quantity[$key];
                $price = $request->price[$key];
                $total_price = $request->total_price[$key];
                
                $products = new SoldProducts;
                $products->product_id = $product_id;
                $products->invioce_number = $invoice_number;
                $products->quantity = $request->quantity[$key];
                $products->price = $price;
                $products->total_price	= $total_price;
                $products->date = $request->date;
                $products->save();

                $check_stock = ProductStock::where('product_id', $product_id)->first();
                $current_stock = $check_stock->stock_quantity - $quantity;
                $check_stock->stock_quantity = $current_stock;
                $check_stock->update();

                $total_gross = $total_gross + $total_price;

            }


            $client_phone = $request->client_phone;
            $client_info = clients::Where('phone', $client_phone)->first();
            if(!is_null($client_info)) {
                $client_id = $client_info->id;
            }
            else {
                $client = new clients;
                $client->name = $request->client_name;
                $client->phone = $request->client_phone;
                $client->balance = 0;
                $client->save();
                $client_id = $client->id;
            }

            $sell_invoice = new SellInvoice;
            $sell_invoice->invioce_number = $invoice_number;
            $sell_invoice->voucher_number = $request->voucher_number;
            $sell_invoice->client_id = $client_id;
            $sell_invoice->paid = $request->paid;
            $sell_invoice->pvs = $request->pvs;
            $sell_invoice->gate_pass_number = $request->gate_pass_number;
            $sell_invoice->place_details = $request->place_details;
            $sell_invoice->total_gross = $total_gross;
            $sell_invoice->date = $request->date;
            $sell_invoice->note = $request->note;
            $sell_invoice->save();

            if($request->paid > 0) {
                $balance_info = Business_info::find(1);
                $current_balance = $balance_info->balance;
                $balance_info->balance = $current_balance + $request->paid;
                $balance_info->update();
            }
            
            return Redirect()->route('sell.index')->with('success','New Bill Prepared.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellInvoice  $sellInvoice
     * @return \Illuminate\Http\Response
     */
    public function show($invoice_number)
    {
        $business_info = DB::table('business_infos')->first();
        $btb_invoice_info = SellInvoice::where('invioce_number', $invoice_number)->first();
        if($btb_invoice_info) {
            return view('sell.view_invoice', compact('business_info', 'btb_invoice_info'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
        
    }

    public function show_chalan($invoice_number)
    {
        $business_info = DB::table('business_infos')->first();
        $btb_invoice_info = SellInvoice::where('invioce_number', $invoice_number)->first();
        if($btb_invoice_info) {
            return view('sell.view_chalan', compact('business_info', 'btb_invoice_info'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
        
    }

    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellInvoice  $sellInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(SellInvoice $sellInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellInvoice  $sellInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellInvoice $sellInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellInvoice  $sellInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellInvoice $sellInvoice)
    {
        //
    }
}
