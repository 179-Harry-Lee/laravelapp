<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = FacadesSession::get('admin_id');
        if($admin_id){
            Redirect::to('dashboard');
        }else{
            Redirect::to('adminlogin')->send();
        }
    }

    public function add_category_product(){
        $this->AuthLogin();
        return view('/add_category_product');
    }


    public function all_category_product(){
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get() ;
        $manager_category_product = view('all_category_product')->with('all_category_product',$all_category_product) ;
        return view('adminform')->with('all_category_product',$manager_category_product) ;
    }


    public function save_category_product(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
         DB::table('tbl_category_product')->insert($data);
         FacadesSession::put('message','Them danh muc san pham thanh cong');
         return Redirect::to('all-category-product');
    }

    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        FacadesSession::put('message','An danh muc san pham thanh cong');
        return Redirect::to('all-category-product');
    }

    public function active_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status' =>0]);
        FacadesSession::put('message','Hien thi danh muc san pham thanh cong');
        return Redirect::to('all-category-product');
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
