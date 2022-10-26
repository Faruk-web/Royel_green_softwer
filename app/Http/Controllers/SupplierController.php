<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DataTables;
use Illuminate\Support\Facades\Validator;



class SupplierController extends Controller
{
    //supplier create
    public function list_edit($id){
        $suppliers=Supplier::find($id);
        return view('supplier.index',compact('suppliers'));
    }

    //list
    public function list(){
        return view('supplier.list');
    }

       //list of data fach
    public function list_data(Request $request){
        if ($request->ajax()) {
            $data = Supplier::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('supplier.list.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded">Edit</a>';
                })
                
                ->addColumn('supplier_name', function($row){
                    return $row->supplier_name;
                })
                ->addColumn('phone ', function($row){
                    return $row->phone ;
                })
                ->addColumn('balance', function($row){
                    return $row->balance;
                })
                
                ->rawColumns(['action', 'supplier_name', 'phone','balance'])
                ->make(true);
        }
      
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:suppliers',            
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $suppliers = new Supplier;
        $suppliers->supplier_name = $request->supplier_name;
        $suppliers->email = $request->email;
        $suppliers->phone = $request->phone;
        $suppliers->date = Carbon::now();
        $suppliers->note = $request->note;
        $suppliers->created_at = Carbon::now();
        $suppliers->save();
        return Redirect()->back()->with('success', 'New supplier Added.');

    }

    public function list_update(Request $request,$id){

        $suppliers = Supplier::find($id);

        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:suppliers,phone,'.$suppliers->id,
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $suppliers->supplier_name = $request->supplier_name;
        $suppliers->email = $request->email;
        $suppliers->phone = $request->phone;
        $suppliers->date = Carbon::now();
        $suppliers->note = $request->note;
        $suppliers->created_at = Carbon::now();
        $suppliers->update();
        return Redirect()->route('supplier.list')->with('success', 'supplier update Successfully.');

    }

}
