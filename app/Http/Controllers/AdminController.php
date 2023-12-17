<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = FacadesSession::get('admin_id');
        if($admin_id){
            Redirect::to('dashboard');
        }else{
            Redirect::to('adminlogin')->send();
        }
    }

    public function adminlogin(){
        return view('adminlogin');
    }
    public function showdashboard(){
        $this->AuthLogin();
        return view('dashboard');
    }
    //dang nhap voi account admin 
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;
        $admin_name = $request->admin_name;
        $admin_id = $request->admin_id;
        $admin_permission = $request->admin_permission;
        $admin_sex = $request->admin_sex;
        $get_image =$request->file('admin_image');

        
        $resuit = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($resuit){
            // Session::put('admin_name',$resuit->admin_name);
            // Session::put('admin_id',$resuit->admin_id);
            //12/2/2023: Logout thanh cong, xuat thong bao khi dang nhap sai
            FacadesSession::put('admin_name',$resuit->admin_name);
            FacadesSession::put('admin_id',$resuit->admin_id);
            FacadesSession::put('admin_permission',$resuit->admin_permission);
            return Redirect::to('/dashboard');
        }else{
            // Session::put('message','Tai Khoanr hoac mat khau bi sai');
            FacadesSession::put('message','tai khoan hoac mat khau khong dung');
            return Redirect::to('/adminlogin');
        }
    }
    public function logout(Request $request){
        $this->AuthLogin();
        FacadesSession::put('admin_name',null);
        FacadesSession::put('admin_id',null);
        FacadesSession::put('admin_permission',null);
        return Redirect::to('/adminlogin');

    }
}
