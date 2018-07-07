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
    	//渲染购物车
    	$data = Cart::all();
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
}
