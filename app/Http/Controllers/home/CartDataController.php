<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Cart;
use App\Models\Admin\Goods;
use DB;
class CartDataController extends Controller
{
    //
    public function add($goods_id)
    {
          
           $user_id = session('user_id');
       		
       		if (empty($user_id)) {
        	
        	    echo '<script>alert("请登入账号");location.href="/home/logins";</script>';
        	}

        $res = Goods::with('spec')->where('goods_id',$goods_id)->first();
        	// dd($res);
        $goods_name = $res['goods_name'];
        $goods_pic = $res['spec'][0]['goods_pic'];
        $goods_price = $res['goods_price'];

         $ord = Cart::where('user_id',$user_id)->where('goods_id',$goods_id)->first();

          if (empty($ord)) {
          DB::table('shop_cart')->insert(['user_id'=>$user_id,'goods_id'=>$goods_id,'goods_name'=>$goods_name,'goods_pic'=>$goods_pic,'goods_price'=>$goods_price]); 
        }else{
        	DB::table('shop_cart')->where('goods_id',$goods_id)->update(['user_id'=>$user_id,'goods_id'=>$goods_id,'goods_name'=>$goods_name,'goods_pic'=>$goods_pic,'goods_price'=>$goods_price]);
        }

        return redirect('/home/cart');


    }
}
