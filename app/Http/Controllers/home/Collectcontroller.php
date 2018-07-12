<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Info;
use App\Models\Home\Collection;
use App\Models\Admin\Goods;
use App\Models\Admin\GoodsSpec;

class Collectcontroller extends Controller
{
    /**
	 * 个人中心我的收藏
	 */
	public function index(Request $request)
	{

		// 查找个人信息ID
		$user = session('user_id');
		
		$res = Info::where('info_cid',$user)->first();

		//查询商品ID
		$gid = Collection::where('collection_cid',$user)->pluck('collection_gid');
		session(['gid'=>$gid]);


		$data = Goods::with('spec')->whereIn('goods_id',$gid)->paginate(4);	
	
		
		return view('home.collection.index',['res'=>$res,'data'=>$data]);

		
	}


	/**
	 * ajax接收数据关注收藏
	 */
	public function collect(Request $request)
	{

		// 获取收藏商品的ID
		$id = $request->input('id');

		//收藏者的id
		$user = session('user_id');

		// 查询该商品信息
		Collection::create(['collection_gid'=>$id,'collection_cid'=>$user]);

		$gid = Collection::where('collection_cid',$user)->pluck('collection_gid');
		session(['gid'=>$gid]);




	}


	/**
	 * ajax接收数据取消收藏
	 */

	public function back(Request $request)
	{

		// 获取收藏商品的ID
		$id = $request->input('id');

		//收藏者的id
		$user = session('user_id');

		$data = Collection::where('collection_cid',$user)->where('collection_gid',$id)->delete();

		$gid = Collection::where('collection_cid',$user)->pluck('collection_gid');
		session(['gid'=>$gid]);

		
	}

	/**
	 * 个人中心商品收藏ajax删除
	 */
	public function goods(Request $request)
	{	

		$res = $request->except('_token');
		
		// dd($res);
		if(!empty($res)){

			$data = Collection::whereIn('collection_gid',$res['gid'])->delete();
			if($data){

				return redirect('/home/collection')->with('success',"删除成功");
			}else{
				return redirect('/home/collection')->with('error',"删除失败!!");
			}

		}else{

			return redirect('/home/collection')->with('error',"请选择删除对象!!");

		}
		

	}



	

	
}
