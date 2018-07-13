<?php

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

	// 定义热卖商品
	Route::any('/admin/ajaxhot','admin\GoodsdetailController@ajaxhot');
	// 商品减价
	Route::any('/admin/ajaxuct','admin\GoodsdetailController@ajaxuct');

	// 友情链接
	Route::resource('/admin/link','admin\LinkController');

	// 广告管理
	Route::resource('/admin/position','admin\PositionController');

	// 轮播管理
	Route::resource('/admin/lunbo','admin\LunboController');

	// 订单管理
	Route::resource('/admin/order','admin\OrderController');

	// 退款处理
	Route::any('/admin/orderstatus','admin\OrderStatusController@status');

	// 商城快讯
	Route::resource('/admin/express','admin\ExpressController');


});





/**
 *
 * 前台
 */

// 前台首页
Route::any('/','home\GoodslistController@shop');
Route::any('/goodslist','home\GoodslistController@list');
Route::any('/goodsdetail/{id}','home\GoodslistController@detail')->where(['id'=>'\d+']);

// 前台登录注册模块
Route::get('/home/register','home\RegisterController@index');
Route::post('/home/registers','home\RegisterController@registers');
Route::get('/home/logins','home\LoginController@index');
Route::post('/home/logins','home\LoginController@login');




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
	//购物车加减ajax
	Route::any('/home/cart/jiajian','home\CartController@jiajian');
	//购物车总价ajax
	Route::any('/home/cart/total','home\CartController@total');
	//购物车存储
	Route::any('/home/cart/{goods_id}','home\CartDataController@add');


	// 前台订单页
	Route::resource('/home/order','home\OrderController');



	// 前台结算页
	Route::resource('/home/jsy','home\JsyController');

	// 前台退款
	Route::any('/home/ajax','home\IndexController@ajax');

	// 商城快讯
	Route::any('/home/express','home\ExpressController@express');

	// 个人中心我的收藏
	Route::any('/home/collection','home\CollectController@index');

	// ajax商品收藏
	Route::any('/home/back','home\GoodslistController@ajax');

	// 个人中心商品收藏删除
	Route::any('/home/goods','home\CollectController@goods');
});
