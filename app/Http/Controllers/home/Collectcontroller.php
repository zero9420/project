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

		if(!empty($res)){

			//查询商品ID
			$gid = Collection::where('collection_cid',$user)->pluck('collection_gid');

			$data = Goods::with('spec')->whereIn('goods_id',$gid)	
			
			 ->where(function($query) use($request){
	               
	                $max_price = $request->input('max_price');
	                $min_price = $request->input('min_price');
	               
	                // 如果最大价格不为空
	                if(!empty($max_price)) {
	                    $query->where('goods_price','<=',$max_price);
	                }
	                // 如果最小价格不为空
	                if(!empty($min_price)) {
	                    $query->where('goods_price','>=',$min_price);
	                }
	            })

	        ->paginate(4);
			
			return view('home.collection.index',['res'=>$res,'data'=>$data,'request'=> $request]);


		}else{


			return redirect('/home/userinfo');
		}

		
		
	}



	/**
	 * 个人中心商品收藏ajax删除
	 */
	public function goods(Request $request)
	{	

		$res = $request->except('_token');
		

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
