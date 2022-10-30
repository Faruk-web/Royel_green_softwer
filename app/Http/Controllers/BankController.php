<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Bank;
use App\Models\Client;
use App\Models\Banklist;
use DataTables;
use Carbon\Carbon;
class BankController extends Controller
{

    public function banklist(){
        return view('bank.list');
    }

    public function bankadd(Request $request){
        $bank=new BankList;
        $bank->name=$request->name;
        $bank->branch=$request->branch;
        $bank->account_type=$request->account_type;
        $bank->account_no=$request->account_number;
        $bank->opening_balance=$request->opening_balance;
        $bank->total_amount=$request->opening_balance;
        $bank->save();
       return back()->with('success',"Bank Add Sucessfully done");
    }
    public function banklistupdate(Request $request,$id){
        $bank=BankList::find($id);
        $bank->name=$request->name;
        $bank->branch=$request->branch;
        $bank->account_type=$request->account_type;
        $bank->account_no=$request->account_no;
        $bank->save();
       return redirect()->route('bank.list')->with('success',"Bank Update Sucessfully done");
    }
    public function deposit(){
        $banks=Banklist::all();
        return view('bank.deposit',compact('banks'));
    }
    public function storedeposit(Request $request){
            $today = Carbon::today();
            $bank= new Bank;
            $bank->bank_id=$request->bank_id;
            $bank->deposit=$request->deposit;
            $bank->date=$today;
            $bank->reason=$request->reason;
            $bank->save();

            $bankname=Banklist::find($request->bank_id);
            $bankname->total_amount += $request->deposit;
            $bankname->save();
        return back()->with('success',"Deposit Sucessfulyy done");
    }

     public function work_data(Request $request) {
        if ($request->ajax()) {
            $data = Bank::where('withdraw',null)->orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '
                    <a type="button" onclick="delete_ot('.$row->id.')" data-toggle="modal" data-target="#exampleModal"  class="btn btn-danger btn-sm btn-rounded">Delete</a>';
                })
               
                ->addColumn('bank_info', function($row){
                    return '<small>Name:'.$row->bank_info->name.'<br>Branch: '.$row->bank_info->branch.'</small>';
                })
                ->addColumn('deposit', function($row){
                    return $row->deposit;
                })
                ->addColumn('reason', function($row){
                    return $row->reason;
                })
              
                ->rawColumns(['action','bank_info', 'deposit', 'reason'])
                ->make(true);
        }
    }
     public function banklisthistorydata(Request $request,$id) {
        if ($request->ajax()) {
             $data = Bank::where('bank_id',$id)->orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('deposit', function($row){
                    return $row->deposit;
                })
                ->addColumn('withdraw', function($row){
                    return $row->withdraw;
                })
                ->addColumn('reason', function($row){
                    return $row->reason;
                })
                ->addColumn('created_at', function($row){
                    return $date =Carbon::parse($row->date)->format('d/m/Y');
                })
              
                ->rawColumns(['deposit','withdraw','reason','created_at'])
                ->make(true);
        }
    }
    public function withdraw(){
        $deposit=Bank::where('withdraw', null)->sum('deposit');
        $withdraw=Bank::where('deposit', null)->sum('withdraw');
        $total_amount= $deposit - $withdraw;
        $banks=Banklist::all();
        
        return view('bank.withdraw',compact('total_amount','banks'));
    }
    public function storewithdraw (Request $request){
            $today = Carbon::today();
            $bank= new Bank;
            $bank->withdraw =$request->withdraw ;
             $bank->date=$today;
            $bank->bank_id =$request->bank_id ;
            $bank->reason=$request->reason;
            $bank->save();

            $bankname=Banklist::find($request->bank_id);
            $bankname->total_amount -= $request->withdraw;
            $bankname->save();

        return back()->with('success',"Withdraw Sucessfuly done");
    }

     public function work_data_withdraw(Request $request) {
        if ($request->ajax()) {
            $data = Bank::where('deposit',null)->orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '
                    <a type="button" onclick="delete_ot('.$row->id.')" data-toggle="modal" data-target="#exampleModal"  class="btn btn-danger btn-sm btn-rounded">Delete</a>';
                })
                ->addColumn('bank_info', function($row){
                    return '<small>Name:'.$row->bank_info->name.'<br>Branch: '.$row->bank_info->branch.'</small>';
                })
               
                ->addColumn('withdraw', function($row){
                    return $row->withdraw;
                })
                ->addColumn('reason', function($row){
                    return $row->reason;
                })
              
                ->rawColumns(['action', 'bank_info','withdraw', 'reason'])
                ->make(true);
        }
    }
     public function banklistdata(Request $request) {
        if ($request->ajax()) {
            $data = Banklist::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a type="button" href="'.route('bank.list.history', $row->id).'" class="btn btn-success btn-sm" style="margin-right:3px">History</a><a type="button" href="'.route('bank.list.edit', $row->id).'" class="btn btn-info btn-sm">Edit</a>';
                })
                ->addColumn('name', function($row){
                    return $row->name;
                })
                ->addColumn('branch', function($row){
                    return $row->branch;
                })
                ->addColumn('acn', function($row){
                    return $row->account_no;
                })
                ->addColumn('act', function($row){
                    return $row->account_type;
                })
                ->addColumn('amount', function($row){
                    return $row->total_amount;
                })
              
                ->rawColumns([ 'action','name', 'branch','acn','act','amount'])
                ->make(true);
        }
    }
     public function banklistedit($id) {

        $bank=Banklist::find($id);
         return view('bank.bankedit',compact('bank'));
    }
     public function banklisthistory($id) {

         return view('bank.history',compact('id'));
    }

    public function depositdelete(Request $request){
        $id=Bank::find($request->ot_id);
        $bank_id=$id->bank_id;
        $amount=$id->deposit;
       $bank=Banklist::find($bank_id);
       $bank->total_amount -=$amount;
      $bank->save();
        Bank::destroy($request->ot_id);
        return back()->with('error',"successfully deposit delete");
    }

    public function withdrawdelete(Request $request){
        $id=Bank::find($request->ot_id);
        $bank_id=$id->bank_id;
        $amount=$id->withdraw;
       $bank=Banklist::find($bank_id);
       $bank->total_amount +=$amount;
      $bank->save();
        Bank::destroy($request->ot_id);
        return back()->with('error',"successfully withdraw delete");
    }

}
