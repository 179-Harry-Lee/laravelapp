<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class HomeController extends Controller
{

    public function AuthLogin(){
        $acc_id = FacadesSession::get('acc_id');
            if($acc_id){
            Redirect::to('welcome');
        }else{
            Redirect::to('login')->send();
        }
    }
    public function index(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')-> limit(10)->get();
        
        // $all_account = DB::table('tbl_acc')->where('acc_permission','0','1')->orderby('acc_id','acc')->get() ;

        
        return view('welcome')->with('category',$cate_product)->with('all_product',$all_product);
    }




    

    public function login(){
        return view('login');
    }



//dang nhap voi account tai khoan
    public function homeUser(Request $request){
        $acc_email = $request->acc_email;
        $acc_password = md5($request->acc_password);
        $acc_name = $request->acc_name;
        $acc_id = $request->acc_id;
        $acc_permission = $request->acc_permission;

        $resuit = DB::table('tbl_acc')->where('acc_email',$acc_email)->where('acc_password',$acc_password)->first();
        if($resuit){
        // Session::put('admin_name',$resuit->admin_name);
        // Session::put('admin_id',$resuit->admin_id);
        //12/2/2023: Logout thanh cong, xuat thong bao khi dang nhap sai
        FacadesSession::put('acc_name',$resuit->acc_name);
        FacadesSession::put('acc_id',$resuit->acc_id);
        FacadesSession::put('acc_permission',$resuit->acc_permission);
        return Redirect::to('/');
        }else{
        // Session::put('message','Tai Khoanr hoac mat khau bi sai');
        FacadesSession::put('message','tai khoan hoac mat khau khong dung');
        return Redirect::to('/login');
        }
    }
    public function userlogout(Request $request){

        $this->AuthLogin();
        FacadesSession::put('acc_name',null);
        FacadesSession::put('acc_id',null);
        FacadesSession::put('acc_permission',null);
        return Redirect::to('/');

    }
}