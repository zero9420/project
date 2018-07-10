<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\CateController;
use App\Models\Admin\Cate;
use App\Models\Admin\Goods;

class GoodslistController extends Controller
{
    /**
     * [index 商品列表页]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function index(Request $request)
    {
    	// 获取id
        $path = $request->path();
    	$id = substr($path,10);
    	$id = intval($id);

    	if (!empty($id)) {
    		$goods = Goods::with('spec')->where('cate_id',$id)->where('goods_status','1')->paginate(12);
    	} else {
    		$goods = Goods::with('spec')
    		->where(function($query) use($request){
                // 检测关键字
                $gname = $request->input('gname');
                // 如果关键字不为空
                if (!empty($gname)) {
                	$query->where('goods_name','like','%'.$gname.'%');
                }
            })->where('goods_status','1')->paginate(12);
    	}
            // dump($goods);
    	return view('home.goods.index',['title'=>'商品列表页',
    									'goods'=>$goods,
    									'id'=>$id,
                                        'request'=> $request
    								]);
    }

    /**
     * [detail 商品详情页]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function detail($id)
    {
        $goods = Goods::with('spec')->where('goods_id',$id)->first();
        $size = explode('|',$goods->goods_size);
        $color = explode('|',$goods->goods_color);
        $gname = mb_substr($goods->goods_name,0,5);
        $related = Goods::with('spec')->where('goods_name','like','%'.$gname.'%')->take(10)->get();
        return view('home.goods.detail',['title'=>'商品详情页','goods'=>$goods,'size'=>$size,'color'=>$color,'related'=>$related]);
    }


}
