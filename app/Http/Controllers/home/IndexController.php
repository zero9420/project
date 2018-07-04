<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Position;
use App\Models\Home\Info;
use Config;
use App\Http\Requests\UserRequest;

class IndexController extends Controller
{
    	
		public function Index(Request $request)
		{


			//友情链接数据接收
			$res = DB::select('select * from shop_link ');

			//广告管理数据接收
			$data = Position::all();
	
			//显示模板分配数据
			return view('home.index.index',['res'=>$res,'data'=>$data]);


		}

		/**
		 * 检测登陆者信息
		 */
		public function UserInfo()
		{	

			//检测用户信息
			
			$user = session('id');
					
			// //显示页面
			$mation = Info::where('info_cid',$user)->first();
			
			// dd($mation);
			if($mation !== null){


			   return redirect('/home/tiao');

			}else{

				return view('home.userinfo.index');
			

			}

		}


		public function tiao()
		{

			$user = session('id');

			$mation = Info::where('info_cid',$user)->first();

			return view('home.userinfo.edit',['mation'=>$mation]);
		}

		/**
		 * 修改登录者信息
		 */

		public function CreateUser(Request $request)
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

			
				$res['info_cid'] =  session('id');
				
				$data = Info::create($res);
			
				if($data){

					return back();
				}


				

		}


		public function Update(Request $request, $id)
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

				
				$data = Info::where('info_id',$id)->update($res);
			
				if($data){

					return back();
				}


				

		}
    	
}
