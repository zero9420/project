<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\CateController;
use App\Models\Admin\Cate;
use App\Models\Admin\Goods;

class GoodslistController extends Controller
{
    //
    public function index(Request $request)
    {
    	// 获取id
        $path = $request->path();
    	$id = substr($path,10);
    	$id = intval($id);

    	if (!empty($id)) {
    		$goods = Goods::with('spec')->where('cate_id',$id)->paginate(12);
    	} else {
    		$goods = Goods::with('spec')
    		->where(function($query) use($request){
                // 检测关键字
                $gname = $request->input('gname');
                // 如果关键字不为空
                if (!empty($gname)) {
                	$query->where('goods_name','like','%'.$gname.'%');
                }
            })->paginate(12);
    	}
            // dump($goods);
    	return view('home.goods.index',['title'=>'商品列表页',
    									'goods'=>$goods,
    									'id'=>$id,
                                        'request'=> $request
    								]);
    }

}
