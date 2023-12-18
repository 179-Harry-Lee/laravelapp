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
    public function add_book(){
        $this->AuthLogin();
        $cate_book = DB::table('tbl_category_book')->orderby('category_id','desc')->get();
        $nxb = DB::table('tbl_nxb')->orderby('nxb_id','desc')->get();
        $tacgia = DB::table('tbl_tacgia')->orderby('tacgia_id','desc')->get();
        return view('add_book')->with('cate_book',$cate_book)->with('nxb',$nxb)->with('tacgia',$tacgia);
    }

    public function save_book(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['book_name'] = $request->book_name;
        $data['book_desc'] = $request->book_desc;
        $data['category_id'] = $request->book_cate;
        $data['nxb_id'] = $request->nxb;
        $data['tacgia_id'] = $request->tacgia;
        $data['book_status'] = $request->book_status;

        $get_image =$request->file('book_image');

        if($get_image){
            // Lay duoi .jpg
        $get_name_image = $get_image->getClientOriginalName();
        // Ham Current giup phan tach ten vaf duoi jpg
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('upload/book',$new_image);
        $data['book_image'] = $new_image;
        DB::table('tbl_book')->insert($data);
        FacadesSession::put('message','them sach thanh cong');
        return Redirect::to('add-book');
        }
        $data['book_image'] ='';
         DB::table('tbl_book')->insert($data);
         FacadesSession::put('message','Them sach thanh cong');
         return Redirect::to('all-book');
    }


    public function edit_book($book_id){
        $this->AuthLogin();
        $cate_book = DB::table('tbl_category_book')->orderby('category_id','desc')->get();
        $nxb = DB::table('tbl_nxb')->orderby('nxb_id','desc')->get();
        $tacgia = DB::table('tbl_tacgia')->orderby('tacgia_id','desc')->get();
        

        $edit_book = DB::table('tbl_book')->where('book_id',$book_id)->get() ;

        $manager_book = view('edit_book')->with('edit_book',$edit_book)->with('cate_book',$cate_book)->with('nxb',$nxb)->with('tacgia',$tacgia) ;
        return view('adminform')->with('edit_book',$manager_book) ;
    }


    public function all_book(){
        $this->AuthLogin();
        $all_book = DB::table('tbl_book')
        ->join('tbl_category_book','tbl_category_book.category_id','=','tbl_book.category_id')
        ->join('tbl_nxb','tbl_nxb.nxb_id','=','tbl_book.nxb_id')
        ->join('tbl_tacgia','tbl_tacgia.tacgia_id','=','tbl_book.tacgia_id')
        ->orderBy('tbl_book.book_id','desc')->get();
        
        $manager_book = view('all_book')->with('all_book',$all_book) ;
        return view('adminform')->with('all_book',$manager_book) ;
    }

    public function unactive_book($book_id){
        $this->AuthLogin();
        DB::table('tbl_book')->where('book_id',$book_id)->update(['book_status'=>1]);
        FacadesSession::put('message','An sach thanh cong');
        return Redirect::to('all-book');
    }

    public function active_book($book_id){
        $this->AuthLogin();
        DB::table('tbl_book')->where('book_id',$book_id)->update(['book_status' =>0]);
        FacadesSession::put('message','Hien thi sach thanh cong');
        return Redirect::to('all-book');
    }


    public function update_book(Request $request,$book_id){
        $this->AuthLogin();
        $data = array();
        $data['book_name'] = $request->book_name;
        $data['book_desc'] = $request->book_desc;
        $data['category_id'] = $request->book_cate;
        $data['nxb_id'] = $request->nxb;
        $data['tacgia_id'] = $request->tacgia;
        $data['book_status'] = $request->book_status;
        $get_image =$request->file('book_image');

        if($get_image){
            // Lay duoi .jpg
        $get_name_image = $get_image->getClientOriginalName();
        // Ham Current giup phan tach ten vaf duoi jpg
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('upload/book',$new_image);
        $data['book_image'] = $new_image;
        DB::table('tbl_book')->where('book_id',$book_id)->update($data);
        FacadesSession::put('message','them sach thanh cong');
        return Redirect::to('add-book');
        }
        
         DB::table('tbl_book')->where('book_id',$book_id)->update($data);
         FacadesSession::put('message','Them sach thanh cong');
         return Redirect::to('all-book');
        
    }

    public function delete_book($book_id){
        $this->AuthLogin();
        DB::table('tbl_book')->where('book_id',$book_id)->delete();
        FacadesSession::put('message','Xoa sach thanh cong');
        return Redirect::to('all-book');
    }
}
