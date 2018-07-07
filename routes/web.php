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
 * 后台
 */
Route::get('/admin/login','admin\LoginController@login');
Route::post('/admin/login','admin\LoginController@dologin');
Route::any('/admin/captcha','admin\LoginController@captcha');

/**
 *
 * 后台路由组
 */

Route::group(['middleware'=>'adminlogin'],function(){

	// 后台首页
	Route::any('admin/index','admin\IndexController@index');

	// 退出登录
	Route::any('admin/outlogin','admin\LoginController@outlogin');

	// 用户管理
	Route::resource('admin/users','admin\UsersController');

	// 角色管理
	Route::resource('admin/auth','admin\AuthController');
	Route::any('admin/authpassword/{id}','admin\AuthController@authpassword');
	Route::post('admin/editpasswords','admin\AuthController@editpasswords');

	// 后台个人中心信息浏览
	Route::get('/admin/user', 'admin\IndexController@Userinfo');

	// 商品分类
	Route::resource('admin/cate','admin\CateController');

	// 商品管理
	Route::resource('admin/goods','admin\GoodsController');

	// 商品详情页ajax修改
	Route::any('/admin/ajaxsize','admin\GoodsdetailController@ajaxsize');
	Route::any('/admin/ajaxcolor','admin\GoodsdetailController@ajaxcolor');
	// 商品上架下架
	Route::any('/admin/ajaxstatus','admin\GoodsdetailController@ajaxstatus');

	// 友情链接
	Route::resource('/admin/link','admin\LinkController');

	// 广告管理
	Route::resource('/admin/position','admin\PositionController');

	// 轮播管理
	Route::resource('/admin/lunbo','admin\LunboController');

	// 订单管理
	Route::resource('/admin/order','admin\OrderController');

});





/**
 *
 * 前台
 */

// 前台首页
Route::get('/home/index','home\IndexController@Index');

// 前台登录注册模块
Route::get('/home/register','home\RegisterController@index');
Route::post('/home/registers','home\RegisterController@registers');
Route::get('/home/login','home\LoginController@index');
Route::post('/home/login','home\LoginController@login');


/**
 *
 * 前台路由组
 */

Route::group(['middleware'=>'homelogin'],function(){

	// 前台个人中心
	Route::get('/home/userinfo','home\IndexController@UserInfo');

	// 前台个人中心注册页
	Route::any('/home/userinfoma','home\IndexController@CreateUser');

	// 前台个人中心修改页
	Route::post('/home/userup/{id}','home\IndexController@Update');

	// 前台检测登陆者信息跳转页
	Route::any('/home/tiao','home\IndexController@tiao');

	// 前台退货
	Route::any('/home/apply','home\IndexController@Apply');

	//购物车
	Route::any('/home/cart','home\CartController@index');
	//购物车ajax删除
	Route::any('/home/cart/delete','home\CartController@delete');





});
