<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\User;
use DB;
use Mail;
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
            $email = request('email');
            $status = request('status');;
            // dd($status);
       		// $status = trim(request('status'));
       		// $status=array(['1']);
       	
       		// dd($status);
              // dd($status);

            $user = User::create(compact('username','password','email','status'));
            $id = $user->id;

            // $user = new User;  
            

        //渲染
            if($user)
            {
               
                Mail::send('email.remind', ['id'=>$id], function($m) use ($user) {

              $m->from(env('MAIL_USERNAME'), '云购物-市场部');

              $m->to($user['email'], $user['username'])->subject('百度网-入职邀请');
          });

          // return view('home.register.tixing');


            }else{
                echo '<script>alert("注册失败");location.href="/home/register";</script>';//跳转 并且附带信息'
            }


		}

}