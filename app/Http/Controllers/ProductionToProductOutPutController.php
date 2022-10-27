<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Material;
use App\Models\ProductStock;
use App\Models\ProductInvoice;
use App\Models\ProductionToProductOutput;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DataTables;
class ProductionToProductOutPutController extends Controller
{
    
    //productiontoproduct 
    public function productiontoproduct(){
        return view('production.index');
    }

    // ==============================================================
    //search Product
    public function productsearch_for_production_to_product_output(Request $request) {
        $output = '';
        $product_info = $request->product_info;
          $products = Product::where(function ($query) use ($product_info) {
                                $query->where('product_name', 'LIKE', '%'. $product_info. '%');
    
                            })
                            ->limit(10)
                            ->get(['product_name', 'unit_type', 'id', 'size']);
    
          if(!empty($product_info)) {
              if(count($products) > 0) {
                $output .= '<table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th scope="col">product_name</th>
                        <th scope="col">Size</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
                foreach ($products as $product) {
    
                    $output.='<tr>'.
                    '<td>
                        '.$product->product_name.'
                    </td>'.
                    '<td>
                        '.$product->size.'
                    </td>'.
                    '<td>  
                        <button type="button" onclick="setMember('.$product->id.', \''.$product->product_name.'\', \''.$product->unit_type.'\')" class="mt-2 btn btn-success btn-sm btn-block btn-rounded">Select</button></td>'.
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
    
    //search raw material
    public function rawmaterialsearch(Request $request) {
        $output = '';
        $product_info = $request->product_info;
          $products = Material::where(function ($query) use ($product_info) {
                                $query->where('material_name', 'LIKE', '%'. $product_info. '%');
    
                            })
                            ->limit(10)
                            ->get(['material_name', 'unit_type','price', 'id']);
    
          if(!empty($product_info)) {
              if(count($products) > 0) {
                $output .= '<table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th scope="col">material_name</th>
                        <th scope="col">price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
                foreach ($products as $product) {
    
                    $output.='<tr>'.
                    '<td>
                 ' .$product->material_name.'
                    </td>'.
                //     '<td>
    
                //  ' .$product->unit_type.'
                //     </td>'.
                    '<td>
    
                 ' .$product->price.'
                    </td>'.
                    '<td>  <button type="button" onclick="setMember('.$product->id.', \''.$product->material_name.'\', \''.$product->unit_type.'\',\''.$product->price.'\')" class="mt-2 btn btn-success btn-sm btn-block btn-rounded">Select</button></td>'.
    
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
        //first resulation details end
        public function productiontoproductstore(Request $request){
            // dd($request);
            //$product_id=Product::Where('product_name',$request->product_id)->first();

            if(is_null($request->product_id)) {
                return Redirect()->back()->with('error', 'No Products Found!');
            }

            $invoice_number = $request->invoice_number;

            foreach($request->product_id as $key => $item) {
                $product_id = $request->product_id[$key];
                $quantity = $request->quantity[$key];

                $product_output = new ProductionToProductOutput;
                // $purchase_material->product_id	=$request->product_id[$key];
                $product_output->invioce_number = $invoice_number;
                $product_output->quantity = $quantity;
                $product_output->product_cost = 0;
                $product_output->total_production = 0;
                $product_output->date = $request->date;
                $product_output->product_id = $product_id;
                $product_output->save();

                $check_product_stock = ProductStock::where('product_id', $product_id)->first();
                
                if(!is_null($check_product_stock)) {
                    $updated_stock = (($check_product_stock->stock_quantity) + 0) + $quantity;
                    $check_product_stock->stock_quantity = $updated_stock;
                    $check_product_stock->update();
                }
                else {
                    $product_stock =  new ProductStock;
                    $product_stock->product_id = $product_id;
                    $product_stock->stock_quantity = $quantity;
                    $product_stock->date = Carbon::now();
                }
            }

        return back()->with('success', 'Production to product added.');

    }
        //productiontoproductlist
        public function productiontoproductlist(){
            return view('production.list');
        }
        //production_material_data
    public function productiontoproductdata(Request $request){
        if ($request->ajax()) {
            $data = ProductionToProductOutput::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('raw.material.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded">Edit</a> <a type="button" target="_blank"  class="btn btn-success btn-sm btn-rounded">View</a>';
                })
                ->addColumn('product_id', function($row){
                    return optional($row->ProductInfo)->product_name;
                })
                ->addColumn('invioce_number', function($row){
                    return $row->invioce_number;
                })
                ->addColumn('quantity', function($row){
                    return $row->quantity;
                })
                ->addColumn('product_cost', function($row){
                    return $row->product_cost;
                })
                ->addColumn('total_production', function($row){
                    return $row->total_production;
                })
                
                ->rawColumns(['action', 'product_id', 'invioce_number','quantity','product_cost','total_production'])
                ->make(true);
        }
    }

    //productstock
    public function productstock(){
        return view('production.stock');
    }
    public function productstockdata(Request $request){
        if ($request->ajax()) {
            $data = ProductStock::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('raw.material.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded">Edit</a> <a type="button" target="_blank"  class="btn btn-success btn-sm btn-rounded">View</a>';
                })
                ->addColumn('product_id', function($row){
                    return optional($row->ProductInfo)->product_name;
                })
                ->addColumn('unit_type', function($row){
                    return optional($row->ProductInfo)->unit_type;
                })
                ->addColumn('size', function($row){
                    return optional($row->ProductInfo)->size;
                })
                ->addColumn('stock_quantity', function($row){
                    return $row->stock_quantity;
                })
                
                ->rawColumns(['action', 'product_id', 'stock_quantity','unit_type','size'])
                ->make(true);
        }
    }
}
