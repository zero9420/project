<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Info;
use DB;

class ReturnRecordController extends Controller
{

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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





    public function record(Request $request)
    {

    	$user_id = session('user_id');

    	$res = Info::where('info_cid',$user_id)->first();
        if (empty($res)) {
            return back();
        } else {
            // 根据当前登录用户获取shop_order 表用户ID信息  查询所有订单

        $order = DB::table('shop_order')->where('order_info_cid',$user_id)->where('order_id', 'like','%'.$request->input('order_id').'%')->paginate(10);

        // 根据查询到的所有订单 再去筛选 order_return_goods 大于1的
        $detail = [];
        foreach ($order as $k => $v) {

            $detail[] = DB::table('shop_order_detail')->where('order_id',$v->order_id)->where('order_return_goods','>=', 1)->get();
        }


        }
    	
    	return view('home.record.record',['detail'=>$detail,'res'=>$res,'title'=>'退货退款记录']);


    }
}
