<?php

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

Route::get('/', function () {
    return view('welcome');
});

/**
 *
 * 后台路由组
 */


Route::group(['middleware'=>'adminlogin'],function(){

	// 轮播管理
	Route::resource('admin/lunbo','admin\LunboController');


	// 订单管理

	Route::resource('admin/order','admin\OrderController');
});



/**
 *
 * 前台路由组
 */



Route::group([],function(){

	


});


// test测试
Route::get('/home/home',function(){


	session(['id'=>18]);
});