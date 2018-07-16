<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Info;
use Config;
use App\Http\Requests\UserRequest;
use App\Models\Home\Apply;
use DB;
class IndexController extends Controller
{

	/**
	 * 检测登陆者信息
	 */
	public function UserInfo()
	{

		// 检测用户信息

		$user = session('user_id');

		
		// 显示页面
		$mation = Info::where('info_cid',$user)->first();

		if($mation !== null){


		   return redirect('/home/tiao');

		}else{

			return view('home.userinfo.index');


		}

	}



	/**
	 * 已注册用户跳转
	 * @return [type] [description]
	 */


	public function tiao()
	{

		$user = session('user_id');

		$mation = Info::where('info_cid',$user)->first();

		return view('home.userinfo.edit',['mation'=>$mation]);
	}

	/**
	 * 修改登录者信息
	 */

	public function CreateUser(UserRequest $request)
	{
				

		$res = $request->except('_token','info_image');
	
		
		//检测是否有上传图片
		if($request->hasfile('info_image')){

			//设置名字
			$name = str_random(6).time();


			//获取后缀名
			$suffix = $request->file('info_image')->getClientOriginalExtension();

			//移动
			$request->file('info_image')->move('./userinfo/',$name.'.'.$suffix);
		}


		//存入数据表
		$res['info_image'] = Config::get('app.address').$name.'.'.$suffix;

	
		$res['info_cid'] =  session('user_id');
		
		$data = Info::create($res);
	
		if($data){

			return back();
		}
			

	}




	public function Update(UserRequest $request, $id)
	{
			
		$res = $request->except('_token','info_image');
		
		//检测是否有上传图片
		if($request->hasfile('info_image')){


			//设置名字
			$name = str_random(6).time();


			//获取后缀名
			$suffix = $request->file('info_image')->getClientOriginalExtension();

			//移动
			$request->file('info_image')->move('./userinfo/',$name.'.'.$suffix);

			//存入数据表
			$res['info_image'] = Config::get('app.address').$name.'.'.$suffix;
			
			
		}

		
		$data = Info::where('info_id',$id)->update($res);
	
		if($data){

			return back();
		}else{

			return redirect('/home/userinfo');
		}
		

	}

	

	/**
	 * 退款人信息
	 */
	  	
	public function Apply(Request $request)
	{	
		// 查找个人信息ID
		$user = session('user_id');
		
		$res = Info::where('info_cid',$user)->first();


		if(!empty($res)){
			
			// 查询登陆者有无订单
			$data = DB::table('shop_order')->where('order_info_cid',$user)->first();

			if(empty($data)){

				return view('home.apply.none',['res'=>$res]);
			}else{

				$order = DB::table('shop_order_detail')->where('order_id',$data->order_id)->get();

				return view('home.apply.index',['res'=>$res,'data'=>$data,'order'=>$order]);
			}
		}else{

			return redirect('/home/userinfo');
		}

	}

	
	

	/**
	 * [ajax description]   接收退款信息
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function ajax(Request $request)
	{

	
		$id = $request->input('id');
		$status = $request->input('status');

		// 发送退货信息
		$goods = DB::table('shop_order_detail')->where('goods_id',$id)->update(['order_return_goods'=>$status]);
		// var_dump($goods);
		
		
		
		
	}




	
}
