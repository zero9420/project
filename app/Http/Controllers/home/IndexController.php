<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Position;
use App\Models\Home\Info;
use Config;

class IndexController extends Controller
{
    	
		public function Index(Request $request)
		{


			//友情链接数据接收
			$res = DB::select('select * from shop_link ');

			//广告管理数据接收
			$data = Position::all();

			// dd($data);
			
			//显示模板分配数据
			return view('home.index.index',['res'=>$res,'data'=>$data]);


		}

		/**
		 * 检测登陆者信息
		 */
		public function UserInfo()
		{

			//显示页面
			return view('home.userinfo.index');
		}


		/**
		 * 修改登录者信息
		 */

		public function UpdateUser(Request $request)
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

				//存入数据库
				$data = Info::create($res);

				if($data){

					return back();
				}

		}
    	
}
