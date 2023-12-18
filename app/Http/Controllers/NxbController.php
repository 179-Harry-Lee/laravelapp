<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
class NxbController extends Controller
{

    public function AuthLogin(){
        $admin_id = FacadesSession::get('admin_id');
        if($admin_id){
            Redirect::to('dashboard');
        }else{
            Redirect::to('adminlogin')->send();
        }
    }


    public function all_nxb(){
        $all_nxb = DB::table('tbl_nxb')->get() ;
        $manager_nxb = view('all_nxb')->with('all_nxb',$all_nxb) ;
        return view('adminform')->with('all_nxb',$manager_nxb) ;
    }


    public function add_nxb(){
        $this->AuthLogin();
        return view('/add_nxb');
    }
    public function save_nxb(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['nxb_name'] = $request->nxb_name;
        $data['nxb_code'] = $request->nxb_code;
         DB::table('tbl_nxb')->insert($data);
         FacadesSession::put('message','Them nha xuat ban thanh cong');
         return Redirect::to('all-nxb');
    }
    public function edit_nxb($nxb_id){
        $this->AuthLogin();
        $edit_nxb = DB::table('tbl_nxb')->where('nxb_id',$nxb_id)->get() ;
        $manager_nxb = view('edit_nxb')->with('edit_nxb',$edit_nxb) ;
        return view('adminform')->with('edit_nxb',$manager_nxb) ;
    }

    public function update_nxb(Request $request,$nxb_id){
        $this->AuthLogin();
    
        $data = array();
        $data['nxb_name'] = $request->nxb_name;
        $data['nxb_code'] = $request->nxb_code;

        DB::table('tbl_nxb')->where('nxb_id',$nxb_id)->update($data);
        FacadesSession::put('message','Cap nhat tai nha xuat ban thanh cong');
        return Redirect::to('all-nxb');
        
    }
    
    public function delete_nxb($nxb_id){
        $this->AuthLogin();
        DB::table('tbl_nxb')->where('nxb_id',$nxb_id)->delete();
        FacadesSession::put('message','Xoa nha xuat ban thanh cong');
        return Redirect::to('all-nxb');
    }
}
