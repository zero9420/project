<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Cart;
use App\Models\Home\Info;
use App\Models\Admin\Goods;
use DB;

class JsyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = session('user_id');

        $cart = Cart::where('user_id',$user)->get();


        $info = Info::where('info_cid',$user)->first();

        
       return view('home/jsy/jsy',[
        'info'=>$info,
        'cart'=>$cart

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
        //接收表单过来的值 主表
       $req = $request->except('_token','Checkout');

        //获取购物车信息 插入附表
        $cart = Cart::where('user_id',session('user_id'))->get();

        $date = date('Ymd',time()).rand(6666,8888);
        $req['order_id'] = $date;

        $req['order_info_cid'] = session('user_id');
        $req['order_create_time'] = date('Y-m-d H:i:s',time());
        $req['order_update_time'] = date('Y-m-d H:i:s',time());

        $order = DB::table('shop_order')->insert([$req]);

       // 一对多 遍历到附表

       foreach ($cart as $key => $v) {
          $res = DB::table('shop_order_detail')->insert(
                [
                    'goods_name'=>$v->goods_name,
                    'num' => $v->num,
                    'goods_price' => $v->goods_price,
                    'order_id'=> $req['order_id'],
                    'goods_id'=>$v->goods_id,
                    'goods_pic'=>$v->goods_pic,
                    'goods_color'=>$v->goods_color,
                    'goods_size'=>$v->goods_size,
                    'goods_status'=> 0


                ]
            );
       }

        // 遍历修改商品销量和库存
        foreach ($cart as $kn => $vn) {
            $sales = Goods::where('goods_id',$vn->goods_id)->increment('goods_sales',$vn->num);
            $stock = Goods::where('goods_id',$vn->goods_id)->decrement('goods_stock',$v->num);
        }


        $ord = DB::table('shop_order')->where('order_info_cid',session('user_id'))->first();

        $der = DB::table('shop_order_detail')->where('order_id',$ord->order_id)->get();

        return view('home/jsy/save',['ord'=>$ord,'der'=>$der]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
