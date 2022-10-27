<?php

namespace App\Http\Controllers;
use App\Models\ProductInvoice;
use App\Models\RawMaterialStock;
use App\Models\Material;
use App\Models\ProductionMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DataTables;
use Illuminate\Support\Facades\DB;


class ProductionToProductController extends Controller
{
    //invoice create
    public function production_invoices(){
        return view('invoice.create');
    }
    //invoice create
    public function invoicelistedit($id){
       $invoices_info=ProductInvoice::find($id);
        return view('invoice.list',compact('invoices_info'));
    }
    //invoicestore

    public function invoicestore(Request $request){
        // dd($request);
        $product_invoice = new ProductInvoice;
        $total_products = ProductInvoice::count('id');
        $invioce_number = 'P121'.($total_products+1);
        $product_invoice->invioce_number = $invioce_number;
        $product_invoice->date = $request->date;
        $product_invoice->note = $request->note;
        $product_invoice->total_cost = $request->total_cost;
        $product_invoice->status = $request->status;
        $product_invoice->date = Carbon::now();
        $product_invoice->created_at = Carbon::now();
        $product_invoice->save();
        return Redirect()->back()->with('success', 'New product invoice Added');
    }

    //invoicelistdata
    public function invoicelistdata(Request $request){
        if ($request->ajax()) {
            $data = ProductInvoice::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('invoice.list.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded">edit</a>';
                })
                
                ->addColumn('date', function($row){
                    return date("d-m-Y", strtotime($row->date));
                })
                ->addColumn('total_cost', function($row){
                    return $row->total_cost;
                })
                ->addColumn('status', function($row){
                    return $row->status;
                })
                
                ->rawColumns(['action', 'date', 'total_cost','status'])
                ->make(true);
            }
       }
       //production_material
       public function production_material(){
        return view('invoice.production_material_create');
    }
     //search project end
     public function search_doner(Request $request) {
        $output = '';
        $doner_info = $request->doner_info;
          $doners = RawMaterialStock::where(function ($query) use ($doner_info){
                                $query->where('material_id', 'LIKE', '%'. $doner_info. '%')
                                    ->orWhere('stock_quantity', 'LIKE', '%'. $doner_info. '%');
                            })
                            ->get(['stock_quantity', 'material_id', 'id']);

          if(!empty($doner_info)) {
              if(count($doners) > 0) {
                foreach ($doners as $doner) {
                    $output.='<tr>
                        <td>'.$doner->stock_quantity.'</td>
                        <td>'.$doner->material_id.'</td>
                        <td><button type="button" onclick="setDonerInfo(\''.$doner->stock_quantity.'\', \''.$doner->material_id.'\')" class="btn btn-primary btn-sm btn-rounded">Select</button></td>
                        </tr>';
                    }
              }
              else {
                $output.='<tr><td colspan="6" class="text-center"><h2>No Result Found</h2></td></tr>';
            }
        }
        return Response($output);
    }
    // search_member
    public function search_member(Request $request) {
        $output = '';
        $member_info = $request->member_info;
          $members = ProductInvoice::where(function ($query) use ($member_info) {
                                $query->where('invioce_number', 'LIKE', '%'. $member_info. '%')
                                    ->orWhere('total_cost', 'LIKE', '%'. $member_info. '%');
                            })
                            ->limit(10)
                            ->get(['total_cost', 'invioce_number', 'id']);
         // dd($members);
          if(!empty($member_info)) {
              if(count($members) > 0) {
                foreach ($members as $member) {
                    $output.='<div class="col-md-12 p-1">
                                <div class="shadow row rounded border">
                                    <div class="col-md-12 p-2">
                                        <h5 class="m-0">'.$member->total_cost.'</h5>
                                        <span>'.$member->invioce_number.'</span><br>
                                        <button type="button" onclick="setMember('.$member->id.', \''.$member->total_cost.'\', \''.$member->invioce_number.'\')" class="mt-2 btn btn-success btn-sm btn-block btn-rounded">Select</button>
                                    </div>
                                </div>
                            </div>';
                    }
              }
              else {
                $output.='<div colspan="6" class="text-center"><h2>No Result Found</h2></div>';
            }
        }
        return Response($output);
    }

    public function production_material_store(Request $request)
    {  
        
        if(is_null($request->material_id)) {
            return Redirect()->back()->with('error', 'No Materials Found!');
        }

        $total_invoice = ProductInvoice::count('id');
        $update_count = $total_invoice + 1;
        $invoice_number = "P".rand(1000, 9999).$update_count;
        $total_cost = 0;

        foreach($request->material_id as $key => $item) {

            $quantity = $request->quantity[$key];
            $material_id = $request->material_id[$key];
            $price = $request->price[$key];
            
            $check_raw_materials_stock =RawMaterialStock::where('material_id', $material_id)->first();
        
            $db_stock = $check_raw_materials_stock->stock_quantity;
            
            if($db_stock >= $quantity) {

                $total_price = $quantity * $price;
                $production_materials = new ProductionMaterial;
                $production_materials->raw_material_id = $material_id;
                $production_materials->invioce_number = $invoice_number ;
                $production_materials->quantity = $quantity; 
                $production_materials->price = $price;
                $production_materials->total_price = $total_price;  
                $production_materials->date = $request->date; 
                $production_materials->save();

                $total_cost = $total_cost + $total_price;

                $rests_qty = $db_stock - $quantity;
                if($rests_qty == 0) {
                    $check_raw_materials_stock->delete();
                }
                else {
                    $check_raw_materials_stock->stock_quantity = $rests_qty;
                    $check_raw_materials_stock->update();
                }
            }
            
        }

        $product_invoice = new ProductInvoice;
        $product_invoice->invioce_number = $invoice_number;
        $product_invoice->date = $request->date;
        $product_invoice->note = $request->note;
        $product_invoice->total_cost = $total_cost;
        $product_invoice->status ='processing';
        $product_invoice->created_at = Carbon::now();
        $product_invoice->save();

           
        return Redirect()->route('production.invoices')->with('success', 'Production Info Added Successfully.');
     
    }
    // ==============================================================

    public function search_materials_for_production(Request $request) {
        $output = '';
        $material_info = $request->material_info;

        $materials = DB::table('raw_material_stocks')
                        ->join('materials', 'raw_material_stocks.material_id', '=', 'materials.id')
                        ->select('materials.*', 'raw_material_stocks.*')
                        ->get();

          if(!empty($material_info)) {
              if(count($materials) > 0) {
                $output .= '<table class="table table-sm table-bordered">
                <thead class="bg-success text-light">
                    <tr>
                        <th width="50%">Material Name</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
                foreach ($materials as $product) {
    
                    $output.='<tr>'.
                    '<td>
                        '.$product->material_name.'
                    </td>'.
                    '<td>
                        '.$product->stock_quantity.' '.$product->unit_type.' 
                    </td>'.
                    '<td>  
                        <button type="button" onclick="set_materials('.$product->material_id.', \''.$product->material_name.'\', \''.$product->price.'\', \''.$product->stock_quantity.'\', \''.$product->unit_type.'\')" class="mt-2 btn btn-success btn-sm btn-block btn-rounded">Select</button></td>'.
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


    public function make_production(){
        return view('production.make_production');
    }

    public function productionmateriallist(){
        return view('invoice.production_materiak_list');
    }

    //production_material_data
    public function production_material_data(Request $request){
        if ($request->ajax()) {
            $data = ProductionMaterial::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('raw.material.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded">Edit</a> <a type="button" target="_blank"  class="btn btn-success btn-sm btn-rounded">View</a>';
                })
                ->addColumn('raw_material_id', function($row){
                    return optional($row->MaterialInfo)->material_name;
                })
                ->addColumn('invioce_number', function($row){
                    return $row->invioce_number;
                })
                ->addColumn('quantity', function($row){
                    return $row->quantity;
                })
                ->addColumn('price', function($row){
                    return $row->price;
                })
                ->addColumn('total_price', function($row){
                    return $row->total_price;
                })
                
                ->rawColumns(['action', 'raw_material_id', 'invioce_number','quantity','price','total_price'])
                ->make(true);
        }
    }
    


}
