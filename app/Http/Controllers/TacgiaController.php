<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

use Illuminate\Http\Request;

class TacgiaController extends Controller
{
    public function AuthLogin(){
        $admin_id = FacadesSession::get('admin_id');
        if($admin_id){
            Redirect::to('dashboard');
        }else{
            Redirect::to('adminlogin')->send();
        }
    }

    public function add_tacgia(){
        $this->AuthLogin();
        return view('/add_tacgia');
    }


    public function all_tacgia(){
        $this->AuthLogin();
        $all_tacgia = DB::table('tbl_tacgia')->get() ;
        $manager_tacgia = view('all_tacgia')->with('all_tacgia',$all_tacgia);
        return view('adminform')->with('all_tacgia',$manager_tacgia) ;
    }


    public function save_tacgia(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['tacgia_name'] = $request->tacgia_name;
        $data['tacgia_email'] = $request->tacgia_email;
        $data['tacgia_sex'] = $request->tacgia_sex;
        $data['tacgia_code'] = $request->tacgia_code;
        $data['tacgia_status'] = $request->tacgia_status;
         DB::table('tbl_tacgia')->insert($data);
         FacadesSession::put('message','Them tai khoan thanh cong');
         return Redirect::to('all-tacgia');
    }

    public function unactive_tacgia($tacgia_id){
        $this->AuthLogin();
        DB::table('tbl_tacgia')->where('tacgia_id',$tacgia_id)->update(['tacgia_status'=>0]);
        FacadesSession::put('message','An tac gia thanh cong');
        return Redirect::to('all-tacgia');
    }

    public function active_tacgia($tacgia_id){
        $this->AuthLogin();
        DB::table('tbl_tacgia')->where('tacgia_id',$tacgia_id)->update(['tacgia_status' =>1]);
        FacadesSession::put('message','Hien thi danh muc san pham thanh cong');
        return Redirect::to('all-tacgia');
    }
    
    public function edit_tacgia($tacgia_id){
        $this->AuthLogin();
        $edit_tacgia = DB::table('tbl_tacgia')->where('tacgia_id',$tacgia_id)->get() ;
        $manager_tacgia = view('edit_tacgia')->with('edit_tacgia',$edit_tacgia) ;
        return view('adminform')->with('edit_tacgia',$manager_tacgia) ;
    }

    public function update_tacgia(Request $request,$tacgia_id){
        $this->AuthLogin();
    
        $data = array();
        $data['tacgia_name'] = $request->tacgia_name;
        $data['tacgia_email'] = $request->tacgia_email;
        $data['tacgia_sex'] = $request->tacgia_sex;
        $data['tacgia_code'] = $request->tacgia_code;
        $data['tacgia_status'] = $request->tacgia_status;

        DB::table('tbl_tacgia')->where('tacgia_id',$tacgia_id)->update($data);
        FacadesSession::put('message','Cap nhat tai khoan thanh cong');
        return Redirect::to('all-tacgia');
        
    }
    
    public function delete_tacgia($tacgia_id){
        $this->AuthLogin();
        DB::table('tbl_tacgia')->where('tacgia_id',$tacgia_id)->delete();
        FacadesSession::put('message','Xoa tai khoan thanh cong');
        return Redirect::to('all-tacgia');
    }
}
