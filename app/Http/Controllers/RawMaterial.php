<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\User;
use App\Models\RawMaterialStock;
use DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
class RawMaterial extends Controller
{
    //raw material
    public function rawmateriallistedit($id){
        $materials=Material::find($id);
        return view('material.index',compact('materials'));
    }

     //rawmaterial_update
     public function rawmaterial_update(Request $request, $id)
    {
        $material =Material::find($id);

        $validator = Validator::make($request->all(), [
            'material_name' => 'required|unique:materials,material_name,'.$material->id,
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $material->material_name = $request->material_name;
        $material->unit_type = $request->unit_type;
        $material->price = $request->price;
        $material->note = $request->note;
        $material->created_at = Carbon::now();
        $material->update();
        
        return redirect()->route('raw.material.list')->with('success','Material Updated Successfully');
    }

    
    //rawmateriallist
     public function rawmateriallist(){
        return view('material.list');
    }

    //list
    public function rawmaterial_data(Request $request){
        if ($request->ajax()) {
            $data = Material::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('raw.material.list.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded" >Edit</a>';
                })
                
                ->addColumn('material_name', function($row){
                    return $row->material_name;
                })
                ->addColumn('unit_type', function($row){
                    return $row->unit_type;
                })
                ->addColumn('price', function($row){
                    return $row->price;
                })
                
                ->rawColumns(['action', 'material_name', 'unit_type','price'])
                ->make(true);
        }
      
    }

    public function rawmaterialstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'material_name' => 'required|unique:materials',            
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $material = new Material;
        $material->material_name = $request->material_name;
        $material->unit_type = $request->unit_type;
        $material->price = $request->price;
        $material->note = $request->note;
        $material->created_at = Carbon::now();
        $material->save();
        return Redirect()->back()->with('success', 'New material Added.');

    }

    //materialstock
    public function materialstock(){
        return view('material.stock');
    }


    //list
    public function materialstockdata(Request $request){
    if ($request->ajax()) {
        $data = RawMaterialStock::orderBy('id', 'desc')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('material_name', function($row){
                return optional($row->MaterialInfo)->material_name;
            })
            ->addColumn('stock_quantity', function($row){
                return $row->stock_quantity." ".optional($row->MaterialInfo)->unit_type;
            })
            ->rawColumns(['material_name', 'stock_quantity'])
            ->make(true);
    }
    
}





}
