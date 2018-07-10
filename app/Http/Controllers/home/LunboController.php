<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LunboController extends Controller
{
    public function lunbo()
    {
    	  $res = DB::table('lunbo')->get();
    	 return view('','title'=>'轮播');
    }
}
