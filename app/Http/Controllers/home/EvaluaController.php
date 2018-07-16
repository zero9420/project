<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Evalua;
use App\Models\Admin\Goods;
use DB;

class EvaluaController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    	$goods = DB::table('shop_order_detail')->where('goods_id',$id)->first();
    	// dd($goods);
        return view('home.eval.add',['title'=>'商品评价页','goods'=>$goods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        // 表单验证
        $this->validate($request, [
            'goods_grade' => 'required',
            'comments'=>'max:120',
            'eval_pic'=>'max:5',
        ],[
            'goods_grade.required'=>'商品星级评价不能为空',
            'comments.max'=>'商品评价最多120字!',
            'eval_pic.max'=>'商品图片最多5张',

        ]);
        $res = $request->except('_token','_method','eval_pic');

        // 获取用户id
        $res['uid'] = session('user_id');

        // 存入评价主表
        $data_eval = Evalua::create($res);
        // 获取评价id
        $eid = $data_eval->eid;

        // 商品评价图片
        if($request->hasFile('eval_pic')){

            $req = $request->file('eval_pic');

            $eval_pic= [];

            foreach($req as $k => $v){

                $e_pic = [];

                // 设置名字
                $name = date('Y-m-d-H-i-s',time()).str_random(10);

                // 获取后缀
                $suffix = $v->getClientOriginalExtension();

                // 移动
                $v->move('./uploads/goods/pingjia/',$name.'.'.$suffix);

                // 添加评价id
                $e_pic['eid'] = $eid;

                // 添加评论图片
                $e_pic['eval_pic'] = '/uploads/goods/pingjia/'.$name.'.'.$suffix;

                // 存入二维数组
                $eval_pic[] = $e_pic;

            }
            $eval = Evalua::find($eid);
            //模型
            try{
                // 存入数据库
                $data = $eval->evalua()->createMany($eval_pic);
                if($data){
                    return redirect('/home/myeval')->with('success','评价成功!');
                }
            }catch(\Exception $e){
                return back()->with('error','评价失败!');
            }
        } else {
            try{
                if($data_eval){
                    return redirect('/home/myeval')->with('success','评价成功!');
                }
            }catch(\Exception $e){
                return back()->with('error','评价失败!');

            }
        }
    }
    /**
     * [myeval 我的评价]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function read(Request $request)
    {
    	$uid = session('user_id');
    	$data = Evalua::with('evalua')->with('order')->where('uid',$uid)->get();
    	$user = DB::table('shop_info')->where('info_cid',$uid)->first();
    	// 获取商品详情
    	foreach ($data as $k => $v) {
    		$goods[] = Goods::with('spec')->where('goods_id',$v->order->goods_id)->where('goods_status','1')->first();
    	}
        $goods = array_filter($goods);
    	return view('home.eval.index',['title'=>'评论页','data'=>$data,'user'=>$user,'goods'=>$goods]);
    }
}
