<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use DB;
class OrderStatusController extends Controller
{
    public function status(Request $request)
    {
    		$id = $request->input('id');
    		
    		$res=['order_return_goods'=>2];
    	 $data = Order::where('order_return_goods',$id)->update($res);
    	

            if ($data) {
                return redirect('admin/order')->with('success','退款处理中...');
            } else {
                return back()->with('error','退款失败');
            } 
    }
}
