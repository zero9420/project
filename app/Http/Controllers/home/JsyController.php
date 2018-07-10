<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JsyController extends Controller
{
    public function jsy (Request $requset)
    {
    	

    	return view('home.order.jsy');
    }
}
