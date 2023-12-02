<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

//BackEnd
Route::get('/adminlogin',[AdminController::class,'adminlogin'] );
Route::get('/dashboard',[AdminController::class,'showdashboard'] );
    //dang nhap trang admin
Route::post('/admin-dashboard',[AdminController::class,'dashboard'] );
    //Dang xuat
Route::get('/logout',[AdminController::class,'logout'] );