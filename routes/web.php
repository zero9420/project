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

//后台路由组
Route::group([],function(){

	//后台首页
	Route::any('/admin/index','admin\IndexController@index');
	//友情链接
	Route::resource('/admin/link','admin\LinkController');

	//广告管理
	Route::resource('/admin/position','admin\PositionController');


});



//前台路由组
Route::group([],function(){


	Route::get('/home/index','home\IndexController@Index');
	Route::get('/home/userinfo','home\IndexController@UserInfo');
	Route::post('/home/userinfoma','home\IndexController@UpdateUser');

});


