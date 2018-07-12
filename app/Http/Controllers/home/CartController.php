<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Cart;
use DB;
class CartController extends Controller
{
    /**
     * 购物车模块
     */ 
    public function index()
    {	
        // session判断当前用户是否登陆
    
        $user_id = session('user_id');
        if (empty($user_id)) {
            echo '<script>alert("请登入账号");location.href="/home/logins";</script>';
        }


    	//渲染购物车
    	$data = Cart::where('user_id',$user_id)->get();
    	// dd($data);
    	return view('home.cart.index',['data'=>$data]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        Cart::where('id',$id)->delete();
        $count = DB::table('shop_cart')->count();
        echo $count;
    }

    public function jiajian(Request $request)
    {
        $id = $request->input('id');
         $num = $request->input('num');

        Cart::where('id',$id)->update(['num'=>$num]);
    }

    public function total(Request $request)
    {
        $total = $request->input('total');
        // dump($total);
        // Cart::where('')
    }
}
