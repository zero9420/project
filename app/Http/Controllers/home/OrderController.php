<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    public function order()
    {	
    	
    	

    	return view('home.order.order');
    }
}
