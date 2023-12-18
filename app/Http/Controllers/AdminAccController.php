<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Http\Request;

class AdminAccController extends Controller
{
    public function AuthLogin(){
        $admin_id = FacadesSession::get('admin_id');
        if($admin_id){
            Redirect::to('dashboard');
        }else{
            Redirect::to('adminlogin')->send();
        }
    }
    public function add_admin(){
        $this->AuthLogin();
        return view('/add_admin');
    }

    public function save_admin(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['admin_name'] = $request->admin_name;
        $data['admin_email'] = $request->admin_email;
        $data['admin_sex'] = $request->admin_sex;
        $data['admin_password'] = $request->admin_password;
        $data['admin_phone'] = $request->admin_phone;
        $data['admin_permission'] = $request->admin_permission;


    

        $get_image =$request->file('admin_image');

        if($get_image){
            // Lay duoi .jpg
        $get_name_image = $get_image->getClientOriginalName();
        // Ham Current giup phan tach ten vaf duoi jpg
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('upload/admin',$new_image);
        $data['admin_image'] = $new_image;
        DB::table('tbl_admin')->insert($data);
        FacadesSession::put('message','them tai khoan thanh cong');
        return Redirect::to('all-admin');
        }
        $data['admin_image'] ='';
         DB::table('tbl_admin')->insert($data);
         FacadesSession::put('message','Them tai khoan  thanh cong');
         return Redirect::to('all-admin');
    }


    public function edit_admin($admin_id){
        $this->AuthLogin();

        
        $edit_admin = DB::table('tbl_admin')->where('admin_id',$admin_id)->get() ;

        $manager_admin = view('edit_admin')->with('edit_admin',$edit_admin);
        return view('adminform')->with('edit_admin',$manager_admin) ;
    }


    public function all_admin(){
        $this->AuthLogin();
        $all_admin = DB::table('tbl_admin')->get();
        $manager_admin = view('all_admin')->with('all_admin',$all_admin) ;
        return view('adminform')->with('all_admin',$manager_admin) ;
    }

    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        FacadesSession::put('message','An tai khoan thanh cong');
        return Redirect::to('all-product');
    }

    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' =>0]);
        FacadesSession::put('message','Hien thi tai khoan thanh cong');
        return Redirect::to('all-product');
    }


    public function update_admin(Request $request,$admin_id){
        $this->AuthLogin();
        $data = array();
        $data['admin_name'] = $request->admin_name;
        $data['admin_email'] = $request->admin_email;
        $data['admin_sex'] = $request->admin_sex;
        $data['admin_password'] = $request->admin_password;
        $data['admin_phone'] = $request->admin_phone;
        $data['admin_permission'] = $request->admin_permission;

    

        $get_image =$request->file('admin_image');

        if($get_image){
            // Lay duoi .jpg
        $get_name_image = $get_image->getClientOriginalName();
        // Ham Current giup phan tach ten vaf duoi jpg
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('upload/admin',$new_image);
        $data['admin_image'] = $new_image;
        DB::table('tbl_admin')->where('admin_id',$admin_id)->update($data);
        FacadesSession::put('message','thay doi thong tin tai khoan thanh cong');
        return Redirect::to('add-admin');
        }
        $data['admin_image'] ='';
        DB::table('tbl_admin')->where('admin_id',$admin_id)->update($data);
         FacadesSession::put('message','Thay doi thong tin tai khoan  thanh cong');
         return Redirect::to('all-admin');


        
    }

    public function delete_admin($admin_id){
        $this->AuthLogin();
        DB::table('tbl_admin')->where('admin_id',$admin_id)->delete();
        FacadesSession::put('message','Xoa tai khoan thanh cong');
        return Redirect::to('all-admin');
    }
}
