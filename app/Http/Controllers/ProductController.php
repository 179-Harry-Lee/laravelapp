<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = FacadesSession::get('admin_id');
        if($admin_id){
            Redirect::to('dashboard');
        }else{
            Redirect::to('adminlogin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        return view('add_product')->with('cate_product',$cate_product);
    }

    public function save_product(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $data['product_author'] = $request->product_author;

        $get_image =$request->file('product_image');

        if($get_image){
            // Lay duoi .jpg
        $get_name_image = $get_image->getClientOriginalName();
        // Ham Current giup phan tach ten vaf duoi jpg
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('upload/product',$new_image);
        $data['product_image'] = $new_image;
        DB::table('tbl_product')->insert($data);
        FacadesSession::put('message','them san pham thanh cong');
        return Redirect::to('add-product');
        }
        $data['product_image'] ='';
         DB::table('tbl_product')->insert($data);
         FacadesSession::put('message','Them san pham thanh cong');
         return Redirect::to('all-product');
    }


    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get() ;

        $manager_product = view('edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product) ;
        return view('adminform')->with('edit_product',$manager_product) ;
    }


    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderBy('tbl_product.product_id','desc')->get();
        $manager_product = view('all_product')->with('all_product',$all_product) ;
        return view('adminform')->with('all_product',$manager_product) ;
    }

    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        FacadesSession::put('message','An san pham thanh cong');
        return Redirect::to('all-product');
    }

    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' =>0]);
        FacadesSession::put('message','Hien thi san pham thanh cong');
        return Redirect::to('all-product');
    }


    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $data['product_author'] = $request->product_author;
        $get_image =$request->file('product_image');

        if($get_image){
            // Lay duoi .jpg
        $get_name_image = $get_image->getClientOriginalName();
        // Ham Current giup phan tach ten vaf duoi jpg
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('upload/product',$new_image);
        $data['product_image'] = $new_image;
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        FacadesSession::put('message','them san pham thanh cong');
        return Redirect::to('add-product');
        }
        
         DB::table('tbl_product')->where('product_id',$product_id)->update($data);
         FacadesSession::put('message','Them san pham thanh cong');
         return Redirect::to('all-product');
        
    }

    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        FacadesSession::put('message','Xoa san pham thanh cong');
        return Redirect::to('all-product');
    }
}
