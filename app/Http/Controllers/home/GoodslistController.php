<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\CateController;
use App\Models\Admin\Cate;
use App\Models\Admin\Goods;
use App\Models\Home\Cart;
use App\Models\Admin\Position;
use DB;
use App\Models\Home\Collection;
use App\Models\Home\Evalua;
use App\Models\Admin\About;

class GoodslistController extends Controller
{
    /**
     *　　　　　　　　┏┓　　　┏┓+ +
     *　　　　　　　┏┛┻━━━┛┻┓ + +
     *　　　　　　　┃　　　　　　　┃ 　
     *　　　　　　　┃　　　━　　　┃ ++ + + +
     *　　　　　　 ████━████ ┃+
     *　　　　　　　┃　　　　　　　┃ +
     *　　　　　　　┃　　　┻　　　┃
     *　　　　　　　┃　　　　　　　┃ + +
     *　　　　　　　┗━┓　　　┏━┛
     *　　　　　　　　　┃　　　┃　　　　　　　　　　　
     *　　　　　　　　　┃　　　┃ + + + +
     *　　　　　　　　　┃　　　┃　　　　Code is far away from bug with the animal protecting　　　　　　　
     *　　　　　　　　　┃　　　┃ + 　　　　神兽保佑,代码无bug　　
     *　　　　　　　　　┃　　　┃
     *　　　　　　　　　┃　　　┃　　+　　　　　　　　　
     *　　　　　　　　　┃　 　　┗━━━┓ + +
     *　　　　　　　　　┃ 　　　　　　　┣┓
     *　　　　　　　　　┃ 　　　　　　　┏┛
     *　　　　　　　　　┗┓┓┏━┳┓┏┛ + + + +
     *　　　　　　　　　　┃┫┫　┃┫┫
     *　　　　　　　　　　┗┻┛　┗┻┛+ + + +
     */
    public function shop(Request $request)
    {

        // 广告管理数据接收
        $data = Position::all();


        //前台轮播

        $res = DB::table('lunbo')->get();

        $arr = [];
        foreach ($res as $k => $v) {

            if ($v->lunbo_status == 1 ) {

                $arr[] = $v;
            }
        }
        $brr = [];
        $brr['lunbo_image1'] ='/images/lunbotupian.jpg';
        $brr['lunbo_image2'] ='/images/lunbotupian.jpg';
        $brr['lunbo_image3'] ='/images/lunbotupian.jpg';
        $brr['lunbo_image4'] ='/images/lunbotupian.jpg';
        $brr['lunbo_image5'] ='/images/lunbotupian.jpg';
        $brr['lunbo_title'] ='无轮播状态';
        $brr['lunbo_time'] = date('Y-m-d H:i:s',time());

        $brr[0]=(object)$brr;

        // 热卖商品
        $goods = Goods::with('spec')->where('goods_hot','2')->where('goods_status','1')->take(10)->get();
		return view('home.index',['title'=>'云购物商城','arr'=>$arr,'data'=>$data,'goods'=>$goods,'brr'=>$brr]);

    }
    /**
     * [index 商品列表页]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function list(Request $request)
    {
    	// 获取id
        $id = $request->input('id');

    	if (!empty($id)) {
            // 查询子分类id
            $cate = Cate::where('cate_path','like','%,'.$id.',%')->select('cate_id')->get();

            // 判断子分类
            if(empty($cate)){
                $goods = Goods::with('spec')->where('cate_id',$id)->where('goods_status','1')->paginate(12);
            } else {
                $cate_id[] = $id;
                foreach($cate as $k => $v){
                    $cate_id[] = $v->cate_id;
                }
                $goods = Goods::with('spec')->whereIn('cate_id',$cate_id)->where('goods_status','1')->paginate(12);
            }
    	} else {
    		$goods = Goods::with('spec')
        		->where(function($query) use($request){
                    // 检测关键字
                    $gname = $request->input('gname');
                    // 如果关键字不为空
                    if (!empty($gname)) {
                    	$query->where('goods_name','like','%'.$gname.'%');
                    }
                    $query->where('goods_status','1');
                })->paginate(12);
    	}
        $arr = ['id'=>$id];
            // dump($goods);
    	return view('home.goods.list',['title'=>'商品列表页',
    									'goods'=>$goods,
    									'id'=>$id,
                                        'arr'=>$arr,
                                        'request'=> $request
    								]);
    }

    /**
     * [detail 商品详情页]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function detail(Request $request,$id)
    {
        $goods = Goods::with('spec')->where('goods_id',$id)->first();
        // 取出数据拆分成数组并取出空值
        $size = array_filter(explode('|',$goods->goods_size));
        $color = array_filter(explode('|',$goods->goods_color));
        $gname = mb_substr($goods->goods_name,0,5);
        $related = Goods::with('spec')->where('goods_name','like','%'.$gname.'%')->where('goods_status','1')->take(10)->get();


        //收藏者的id
        $user = session('user_id');

        // 查询该商品信息
        $gid = Collection::where('collection_cid',$user)->pluck('collection_gid');
        $arr =  json_decode($gid);

        // 查询商品评论
        $comments = Evalua::with('evalua')->with('user')->with('order')->where('gid',$id)->get();
        return view('home.goods.detail',['title'=>'商品详情页','goods'=>$goods,'size'=>$size,'color'=>$color,'related'=>$related,'arr'=>$arr,'comments'=>$comments]);




    }

    public function ajax(Request $request)
    {
        // ajax关注收藏
        // 获取收藏商品的ID
        $id = $request->input('id');

        //收藏者的id
        $user = session('user_id');

        // 查询该商品信息
        $gid = Collection::where('collection_cid',$user)->pluck('collection_gid');


        $arr =  json_decode($gid);

        if(!in_array($id,$arr)){

             Collection::create(['collection_gid'=>$id,'collection_cid'=>$user]);

        }else{


            $data = Collection::where('collection_cid',$user)->where('collection_gid',$id)->delete();

        }
    }

    public function about()
    {
        $data = About::with('abouts')->where('status','1')->first();
        return view('home.about.index',['title'=>'关于我们','data'=>$data]);
    }

}
