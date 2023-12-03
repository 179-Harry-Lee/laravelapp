<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class CategoryProduct extends Controller
{
    public function add_category_product(){
        return view('/add_category_product');
    }


    public function all_category_product(){

        $all_category_product = DB::table('tbl_category_product')->get() ;
        $manager_category_product = view('all_category_product')->with('all_category_product',$all_category_product) ;
        return view('adminform')->with('all_category_product',$manager_category_product) ;
    }


    public function save_category_product(Request $request){
    

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
         DB::table('tbl_category_product')->insert($data);
         FacadesSession::put('message','Them danh muc san pham thanh cong');
         return Redirect::to('all-category-product');
    }

    public function unactive_category_product($category_product_id){
        
    }

    public function active_category_product($category_product_id){
        
    }
    
    
    
}
