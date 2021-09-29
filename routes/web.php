<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


Route::resource('posts', HomeController::class);







//Route::get('/', [HomeController::class, 'index']);
//Route::get('contact', function (){
//    $data = "<script> alert('welcome')</script>";
//    return view('contact', ['data' =>$data]);
//});
//
//Route::get('contact/{name}', function ($name){
//    return $name;
//    return view('contact', ['data' => $data]);
//});


