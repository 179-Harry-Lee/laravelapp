<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminAccController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NxbController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SachmtrController;
use App\Http\Controllers\TacgiaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//FrontEnd
Route::get("/", [HomeController::class,'index']);
Route::get('/trangchu',[HomeController::class,'index'] );

    // Login user
Route::get('/login',[HomeController::class,'login'] );

    // Logout user
Route::get('/userlogout',[HomeController::class,'userlogout'] );
    
    //dang nhap trang user
Route::post('/user-home',[HomeController::class,'homeUser'] );

    //dang ky trang user
Route::get('/register',[HomeController::class,'register'] );
Route::post('/save-register',[HomeController::class,'save_register'] );




//BackEnd
Route::get('/adminlogin',[AdminController::class,'adminlogin'] );
Route::get('/dashboard',[AdminController::class,'showdashboard'] );

    //dang nhap trang admin
Route::post('/admin-dashboard',[AdminController::class,'dashboard'] );

    //Dang xuat
Route::get('/logout',[AdminController::class,'logout'] );

    //danh muc tai khoan nhan vien
    Route::get('/add-admin',[AdminAccController::class,'add_admin'] );

    Route::get('/all-admin',[AdminAccController::class,'all_admin'] );
    
    
    Route::post('/save-admin',[AdminAccController::class,'save_admin'] );


    Route::get('/edit-admin/{admin_id}',[AdminAccController::class,'edit_admin'] );

    Route::post('/update-admin/{admin_id}',[AdminAccController::class,'update_admin'] );
    
    
    Route::get('/delete-admin/{admin_id}',[AdminAccController::class,'delete_admin'] );




    //Danh muc tai khoan
    Route::get('/add-account',[AccountController::class,'add_account'] );


    Route::get('/all-account',[AccountController::class,'all_account'] );
    
    
    Route::post('/save-account',[AccountController::class,'save_account'] );
    
        //Hien thi loai tai khoan trong trang xuat danh muc tai khoan
    Route::get('/unactive-account/{acc_id}',[AccountController::class,'unactive_account'] );
    Route::get('/active-account/{acc_id}',[AccountController::class,'active_account'] );
        
    
        //Cap nhat danh muc tai khoan
    Route::get('/edit-account/{account_id}',[AccountController::class,'edit_account'] );
    
    Route::post('/update-account/{account_id}',[AccountController::class,'update_account'] );
    
    
    Route::get('/delete-account/{account_id}',[AccountController::class,'delete_account'] );



    //Danh muc san pham
Route::get('/add-category-book',[CategoryProduct::class,'add_category_book'] );
Route::get('/all-category-book',[CategoryProduct::class,'all_category_book'] );
Route::post('/save-category-book',[CategoryProduct::class,'save_category_book'] );

    //Hien thi icon trong trang xuat danh muc san pham
Route::get('/unactive-category-book/{category_id}',[CategoryProduct::class,'unactive_category_book'] );
Route::get('/active-category-book/{category_id}',[CategoryProduct::class,'active_category_book'] );
    //Cap nhat danh muc san pham
Route::get('/edit-category-book/{category_id}',[CategoryProduct::class,'edit_category_book'] );

Route::post('/update-category-book/{category_id}',[CategoryProduct::class,'update_category_book'] );


Route::get('/delete-category-book/{category_id}',[CategoryProduct::class,'delete_category_book'] );


    //San pham
Route::get('/add-book',[ProductController::class,'add_book'] );
Route::post('/save-book',[ProductController::class,'save_book'] );

    //Cap nhat san pham
Route::get('/edit-book/{book_id}',[ProductController::class,'edit_book'] );
Route::get('/all-book',[ProductController::class,'all_book'] );
Route::post('/update-book/{book_id}',[ProductController::class,'update_book'] );
Route::get('/delete-book/{book_id}',[ProductController::class,'delete_book'] );

    
    //Hien thi icon trang xuan san pham
Route::get('/unactive-book/{book_id}',[ProductController::class,'unactive_book'] );
Route::get('/active-book/{book_id}',[ProductController::class,'active_book'] );



    //Danh sach Nha xuat ban
Route::get('/all-nxb',[NxbController::class,'all_nxb'] );
Route::get('/add-nxb',[NxbController::class,'add_nxb'] );
Route::post('/save-nxb',[NxbController::class,'save_nxb'] );

Route::get('/edit-nxb/{nxb_id}',[NxbController::class,'edit_nxb'] );
    
Route::post('/update-nxb/{nxb_id}',[NxbController::class,'update_nxb'] );


Route::get('/delete-nxb/{nxb_id}',[NxbController::class,'delete_nxb'] );



    //Danh sach Tac gia
Route::get('/all-tacgia',[TacgiaController::class,'all_tacgia'] );
Route::get('/add-tacgia',[TacgiaController::class,'add_tacgia'] );
Route::post('/save-tacgia',[TacgiaController::class,'save_tacgia'] );

Route::get('/edit-tacgia/{tacgia_id}',[TacgiaController::class,'edit_tacgia'] );
    
Route::post('/update-tacgia/{tacgia_id}',[TacgiaController::class,'update_tacgia'] );


Route::get('/delete-tacgia/{tacgia_id}',[TacgiaController::class,'delete_tacgia'] );

Route::get('/unactive-tacgia/{tacgia_id}',[TacgiaController::class,'unactive_tacgia'] );
Route::get('/active-tacgia/{tacgia_id}',[TacgiaController::class,'active_tacgia'] );



    //Muon tra sach
Route::get('/all-sachmtr',[SachmtrController::class,'all_sachmtr'] );
Route::get('/add-sachmtr',[SachmtrController::class,'add_sachmtr'] );
Route::post('/save-sachmtr',[SachmtrController::class,'save_sachmtr'] );

Route::get('/edit-sachmtr/{sachmtr_id}',[SachmtrController::class,'edit_sachmtr'] );
    
Route::post('/update-sachmtr/{sachmtr_id}',[SachmtrController::class,'update_sachmtr'] );


Route::get('/delete-sachmtr/{sachmtr_id}',[SachmtrController::class,'delete_sachmtr'] );