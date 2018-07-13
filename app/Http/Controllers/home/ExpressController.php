<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Express;
use App\Models\Home\Info;
class ExpressController extends Controller
{
    public function express(Request $request)
    {
    	
    	$user = session('user_id');

    	$data = Info::where('info_id',$user)->first(); 
    	
    	$res = Express::where('express_title','like','%'.$request->input('express_title').'%')->paginate(8);

    	return view('home/express/express',[
    		'title'=>'商城快讯',
    		'res'=>$res,
    		'data'=>$data

    	]);
    }
}
