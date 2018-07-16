<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Express;
use App\Models\Home\Info;
use App\Models\Home\User;
class ExpressController extends Controller
{
    public function express(Request $request)
    {
    	
            	$user_id = session('user_id');

                $user =  User::where('id',$user_id)->first();

                $data = Info::where('info_id',$user_id)->first(); 

                $res = Express::where('express_title','like','%'.$request->input('express_title').'%')->paginate(8);

                if(empty($data)){

                 $data = ([
                    'info_nickname'=>$user->username,
                    'info_image'=>'/userinfo/WnaSH31531120706.jpg'
                ]);

                 $data = (object) $data;
 
             }  
            

              return view('home/express/express',[
                    'title'=>'商城快讯',
                    'res'=>$res,
                    'data'=>$data

                    ]);

             
    }
}
