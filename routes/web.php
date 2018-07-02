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
	// 后台首页
		Route::any('admin','admin\IndexController@index');
		//角色管理
		Route::resource('admin/auth','admin\AuthController');

});







/**
 *
 * 前台路由组
 */
