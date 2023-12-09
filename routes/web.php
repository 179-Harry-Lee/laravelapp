<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
    
    //dang nhap trang admin
Route::post('/user-home',[HomeController::class,'homeUser'] );




//BackEnd
Route::get('/adminlogin',[AdminController::class,'adminlogin'] );
Route::get('/dashboard',[AdminController::class,'showdashboard'] );

    //dang nhap trang admin
Route::post('/admin-dashboard',[AdminController::class,'dashboard'] );

    //Dang xuat
Route::get('/logout',[AdminController::class,'logout'] );

    //Danh muc tai khoan
    Route::get('/add-account',[AccountController::class,'add_account'] );


    Route::get('/all-account',[AccountController::class,'all_account'] );
    
    
    Route::post('/save-account',[AccountController::class,'save_account'] );
    
        //Hien thi loai tai khoan trong trang xuat danh muc tai khoanr
    Route::get('/unactive-account/{acc_id}',[AccountController::class,'unactive_account'] );
    Route::get('/active-account/{acc_id}',[AccountController::class,'active_account'] );
        
    
        //Cap nhat danh muc tai khoan
    Route::get('/edit-account/{acc_id}',[AccountController::class,'edit_account'] );
    
    Route::post('/update-account/{acc_id}',[AccountController::class,'update_account'] );
    
    
    Route::get('/delete-account/{acc_id}',[AccountController::class,'delete_account'] );



    //Danh muc san pham
Route::get('/add-category-product',[CategoryProduct::class,'add_category_product'] );
Route::get('/all-category-product',[CategoryProduct::class,'all_category_product'] );
Route::post('/save-category-product',[CategoryProduct::class,'save_category_product'] );

    //Hien thi icon trong trang xuat danh muc san pham
Route::get('/unactive-category-product/{category_product_id}',[CategoryProduct::class,'unactive_category_product'] );
Route::get('/active-category-product/{category_product_id}',[CategoryProduct::class,'active_category_product'] );
    //Cap nhat danh muc san pham
Route::get('/edit-category-product/{category_product_id}',[CategoryProduct::class,'edit_category_product'] );

Route::post('/update-category-product/{category_product_id}',[CategoryProduct::class,'update_category_product'] );


Route::get('/delete-category-product/{category_product_id}',[CategoryProduct::class,'delete_category_product'] );


    //San pham
Route::get('/add-product',[ProductController::class,'add_product'] );
Route::post('/save-product',[ProductController::class,'save_product'] );

    //Cap nhat san pham
Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product'] );
Route::get('/all-product',[ProductController::class,'all_product'] );
Route::post('/update-product/{product_id}',[ProductController::class,'update_product'] );
Route::get('/delete-product/{product_id}',[ProductController::class,'delete_product'] );

    
    //Hien thi icon trang xuan san pham
Route::get('/unactive-product/{product_id}',[ProductController::class,'unactive_product'] );
Route::get('/active-product/{product_id}',[ProductController::class,'active_product'] );

