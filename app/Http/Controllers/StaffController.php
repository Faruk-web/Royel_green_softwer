<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Client;
use App\Models\Attendance_info;
use App\Models\Business_info;
use App\Models\Client_payment;
use App\Models\Expenses;
use App\Models\Expenses_category;
use App\Models\Hired_staff;
use App\Models\Hired_staff_orders;
use App\Models\Hired_staff_payment;
use App\Models\Order;
use App\Models\Sallery_info;
use App\Models\Sallery_payment;
use App\Models\Sms_info;
use App\Models\Staff;
use App\Models\User;
use Carbon\Carbon;
use App\Models\StaffInOutDetails;
use App\Models\StaffInOutLog;

class StaffController extends Controller
{
    public function addstaff(){
        return view('staff.add_staff');
    }
    
    public function staffstore(Request $request){
        
        $staff=new Staff;
        $staff->name=$request->name;
        $staff->phone=$request->phone;
        $staff->address=$request->address;
        $staff->sallery=$request->sallery;
        $staff->date=$request->date;
        $staff->note=$request->note;
        $staff->save();

        return redirect('/staff/list')->with('success','New Staff Added.');
    }
    
    public function stafflist(){
        return view('staff.stafflist');
    }
    
    public function stafflistindex(Request $request)
    {
         if ($request->ajax()) {
        $data = Staff::all();
        return Datatables::of($data)
        ->addIndexColumn()
            ->addColumn('action', function($row){
                $info = '';
               
                        $info .= '<a style="margin-right:5px;" href="'.route('staff.edit', $row->id).'" class="edit btn btn-primary btn-sm editProduct"">Edit</a>';   
                        // $info .= '<a type="button"  class="btn btn-success btn-sm" ><i class="fas fa-eye"></i></a> ';   
                return $info;
            })
            ->addColumn('name', function($row){
                 
                  return optional($row)->name;
            })
            ->addColumn('phone', function($row){
                 
                return optional($row)->phone;
            })
            ->addColumn('address', function($row){
                 
                return optional($row)->address;
            })
            ->addColumn('sallery', function($row){
                 
                return optional($row)->sallery .''.' tk';
            })
           
           
            ->rawColumns(['action','name', 'phone','address','sallery'])
                    ->make(true);
    }  
    }
    
      public function staffedit($id){
      $staff=Staff::find($id);
      return view('staff.staffedit',compact('staff'));
  }
  

   public function staffupdate(Request $request){
      
      
       $checkphone=Staff::where('phone',$request->phone)->first();
         if( $checkphone == null){
              $staff = Staff::find($request->c_id);
        $staff->name=$request->name;
        $staff->phone=$request->phone;
        $staff->sallery=$request->sallery;
        $staff->address=$request->address;
        $staff->save();
         return redirect('/staff/list')->with('success','update successfully');
               }
        elseif($checkphone){
             if($checkphone->id == $request->c_id){
                  $staff = Staff::find($request->c_id);
        $staff->name=$request->name;
        $staff->phone=$request->phone;
        $staff->sallery=$request->sallery;
        $staff->address=$request->address;
        $staff->save();
        return redirect('/staff/list')->with('success','update successfully');
            
             }
             else{
                 
                   
                 return back()->with('error', 'Phone number already exits'); 
             }
        }
    }
    
    public function payment(){
        return view('pages.staff.payment');
        }
        public function paymenthistory(){
    return view('pages.staff.payment_history');
}

public function staffsearch(Request $request){

      $info = $request->info;
        $output = '';
        
        if(!empty($info)) {
             
            $info =Staff::where(function ($query) use ($info) {
                                $query->where('name', "like", "%" .$info. "%")
                                        ->orWhere('phone', "like", "%" .$info. "%");
                            })
                            ->limit(15)
                            ->get();
    
    
            if(count($info) > 0) {
                $output .= '<table width="100%" class="table table-bordered table-bootstrap">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <th >Name</th>
                                        <th >Phone</th>
                                        <th >Action</th>
                                      
                                    </tr>  
                                </thead>
                                <tbody>';
                                foreach ($info as $item) {
                                    
                                    $output.='<tr>
                                                <td>'.$item->name.'</td>
                                                <td>'.$item->phone.'</td>
                                                <td><button type="button" onclick="add_order_data(\''.$item->id.'\',\''.$item->name.'\',\''.$item->phone.'\',\''.$item->sallery.'\')" class="btn btn-primary btn-sm btn-rounded">Select</button></td>
                                            </tr>';
                                    
                                    }
                                $output .= '</tbody>
                            </table>';
            }
            else {
                $output.='<h2 class="text-center">No Result Found</h2>';
                 }
        }
        return Response($output);

    }
    
    public function monthsearch(Request $request){
       $day=now();
       $month=$request->month;
       $staff=$request->staffid;
       $count=Attendance_info::where('staff_id',$staff)->whereMonth('in_time',$month)->whereYear('in_time', Carbon::now()->format('Y'))->sum('count');
       $sallery=Sallery_info::where('staff_id',$staff)->where('month_name',$month)->whereYear('created_at', Carbon::now()->format('Y'))->first();
       
       if($sallery){
            $paid=Sallery_info::where('staff_id',$staff)->where('month_name',$month)->whereYear('created_at', Carbon::now()->format('Y'))->sum('paid');
           $paid=$paid;
           $due=$sallery->due;
       }else{
             $staffs=Staff::find($staff);
              $paid=0;
              $due=$staffs->sallery;
       }
         return response()->json([
           
            'attendance' => $count,
            'paid' => $paid,
            'sdue' => $due,
            'month_name' => $month,
            's_id' => $staff,
           
           
        ]);
    }
    
    public function pay(Request $request){
       $check=Business_info::find(1);
        $balance=$check->balance;
        if($balance >= $request->pay){
                $staff = Staff::where('id',$request->staff_id)->first();
                $sallery=$staff->sallery;
                
                $paid=Sallery_info::where('staff_id',$request->staff_id)->where('month_name',$request->month_name)->whereYear('created_at', Carbon::now()->format('Y'))->sum('paid');
                $paid=$paid + $request->pay;
                if($sallery >= $paid){
                $sallery_info=new Sallery_info;
                $sallery_info->staff_id=$request->staff_id;
                $sallery_info->month_name=$request->month_name;
                $sallery_info->paid +=$request->pay;
                $sallery_info->date =$request->date;
                $sallery_info->save();
                
                    $business_info=Business_info::find(1);
                    $business_info->balance -=$request->pay;
                    $business_info->save();
            
            return redirect('/staff/payment/history')->with('success','payment Successfully Done');
            }else{
                return back()->with('error','Due Is Over');
            }
        }else{
                return back()->with('error','Balance Is Over'); 
        }
    }
    
        public function staffpaymentindex(Request $request){
        if ($request->ajax()) {
            $data = Sallery_info::with('staff')->latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
        
            ->addColumn('day', function($row){
                 
                return date('d-m-Y', strtotime($row->date));
          })
            ->addColumn('client', function($row){
                 
                return '<small>Name:'.$row->staff->name.'<br>phone: '.$row->staff->phone.'<br>Address:'.$row->staff->address.'</small>';
          })
        
            ->addColumn('paid', function($row){
                 
                return $row->paid;
          })
            ->addColumn('month', function($row){
                 
                 if($row->month_name == 1){
                      return "January";
                 }
                 if($row->month_name == 2){
                      return "February";
                 }
                 if($row->month_name == 3){
                      return "March";
                 }
                 if($row->month_name == 4){
                      return "April";
                 }
                 if($row->month_name == 5){
                      return "May";
                 }
                 if($row->month_name == 6){
                      return "June";
                 }
                 if($row->month_name == 7){
                      return "July";
                 }
                 if($row->month_name == 8){
                      return "Aguest";
                 }
                 if($row->month_name == 9){
                      return "september";
                 }
                 if($row->month_name == 10){
                      return "October";
                 }
                 if($row->month_name == 11){
                      return "November";
                 }
                 if($row->month_name == 12){
                      return "December";
                 }
               
          })
           
            ->rawColumns(['day','client','paid','month'])
                    ->make(true);
        }
    }
    
    
    public function staff_attendance_details() {
        Staff::addAttendance();
        return view('pages.staff.staff_attendance_details');
    }
    
    public function staff_attendance_details_data(Request $request)
    {
         if ($request->ajax()) {
        $data = StaffInOutDetails::OrderBy('id', 'DESC')->get();
        return Datatables::of($data)
        ->addIndexColumn()
            ->addColumn('name', function($row){
                  return optional($row->staffInfo)->name;
            })
            ->addColumn('date', function($row){
                return date('d-m-Y', strtotime(optional($row)->date));
            })
            ->addColumn('time', function($row){
                return date("g:i a", strtotime(optional($row)->time));
            })
            
            ->rawColumns(['name', 'time','date'])
                    ->make(true);
    }  
    }
    
    
    public function staff_attendance_in_out() {
        Staff::addAttendance();
        return view('pages.staff.staff_attendance_in_out');
    }
    
    
    
}
