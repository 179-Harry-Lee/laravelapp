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

    public function add_category_book(){
        $this->AuthLogin();
        return view('/add_category_book');
    }


    public function all_category_book(){
        $this->AuthLogin();
        $all_category_book = DB::table('tbl_category_book')->get() ;
        $manager_category_book = view('all_category_book')->with('all_category_book',$all_category_book) ;
        return view('adminform')->with('all_category_book',$manager_category_book) ;
    }


    public function save_category_book(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        $data['category_status'] = $request->category_status;
         DB::table('tbl_category_book')->insert($data);
         FacadesSession::put('message','Them danh muc san pham thanh cong');
         return Redirect::to('all-category-book');
    }

    public function unactive_category_book($category_id){
        $this->AuthLogin();
        DB::table('tbl_category_book')->where('category_id',$category_id)->update(['category_status'=>1]);
        FacadesSession::put('message','An dau sach thanh cong');
        return Redirect::to('all-category-book');
    }

    public function active_category_book($category_id){
        $this->AuthLogin();
        DB::table('tbl_category_book')->where('category_id',$category_id)->update(['category_status' =>0]);
        FacadesSession::put('message','An dau sach thanh cong');
        return Redirect::to('all-category-book');
    }
    
    public function edit_category_book($category_id){
        $this->AuthLogin();
        $edit_category_book = DB::table('tbl_category_book')->where('category_id',$category_id)->get() ;
        $manager_category_book = view('edit_category_book')->with('edit_category_book',$edit_category_book) ;
        return view('adminform')->with('edit_category_book',$manager_category_book) ;
    }

    public function update_category_book(Request $request,$category_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;

        DB::table('tbl_category_book')->where('category_id',$category_id)->update($data);
        FacadesSession::put('message','Cap nhat danh muc thanh cong');
        return Redirect::to('all-category-book');
        
    }
    
    public function delete_category_book($category_id){
        $this->AuthLogin();
        DB::table('tbl_category_book')->where('category_id',$category_id)->delete();
        FacadesSession::put('message','Xoa san pham thanh cong');
        return Redirect::to('all-category-book');
    }
}
