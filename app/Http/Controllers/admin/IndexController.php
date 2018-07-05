<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Info;

class IndexController extends Controller
{
    //
    public function index()
    {

    	return view('admin.index',['title'=>'后台首页']);

    }


    public function UserInfo(Request $request)
    {	

    	 $user = Info::where('info_name','like','%'.$request->input('search').'%')->paginate($request->input('num',3));

        $arr = ['num'=>$request->input('num'),'search'=>$request->input('search')];


    	// dd($res);

    	//显示模板
    	return view('admin.userinfo.index',['title'=>'个人信息浏览页','user'=>$user,'arr'=>$arr]);

    }
}
