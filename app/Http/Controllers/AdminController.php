<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class AdminController extends Controller
{
    public function adminlogin(){
        return view('adminlogin');
    }
    public function showdashboard(){
        return view('dashboard');
    }
    //dang nhap voi account admin 
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $admin_name = $request->admin_name;
        $admin_id = $request->admin_id;
        
        $resuit = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($resuit){
            // Session::put('admin_name',$resuit->admin_name);
            // Session::put('admin_id',$resuit->admin_id);
            //12/2/2023: Logout thanh cong, xuat thong bao khi dang nhap sai
            FacadesSession::put('admin_name',$resuit->admin_name);
            FacadesSession::put('admin_id',$resuit->admin_id);
            return Redirect::to('/dashboard');
        }else{
            // Session::put('message','Tai Khoanr hoac mat khau bi sai');
            FacadesSession::put('message','tai khoan hoac mat khau khong dung');
            return Redirect::to('/adminlogin');
        }
    }
    public function logout(Request $request){
        echo'click thanh cong';
    }
}
