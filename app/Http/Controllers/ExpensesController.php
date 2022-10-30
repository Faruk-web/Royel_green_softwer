<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Image;
Use App\Models\Client;
Use App\Models\Attendance_info;
Use App\Models\Business_info;
Use App\Models\Client_payment;
Use App\Models\Expenses;
Use App\Models\Expenses_category;
Use App\Models\Hired_staff;
Use App\Models\Hired_staff_orders;
Use App\Models\Hired_staff_payment;
Use App\Models\Order;
Use App\Models\Sallery_info;
Use App\Models\Sallery_payment;
Use App\Models\Sms_info;
Use App\Models\Staff;
Use App\Models\User;

class ExpensesController extends Controller
{
   //
   public function expence(){
    $categorys= DB::table('expenses_categories')->get();
    return view('expence.expence',compact('categorys'));
}
public function expencelist(){
    return view('expence.expencelist');
}


public function expence_store(Request $request){
   
   $check=Business_info::find(1);
   $balance=$check->balance;
   if($balance >= $request->amount){
    $latest_id=Expenses::latest()->orderBy('id', 'desc')->first();
    if( $latest_id){
       $latest_id=$latest_id->id +1; 
    }else{
         $latest_id=0;
    }
    $invoice= rand(1000, 9999);
    $invoice_number="EX".$invoice . $latest_id;
    $expence=new Expenses;
   
    $expence->invoice_number=$invoice_number;
    // $expence->voucher_number=$request->voucer_number;
    $expence->expenses_category_id=$request->category_id;
     $expence->amount=$request->amount;
    $expence->note=$request->note;
    $expence->date=$request->date;
    $expence->save();
    
      $business_info=Business_info::find(1);
        $business_info->balance -=$request->amount;
        $business_info->save();
    return redirect('/expence/list')->with('success','expence successfully done');
       
   }else{
       return back()->with('error','Balance is over'); 
   }
}


   
public function expenceindex(Request $request){
    
    if ($request->ajax()) {
        $data = Expenses::latest()->get();
        return Datatables::of($data)
        ->addIndexColumn()
    
        ->addColumn('day', function($row){
             
             return date('d-m-Y', strtotime($row->date));
      })
        ->addColumn('category', function($row){
             
             $category=  DB::table('expenses_categories')->where('id',$row->expenses_category_id)->first();
             return optional($category)->title;
      })
        ->addColumn('amount', function($row){
             
            return $row->amount;
      })
    
        ->addColumn('voucher', function($row){
             
            return $row->voucher_number;
      })
        ->addColumn('invoice', function($row){
             
            return $row->invoice_number;
      })
        ->addColumn('note', function($row){
             
            return $row->note;
      })
 
        ->rawColumns(['day','category','amount','voucher','invoice','note'])
                ->make(true);
    }
}

public function category(){
   $categorys= DB::table('expenses_categories')->get();
    return view('expence.category',compact('categorys'));
}
public function categoryedit($id){
   $category= DB::table('expenses_categories')->find($id);
   
    return view('expence.categoryedit',compact('category'));
}

public function categorystore(Request $request){
    $check= $category= DB::table('expenses_categories')->where('title',$request->name)->first();
if($check){
return redirect('/expence/category')->with('error','expence category name already exists');
}else{
      DB::table('expenses_categories')->insert(
[
    'title' => $request->name
]
);
return redirect('/expence/category')->with('success','expence category successfully create');
}
}


public function categoryupdate(Request $request){
  
     $check= $category= DB::table('expenses_categories')->where('title',$request->name)->first();
     if($check){
         if($check->id == $request->id){
             $category= DB::table('expenses_categories')->where('id',$request->id)->update(array(
                             'title'=>$request->name,
));
return redirect('/expence/category')->with('success','expence category Update successfully ');
         }else{
             return back()->with('error','expence category name already exists');
         }
     }else{
         $category= DB::table('expenses_categories')->where('id',$request->id)->update(array(
                             'title'=>$request->name,
));
return redirect('/expence/category')->with('success','expence category Update successfully ');
     }
   
}
}
