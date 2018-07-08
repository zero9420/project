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
    public function index(Request $request,$id)
    {
    	$cate = Cate::where('cate_pid',$id)->get();
    	$goods = Goods::where('cate_id',$id)->with('spec')->paginate(12);
    	return view('home.goods.index',['title'=>'商品列表页','cate'=>$cate,'goods'=>$goods]);
    }

}
