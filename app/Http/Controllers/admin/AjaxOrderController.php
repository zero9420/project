<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AjaxOrderController extends Controller
{
    public function ajaxorder(Request $request)
    {
    	

    	$order = DB::table('shop_order')->where('order_id',$request->input('order_id'))->update(['order_status'=>1]);
    	$detail = DB::table('shop_order_detail')->where('order_id',$request->input('order_id'))->update(['goods_status'=>1]);

    		
    		echo $order;

    	
    }



    public function ajaxder(Request $request)
    {
    	
    }
}
