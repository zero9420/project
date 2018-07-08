<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\CateController;
use App\Models\Admin\Cate;
use App\Models\Admin\Goods;

class GoodsController extends Controller
{
    //
    public function index($id)
    {
    	$cate = Cate::where('cate_pid',$id)->get();
    	$goods = Goods::where('cate_id',$id)->with('spec')->paginate(12);
    	// dd($goods);
    	return view('home.goods.index',['title'=>'商品列表页','cate'=>$cate,'goods'=>$goods]);
    }

    /**
     * [priceajax 商品详情页价格区间]
     * @return [type] [description]
     */
    public function priceajax(Request $request)
    {
    	$price = $request -> input('price');
    	echo $price;
    }
}
