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
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
         DB::table('tbl_category_product')->insert($data);
         FacadesSession::put('message','Them danh muc san pham thanh cong');
         return Redirect::to('all-account');
    }

    public function unactive_account($acc_id){
        $this->AuthLogin();
        DB::table('tbl_acc')->where('acc_id',$acc_id)->update(['acc_permission'=>1]);
        FacadesSession::put('message','An danh muc san pham thanh cong');
        return Redirect::to('all-account');
    }

    public function active_account($acc_id){
        $this->AuthLogin();
        DB::table('tbl_acc')->where('acc_id',$acc_id)->update(['acc_permission' =>0]);
        FacadesSession::put('message','Hien thi danh muc san pham thanh cong');
        return Redirect::to('all-account');
    }
    
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get() ;
        $manager_category_product = view('edit_category_product')->with('edit_category_product',$edit_category_product) ;
        return view('adminform')->with('edit_category_product',$manager_category_product) ;
    }

    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        FacadesSession::put('message','Cap nhat danh muc thanh cong');
        return Redirect::to('all-category-product');
        
    }
    
    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        FacadesSession::put('message','Xoa san pham thanh cong');
        return Redirect::to('all-category-product');
    }
}