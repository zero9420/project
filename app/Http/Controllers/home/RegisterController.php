<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\User;
use DB;
class RegisterController extends Controller
{
     

      public function index()
    {
    	return view('home.registe.index');
    }
    
        //注册逻辑
  
        // 校验
      public function registers(Request $request)
    {   
        if (empty($request)) {
            return back()->withErrors('error','数据不可以为空！'); die; 
        }
        if (!$request->isMethod('post')) {
              return back()->withErrors('error','非法操作'); die; 
        }
        $this->validate(request(),[
            'username'=>'required|min:3',
            'password'=>'required|min:5|max:20|confirmed',
            'passwor'=>'',
             ]);

        // $user = request(['user','password']);
        //逻辑
            $username = request('username');
            $password = bcrypt(request('password'));
       		// $status = trim(request('status'));
       		// $status=array(['1']);
       		$status=request('status');
       		// dd($status);
              // dd($status);

            $user = User::create(compact('username','password'));

            // $user = new User;
            

        //渲染
            if($user)
            {
                echo '<script>alert("注册成功");location.href="/home/login/";</script>'; //跳转 并且附带信息'
            }else{
                echo '<script>alert("注册失败");location.href="/home/register";</script>';//跳转 并且附带信息'
            }


		}
}