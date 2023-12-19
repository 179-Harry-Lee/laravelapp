<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
class AccountController extends Controller
{
    public function AuthLogin(){
        $admin_id = FacadesSession::get('admin_id');
        if($admin_id){
            Redirect::to('dashboard');
        }else{
            Redirect::to('adminlogin')->send();
        }
    }

    public function add_account(){
        $this->AuthLogin();
        return view('/add_account');
    }


    public function all_account(){
        $this->AuthLogin();
        $all_account = DB::table('tbl_acc')->get() ;
        $manager_account = view('all_account')->with('all_account',$all_account);
        return view('adminform')->with('all_account',$manager_account) ;
    }


    public function save_account(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['acc_name'] = $request->acc_name;
        $data['acc_email'] = $request->acc_email;
        $data['acc_phone'] = $request->acc_phone;
        $data['acc_password'] = $request->acc_password;
        $data['acc_sex'] = $request->acc_sex;
        $data['acc_codecard'] = $request->acc_codecard;
        $data['acc_ngaydangky'] = $request->acc_ngaydangky;
        $data['acc_ngayhethan'] = $request->acc_ngayhethan;
        $get_image =$request->file('acc_image');

        if($get_image){
            // Lay duoi .jpg
        $get_name_image = $get_image->getClientOriginalName();
        // Ham Current giup phan tach ten vaf duoi jpg
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('upload/nguoidoc',$new_image);
        $data['acc_image'] = $new_image;
        DB::table('tbl_acc')->insert($data);
        FacadesSession::put('message','them tai khoan thanh cong');
        return Redirect::to('add-account');
        }
        $data['acc_image'] ='';


         DB::table('tbl_acc')->insert($data);
         FacadesSession::put('message','Them tai khoan thanh cong');
         return Redirect::to('all-account');
    }

    public function unactive_account($acc_id){
        $this->AuthLogin();
        DB::table('tbl_acc')->where('acc_id',$acc_id)->update(['acc_permission'=>1]);
        FacadesSession::put('message','An tai khoan thanh cong');
        return Redirect::to('all-account');
    }

    public function active_account($acc_id){
        $this->AuthLogin();
        DB::table('tbl_acc')->where('acc_id',$acc_id)->update(['acc_permission' =>2]);
        FacadesSession::put('message','Hien thi tai khoan thanh cong');
        return Redirect::to('all-account');
    }
    
    public function edit_account($acc_id){
        $this->AuthLogin();
        $edit_account = DB::table('tbl_acc')->where('acc_id',$acc_id)->get() ;
        $manager_account = view('edit_account')->with('edit_account',$edit_account) ;
        return view('adminform')->with('edit_account',$manager_account) ;
    }

    public function update_account(Request $request,$acc_id){
        $this->AuthLogin();
    
        $data = array();
        $data['acc_name'] = $request->acc_name;
        $data['acc_email'] = $request->acc_email;
        $data['acc_phone'] = $request->acc_phone;
        $data['acc_password'] = $request->acc_password;
        $data['acc_sex'] = $request->acc_sex;
        $data['acc_codecard'] = $request->acc_codecard;
        $data['acc_ngayhethan'] = $request->acc_ngayhethan;

        DB::table('tbl_acc')->where('acc_id',$acc_id)->update($data);
        FacadesSession::put('message','Cap nhat tai khoan thanh cong');
        return Redirect::to('all-account');
        
    }
    
    public function delete_account($acc_id){
        $this->AuthLogin();
        DB::table('tbl_acc')->where('acc_id',$acc_id)->delete();
        FacadesSession::put('message','Xoa tai khoan thanh cong');
        return Redirect::to('all-account');
    }
}
