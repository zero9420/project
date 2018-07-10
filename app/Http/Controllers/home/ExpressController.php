<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Express;
class ExpressController extends Controller
{
    public function express(Request $request)
    {

    	
    	$res = Express::where('express_title','like','%'.$request->input('express_title').'%')->paginate(5);

    	return view('home/express/express',[
    		'title'=>'商城快讯',
    		'res'=>$res

    	]);
    }
}
