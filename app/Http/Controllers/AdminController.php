<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business_info;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function dashboard() {
        $settings = '111';
        return view('pages.dashboard', compact('settings'));
    }


    public function setting() {
        $info =Business_info::find(1);
        return view('setting.setting', compact('info'));
    }
    public function storesetting(Request $request) {
      
        $info = Business_info::find(1);

        if(!is_null($info)) {
            $setting = $info;
        }
        else {
            $setting = new Business_info;
        }

        // if($request->hasfile('logo'))
        // {
        //     $destination = './uploads/settings/'.$info->logo;
        //     if(File::exists($destination))
        //     {
        //         File::delete($destination);
        //     }
        // }

        if ($image = $request->file('logo')) {
            $destinationPath = 'image/';
            $profileImage = 'image/'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $setting->logo = "$profileImage";
        }
    
        
        // if($request->logo) {
        //     $logo = $request->file('logo');
        //     $name_gen = hexdec(uniqid()).".".$logo->getClientOriginalExtension();
        //     Image::make($logo)->save('./public/images/settings/'.$name_gen);
        //     $final_logo = 'images/settings/'.$name_gen;
        //     if(is_file(public_path(optional($info)->logo))){
        //         //unlink('./public/'. $info->logo);
        //     }
        //     $setting->logo = $final_logo;
        // }
       
        $setting->name = $request->name;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->website = $request->website;
        $status = $setting->save();

        if($status) {
            return Redirect()->back()->with('success', 'Settings successfully');
        }
        else {
            return Redirect()->back()->with('error', 'Error occoured!');
        }
        return view('setting.setting', compact('info'));
    }

    
    public function balanceindex(){
        $balance = DB::table('business_infos')->first();
        $balance=number_format($balance->balance, 2);
            $banks = DB::table('banklists')->get();
        
            $output='';
                $output .= '
                <div class="col-md-12 p-2"><div class="media d-flex align-items-center push shadow rounded p-3">
                    <div class="mr-3"><a class="item item-rounded bg-success" href="javascript:void(0)">
                    <i class="fas fa-coins fa-2x text-white-75"></i></a></div><div class="media-body">
                        <div class="font-w600">Cash Balance</div>
                    <div>'.$balance.' tk</div>
                        </div>
                        </div>
                        </div>
                        <div class="col-md-12 p-3">
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
