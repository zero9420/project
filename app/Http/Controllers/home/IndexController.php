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




	public function Update(Request $request, $id)
	{
		
		//表单验证
		$this->validate($request, [
           
            'info_name' => 'required',
            'info_telphone' => 'required|regex:/^1[3456789]\d{9}$/',
            'info_nickname'=> 'required|max:12|min:2',
            'info_address' => 'required',
        ],[

            'info_name.required' => '姓名不能为空',
            'info_telphone.required' => '手机号不能为空',
            'info_telphone.regex' => '手机号输入格式不正确',
            'info_nickname.required' => '昵称不能为空',
            'info_nickname.max' => '请输入2~16位的用户名',
            'info_nickname.min' => '请输入2~16位的用户名',
            'info_address.required' => '地址不能为空',

        ]);


		$res = $request->except('_token','info_image');
		
		//检测是否有上传图片
		if($request->hasfile('info_image')){

			//删除原文件
			
	        $file = Info::find($id);
	       
	        $urls = $file->info_image;

	        $info = unlink('.'.$urls);

	        if(!$info) return; 


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

			return redirect('/home/userinfo');
		}else{

			return redirect('/home/userinfo');
		}
		

	}

	

	/**
	 * 退款人信息
	 */
	  	
	public function Apply(Request $request,$id)
	{	

		// 查找个人信息ID
		$user = session('user_id');
		
		$res = Info::where('info_cid',$user)->first();

			
		// 查询登陆者有无订单
		$data = DB::table('shop_order')->where('order_info_cid',$user)->first();
		
		
		$detail = DB::table('shop_order_detail')->where('id',$id)->first();

		return view('home.apply.index',['res'=>$res,'data'=>$data,'detail'=>$detail]);


	}

	
	
	

	/**
	 * [ajax description]   接收退款信息
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function ajax(Request $request)
	{

		$ids = session('user_id');
		$id = $request->input('id');
		$status = $request->input('status');

		// 发送退货信息
		$order = DB::table('shop_order')->where('order_info_cid',$ids)->update(['order_return_goods'=>$status]);
		$detail = DB::table('shop_order_detail')->where('goods_id',$id)->update(['order_return_goods'=>$status]);
		// var_dump($goods);
		
		
		
		
	}


	/**
	 * [ajax description]   确认收货
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */

	 public function ajaxder(Request $request)
    {
    	$id = $request->input('id');
    	$order_id= $request->input('order_id');
    	

    	 $order = DB::table('shop_order')->where('order_id',$order_id)->first();
    	 $detail = DB::table('shop_order_detail')->where('id',$id)->first();

    	 
    	if ($order->order_status >= 1   && $detail->goods_status >= 1  ) {

    		DB::table('shop_order')->where('order_id',$order_id)->update(['order_status'=>2]);
    		DB::table('shop_order_detail')->where('id',$id)->update(['goods_status'=>2]);
    	} else {
    		return redirect('/home/userinfo')->with('error','商家未发货');
    	}

    	




    }




	
}
