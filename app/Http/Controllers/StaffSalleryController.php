<?php

namespace App\Http\Controllers;

use App\Models\StaffSallery;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Area;
use App\Models\StaffDailyAttendence;
use Carbon\Carbon;
use App\Models\Business_info;
use DataTables;
use App\Models\Expense_group;
use App\Models\Expense_transaction;
use App\Models\Ledger_Head;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StaffSalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function staff_sallery()
     {
       //  dd($users);
        return view('staff.staff_sallery'); 
     }
     
     public function salleryhistory(){
            return view('staff.sallery_history');
        }
        
        
           //sallery history data fache
        public function salleryhistoryindex(Request $request){
        if ($request->ajax()) {
            
        $data = StaffSallery::OrderBy('id', 'DESC')->get();
        
        return Datatables::of($data)
        ->addIndexColumn()
    
        ->addColumn('day', function($row){
            return date('d-m-Y', strtotime($row->date));
         })
    
        ->addColumn('paid', function($row){
            return $row->paid_amount;
        })
        
        ->addColumn('month', function($row){
            return date("M Y", strtotime($row->month));
        })
        
        ->addColumn('staff_info', function($row){
            $staff_info = Staff::find($row->staff_id);
            return optional($staff_info)->name;
        })
        
        
        ->rawColumns(['day', 'amount', 'paid', 'month', 'staff_info'])
        ->make(true);
    }
}
        

//search staff
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
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Sallery</th>
                                        <th>Action</th>
                                    </tr>  
                                </thead>
                                <tbody>';
                                foreach ($info as $item) {
                                    
                                    $output.='<tr>
                                                <td>'.$item->name.'</td>
                                                <td>'.$item->phone.'</td>
                                                <td>'.$item->sallery.'</td>
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
    
    //month search
     public function monthsearch(Request $request){
        $day=now();
        $month=$request->month;
        $staff=$request->staffid;
        
        $sallery_paid = StaffSallery::where('staff_id', $staff)->where('month', $month)->sum('paid_amount');
        
         return response()->json([
            // 'attendance' => $count,
            'paid' => $sallery_paid,
        ]);
    }
    
    // sallery pay
        public function pay(Request $request){
            // dd($request);
           $net_cash_balance = Business_info::first();
        //    dd($net_cash_balance);
           $date = $request->date;
           $balance = $net_cash_balance->balance;
           
           if($request->staff_id_for_submit == '') {
               return back()->with('error','Select Staff.');
           }
           
           if($balance >= $request->pay){
               $staff = Staff::where('id', $request->staff_id_for_submit)->first();
               
               $sallery_info = new StaffSallery;
            //    $sallery_info->shop_id = $shop_id;
               $sallery_info->staff_id = $staff->id;
               $sallery_info->month = $request->month_name;
               $sallery_info->paid_amount = $request->pay;
               $sallery_info->note = $request->note;
               $sallery_info->date = $request->date;
               $sallery_info->save();
               
                if($request->pay > 0) {
                    $update_net_cash_balance = $net_cash_balance;
                    $update_net_cash_balance->balance -= $request->pay;
                    $update_net_cash_balance->update(); 
                }
                
               return redirect()->route('staff.sallery.history')->with('success','payment Successfully Done');
           }
           else{
                return back()->with('error','Balance Is Over'); 
           }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffSallery  $staffSallery
     * @return \Illuminate\Http\Response
     */
    public function show(StaffSallery $staffSallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaffSallery  $staffSallery
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffSallery $staffSallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StaffSallery  $staffSallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffSallery $staffSallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffSallery  $staffSallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaffSallery $staffSallery)
    {
        //
    }
}
