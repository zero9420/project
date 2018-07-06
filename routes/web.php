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


Route::group([],function(){
	
	// 友情链接
	Route::resource('/admin/link','admin\LinkController');

	// 广告管理
	Route::resource('/admin/position','admin\PositionController');


	

	// 前台个人中心信息浏览
	Route::get('/admin/user', 'admin\IndexController@Userinfo');

	
});



/**
 *
 * 前台路由组
 */



Route::group([],function(){

	// 前台首页
	Route::get('/home/index','home\IndexController@Index');

	// 前台个人中心
	Route::get('/home/userinfo','home\IndexController@UserInfo');

	// 前台个人中心注册页
	Route::any('/home/userinfoma','home\IndexController@CreateUser');

	// 前台个人中心修改页
	Route::post('/home/userup/{id}','home\IndexController@Update');

	// 前台检测登陆者信息跳转页
	Route::any('/home/tiao','home\IndexController@tiao');

	//前台退货
	Route::any('/home/apply','home\IndexController@Apply');


	

});


// test测试
Route::get('/home/home',function(){


	return view('layout.homes');
});