<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Info;
use App\Models\Admin\Cate;
use App\Models\Admin\Goods;
use App\Models\Home\OrderDetail;
use App\Models\Home\Evalua;

class IndexController extends Controller
{
    //
    public function index()
    {
        $prompt = Goods::with('spec')->where('goods_stock','<','20')->get();
        $sales = Goods::with('spec')->orderBy('goods_sales','desc')->take(5)->get();
    	return view('admin.index',['title'=>'后台首页','prompt'=>$prompt,'sales'=>$sales]);

    }


    public function UserInfo(Request $request)
    {

    	 $user = Info::where('info_name','like','%'.$request->input('search').'%')->paginate($request->input('num',3));

        $arr = ['num'=>$request->input('num'),'search'=>$request->input('search')];


    	// dd($res);

    	//显示模板
    	return view('admin.userinfo.index',['title'=>'个人信息浏览页','user'=>$user,'arr'=>$arr]);

    }
}
