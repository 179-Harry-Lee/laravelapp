<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class ProductController extends Controller
{
    public function add_product(){
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        return view('add_product')->with('cate_product',$cate_product);
    }

    public function save_product(Request $request){
    

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
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
        return redirect('add-product');
        }
        $data['product_image'] ='';
         DB::table('tbl_product')->insert($data);
         FacadesSession::put('message','Them san pham thanh cong');
         return Redirect::to('add-product');
    }
}
