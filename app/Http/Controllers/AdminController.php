<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business_info;
use Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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

        public function role() {
            if(User::checkPermission('role.view') == true) {
                $roles = DB::table('roles')->get();
                return view('pages.roles.role', compact('roles'));
            }
            else {
                return 'coming soon user dashboard';
            }
        }
    
        public function create_role(Request $request) {
            if(User::checkPermission('create.role') == true) {
                $role_name = $request->name;
                $check = DB::table('roles')->where('name', $role_name)->first();
                if(!empty($check->id)) {
                    return Redirect()->back()->with('error', 'This role is already exist!');
                }
                else {
                    $data = array();
                    $data['name'] = $role_name;
                    $data['guard_name'] = 'web';
                    $data['created_at'] = Carbon::now();
    
                    $insert = DB::table('roles')->insert($data);
                    if($insert) {
                        return Redirect()->back()->with('success', 'New role has been created.');
                    }
                    else {
                        return Redirect()->back()->with('error', 'Error Occoured, Please Try again.');
                    }
                }
            }
            else {
                return 'coming soon user dashboard';
            }
        }
    
        //Begin:: Edit Admin helper role
        public function Edit_Admin_helper_role($id) {
            if(User::checkPermission('update.role') == true){
                $role_info = DB::table('roles')->where('id', $id)->first();
                if(!empty($role_info->id)) {
                    return view('pages.roles.edit_role', compact('role_info'));
                }
                else {
                    return Redirect()->back()->with('error', 'Sorry you can not access this page');
                }
            }
            else {
                return Redirect()->back()->with('error', 'Sorry you can not access this page');
            }
            
        }
        //Begin:: Edit Admin helper role
    
        //Begin:: Update Admin helper role
        public function update_Admin_helper_role(Request $request, $id) {
            if(User::checkPermission('update.role') == true){
                $role_name = $request->name;
                $check = DB::table('roles')->where('name', $role_name)->first();
                if(!empty($check->id)) {
                    return Redirect()->back()->with('error', 'Sorry, This role is already exist!');
                }
                else {
                    $data = array();
                    $data['name'] = $role_name;
                    $data['updated_at'] = Carbon::now();
                    $update = DB::table('roles')->where('id', $id)->update($data);
                    if($update) {
                        return Redirect()->route('admin.role')->with('success', 'Role has benn Updated.');
                    }
                    else {
                        return Redirect()->back()->with('error', 'Error Occoured, Please Try again.');
                    }
                    
                }
            }
            else {
                return Redirect()->back()->with('error', 'Sorry you can not access this page');
            }
            
        }
        //End:: Update Admin helper role
    
    
        //Begin:: Update Admin helper role Permission
        public function admin_helper_permission($id) {
            if(User::checkPermission('permissions') == true){
                $role = Role::findById($id);
                $permissions = Permission::all();
                $permissionGroups = User::getPermissionGroupsForAdminHealperRole();
                $wing = 'main';
                return view('pages.roles.permissions', compact('permissions', 'permissionGroups', 'role', 'wing'));
            }
            else {
                return Redirect()->back()->with('error', 'Sorry you can not access this page');
            }
        }
        //End:: Update Admin helper role Permission
    
        //Begin:: Set Permission to admin helper role
        public function set_permission_to_admin_helper_role() {
            $role_id = $_GET['roleID'];
            $permission_id = $_GET['permission_id'];
            
            $check = DB::table('role_has_permissions')->where('role_id', $role_id)->where('permission_id', $permission_id)->first();
            if(empty($check->role_id)) {
                $data = array();
                $data['role_id'] = $role_id;
                $data['permission_id'] = $permission_id;
    
                $insert = DB::table('role_has_permissions')->insert($data);
    
                if($insert) {
                    \Artisan::call('permission:cache-reset');
                    $sts = [
                        'status' => 'yes',
                        'reason' => 'Permission set successfully'
                    ];
                    return response()->json($sts);
                }
                else {
                    $sts = [
                        'status' => 'no',
                        'reason' => 'Something is wrong, please try again.'
                    ];
                    return response()->json($sts);
                }
                
            }
            else {
                $sts = [
                    'status' => 'no',
                    'reason' => 'Permission is already exist, Please try another.'
                ];
                return response()->json($sts);
            }
            
        }
        //End:: Set Permission to admin helper role
    
    
        //Begin:: Delete Permission from role
        public function delete_permission_from_role() {
            $role_id = $_GET['roleID'];
            $permission_id = $_GET['permission_id'];
            
            $check = DB::table('role_has_permissions')->where('role_id', $role_id)->where('permission_id', $permission_id)->first();
            if(!empty($check->role_id)) {
                
                $delete = DB::table('role_has_permissions')->where('role_id', $role_id)->where('permission_id', $permission_id)->delete();
                if($delete) {
                    \Artisan::call('permission:cache-reset');
                    $sts = [
                        'status' => 'yes',
                        'reason' => 'Permission Delete successfully'
                    ];
                    return response()->json($sts);
                }
                else {
                    $sts = [
                        'status' => 'no',
                        'reason' => 'Something is wrong, please try again.'
                    ];
                    return response()->json($sts);
                }
                
            }
            else {
                $sts = [
                    'status' => 'no',
                    'reason' => 'Permission is not exist, Please try another.'
                ];
                return response()->json($sts);
            }
            
        }
        //End:: Delete Permission from role
}
