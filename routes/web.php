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


Route::get('/admin/login','admin\LoginController@login');
Route::post('/admin/login','admin\LoginController@dologin');
Route::any('/admin/captcha','admin\LoginController@captcha');
Route::group(['middleware'=>'adminlogin'],function(){
	// 后台首页
	Route::any('admin/index','admin\IndexController@index');
	//退出登录
	Route::any('admin/outlogin','admin\LoginController@outlogin');

	
	//用户管理
	Route::resource('admin/users','admin\UsersController');
	// 角色管理
	Route::resource('admin/auth','admin\AuthController');
	Route::any('admin/authpassword/{id}','admin\AuthController@authpassword');
	Route::post('admin/editpasswords','admin\AuthController@editpasswords');


});


//前台登录注册模块
Route::get('/home/register','home\RegisterController@index');
Route::post('/home/registers','home\RegisterController@registers');
Route::get('/home/login','home\LoginController@index');
Route::post('/home/login','home\LoginController@login');


//前台路由组
Route::group(['middleware'=>'homelogin'],function(){


});
