<?php

namespace App\Http\Controllers;
use App\Models\Business_info;
use Illuminate\Http\Request;
use Image;
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
      
        $info =Business_info::find(1);

        if(!is_null($info)) {
            $setting = $info;
        }
        else {
            $setting = new Business_info;
        }
        
        if($request->logo) {
           
            $logo = $request->file('logo');
            $name_gen = hexdec(uniqid()).".".$logo->getClientOriginalExtension();
            Image::make(asset($name_gen->logo))->resize(260, 90)->save('public/images/settings/'.$name_gen);
            $final_logo = 'images/settings/'.$name_gen;
            if(is_file(public_path(optional($info)->logo))){
                unlink('./public/'. $info->logo);
            }
            $setting->logo = $final_logo;
        }
       
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
        $balance =Business_info::find(1);
    $balance=number_format($balance->balance, 2);
   
      $output='';
           $output .= '
              <div class="col-md-12"><div class="media d-flex align-items-center push shadow rounded p-3">
        <div class="mr-3"><a class="item item-rounded bg-success" href="javascript:void(0)">
            <i class="fas fa-coins fa-2x text-white-75"></i></a></div><div class="media-body">
                <div class="font-w600">Cash Balance</div>
               <div>'.$balance.' tk</div>
                </div>
                </div>
                </div>
      ';
    return Response($output);
    }
}
