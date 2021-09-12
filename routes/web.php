<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index']);
Route::view('register','register');
Route::view('login','login');
Route::post('register',[UsersController::class,'register']);
Route::post('login',[UsersController::class,'login']);
Route::get('/logout',function(){
    Session::forget('user');
    return redirect('/login');
});
Route::get('/adminlogin',[UsersController::class,'adminlogin']);
Route::get('/deleteuser/{id}',[UsersController::class,'deleteuser']);
Route::get('/addfoodmenu',[AdminController::class,'getfoodmenu']);
Route::post('addfoodmenu',[AdminController::class,'index']);
Route::get('editfoodmenu/{id}',[AdminController::class,'editfoodmenu']);
Route::get('deletefoodmenu/{id}',[AdminController::class,'deletefoodmenu']);
Route::post('updatefoodmenu',[AdminController::class,'updatefoodmenu']);
Route::post('storereservation',[HomeController::class,'storereservation']);
Route::get('getreservation',[AdminController::class,'getreservation']);
Route::get('chef',[AdminController::class,'chef']);
Route::post('addchef',[AdminController::class,'addchef']);
Route::get('editchef/{id}',[AdminController::class,'editchef']);
Route::post('updatechef',[AdminController::class,'updatechef']);
Route::get('deletechef/{id}',[AdminController::class,'deletechef']);
Route::post('addtocart',[HomeController::class,'addtocart']);
Route::get('cart',[HomeController::class,'cart']);
Route::get('removecart/{id}',[HomeController::class,'removecart']);
Route::post('order',[HomeController::class,'order']);
Route::get('getorders',[AdminController::class,'getorders']);
Route::post('search/',[AdminController::class,'search']);








