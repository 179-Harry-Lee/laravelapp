<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
class SachmtrController extends Controller
{
    public function AuthLogin(){
        $admin_id = FacadesSession::get('admin_id');
        if($admin_id){
            Redirect::to('dashboard');
        }else{
            Redirect::to('adminlogin')->send();
        }
    }
    public function add_sachmtr(){
        $this->AuthLogin();
        $cate_book = DB::table('tbl_category_book')->orderby('category_id','desc')->get();
        $nxb = DB::table('tbl_nxb')->orderby('nxb_id','desc')->get();
        $tacgia = DB::table('tbl_tacgia')->orderby('tacgia_id','desc')->get();
        $book = DB::table('tbl_book')->orderby('book_id','desc')->get();
        $acc = DB::table('tbl_acc')->orderby('acc_id','desc')->get();
        return view('add_sachmtr')->with('cate_book',$cate_book)->with('nxb',$nxb)->with('tacgia',$tacgia)->with('acc',$acc)->with('book',$book);
    }

    public function save_sachmtr(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['sachmtr_codemuon'] = $request->sachmtr_codemuon;
        $data['sachmtr_desc'] = $request->sachmtr_desc;
        $data['category_id'] = $request->book_cate;
        $data['nxb_id'] = $request->nxb;
        $data['tacgia_id'] = $request->tacgia;
        $data['book_id'] = $request->book;
        $data['acc_id'] = $request->acc;
        $data['sachmtr_ngaymuon'] = $request->sachmtr_ngaymuon;
        $data['sachmtr_ngaytra'] = $request->sachmtr_ngaytra;
        $data['sachmtr_status'] = $request->sachmtr_status;
        DB::table('tbl_sachmuontra')->insert($data);
         FacadesSession::put('message','Tao thong tin muon sach thanh cong');
         return Redirect::to('all-sachmtr');
        
    }


    public function edit_sachmtr($sachmtr_id){
        $this->AuthLogin();
        $cate_book = DB::table('tbl_category_book')->orderby('category_id','desc')->get();
        $nxb = DB::table('tbl_nxb')->orderby('nxb_id','desc')->get();
        $tacgia = DB::table('tbl_tacgia')->orderby('tacgia_id','desc')->get();
        $book = DB::table('tbl_book')->orderby('book_id','desc')->get();
        $acc = DB::table('tbl_acc')->orderby('acc_id','desc')->get();
        

        $edit_sachmtr = DB::table('tbl_sachmuontra')->where('sachmtr_id',$sachmtr_id)->get() ;

        $manager_sachmtr = view('edit_sachmtr')->with('edit_sachmtr',$edit_sachmtr)->with('cate_book',$cate_book)->with('nxb',$nxb)->with('tacgia',$tacgia)->with('book',$book)->with('acc',$acc) ;
        return view('adminform')->with('edit_sachmtr',$manager_sachmtr) ;
    }


    public function all_sachmtr(){
        $this->AuthLogin();
        $all_sachmtr = DB::table('tbl_sachmuontra')
        ->join('tbl_category_book','tbl_category_book.category_id','=','tbl_sachmuontra.category_id')
        ->join('tbl_nxb','tbl_nxb.nxb_id','=','tbl_sachmuontra.nxb_id')
        ->join('tbl_tacgia','tbl_tacgia.tacgia_id','=','tbl_sachmuontra.tacgia_id')
        ->join('tbl_acc','tbl_acc.acc_id','=','tbl_sachmuontra.acc_id')
        ->join('tbl_book','tbl_book.book_id','=','tbl_sachmuontra.book_id')
        ->orderBy('tbl_sachmuontra.sachmtr_id','desc')->get();
        
        $manager_sachmtr = view('all_sachmtr')->with('all_sachmtr',$all_sachmtr) ;
        return view('adminform')->with('all_sachmtr',$manager_sachmtr) ;
    }

    // public function unactive_sachmtr($sachmtr_id){
    //     $this->AuthLogin();
    //     DB::table('tbl_sachmuontra')->where('sachmtr_id',$sachmtr_id)->update(['sachmtr_status'=>1]);
    //     FacadesSession::put('message','An san pham thanh cong');
    //     return Redirect::to('all-sachmtr');
    // }

    // public function active_sachmtr($sachmtr_id){
    //     $this->AuthLogin();
    //     DB::table('tbl_sachmuontra')->where('sachmtr_id',$sachmtr_id)->update(['sachmtr_status' =>0]);
    //     FacadesSession::put('message','Hien thi san pham thanh cong');
    //     return Redirect::to('all-sachmtr');
    // }


    public function update_sachmtr(Request $request,$sachmtr_id){
        $this->AuthLogin();
        $data = array();
        $data['sachmtr_codemuon'] = $request->sachmtr_codemuon;
        $data['sachmtr_desc'] = $request->sachmtr_desc;
        $data['category_id'] = $request->book_cate;
        $data['nxb_id'] = $request->nxb;
        $data['tacgia_id'] = $request->tacgia;
        $data['book_id'] = $request->book;
        $data['acc_id'] = $request->acc;
        $data['sachmtr_ngaymuon'] = $request->sachmtr_ngaymuon;
        $data['sachmtr_ngaytra'] = $request->sachmtr_ngaytra;
        $data['sachmtr_status'] = $request->sachmtr_status;
        
         DB::table('tbl_sachmuontra')->where('sachmtr_id',$sachmtr_id)->update($data);
         FacadesSession::put('message','Thay doi thong tin thanh cong');
         return Redirect::to('all-sachmtr');
        
    }

    public function delete_sachmtr($sachmtr_id){
        $this->AuthLogin();
        DB::table('tbl_sachmuontra')->where('sachmtr_id',$sachmtr_id)->delete();
        FacadesSession::put('message','Xoa san pham thanh cong');
        return Redirect::to('all-sachmtr');
    }
}
