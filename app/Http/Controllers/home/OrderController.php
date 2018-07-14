<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Info;
use App\Models\Home\OrderDetail;
use DB;
use App\Models\Home\Evalua;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $user = session('user_id');

        $res = Info::where('info_id',$user)->first();

        $ord = DB::table('shop_order')->where('order_info_cid',$user)->paginate(3);

        $order = [];

        $name = $request->input('goods_name');

        if(!empty($name)){

            foreach ($ord as $k => $v) {

                $order[] = DB::table('shop_order_detail')->where('order_id',$v->order_id)->where('goods_name','like','%'.$name.'%')->get();

            }
        } else {
            foreach ($ord as $k => $v) {
                $order[] = DB::table('shop_order_detail')->where('order_id',$v->order_id)->get();
            }
        }

        return view('home.order.order',[
            'title'=>'我的订单',
            'res'=>$res,
            'order'=>$order,
            'ord'=>$ord
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = session('user_id');
        $res =DB::table('shop_order')->where('order_info_cid',$user)->first();

        $data = DB::table('shop_order_detail')->where('id',$id)->first();
        // 获取订单号
        $oid = $data->order_id;
        // 获取商品id
        $gid = $data->goods_id;
        // 获取评价
        $comments = Evalua::where('uid',$user)->where('oid',$oid)->where('gid',$gid)->first();

        return view('home.order.details',[
            'title'=>'订单详情',
            'res'=>$res,
            'data'=>$data,
            'comments'=>$comments

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
