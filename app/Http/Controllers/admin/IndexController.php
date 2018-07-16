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
        // 销售数量最高
        $num = Goods::orderBy('goods_sales','desc')->where('goods_status','1')->first();
        // 最受欢迎颜色和尺码
        $color = OrderDetail::pluck('goods_color');
        $size = OrderDetail::pluck('goods_size');
        foreach ($color as $c) {
            $cs[] = $c;
        }
        foreach($size as $s) {
            $ss[] = $s;
        }
        $color =array_search( max( array_count_values($cs) ),array_count_values($cs) );
        $size =array_search( max( array_count_values($ss) ),array_count_values($ss) );

        // 好评最多的
        $good = Evalua::all();
        foreach ($good as $g) {
            if($g->goods_grade >= '8.0'){
                $gid[] = $g->gid;
            }
        }
        // 好评(praise)数量
        $pnum = max( array_count_values($gid) );
        $goods_id = array_search( max( array_count_values($gid) ),array_count_values($gid) );
        $pname = Goods::where('goods_id',$goods_id)->value('goods_name');

        $arr = [];
        $arr = ['gname'=>$num['goods_name'],
                'gsales'=>$num['goods_sales'],
                'gcolor'=>$color,
                'gsize'=>$size,
                'pname'=>$pname,
                'pnum'=>$pnum
            ];
        $prompt = Goods::with('spec')->where('goods_stock','<','20')->get();
    	return view('admin.index',['title'=>'后台首页','arr'=>$arr,'prompt'=>$prompt]);

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
