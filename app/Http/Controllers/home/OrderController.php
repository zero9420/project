<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Info;
use DB;
class OrderController extends Controller
{
    public function order()
    {	
    	$user = session('user_id');

    	$res = Info::where('info_id',$user)->first();

    	
    	

    	return view('home.order.order',[
    		'title'=>'我的订单',

    		'res'=>$res


    	]);
    }
}
