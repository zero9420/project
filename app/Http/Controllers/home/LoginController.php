<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\User;
use Hash;
class LoginController extends Controller
{
    /**
	 * 前台登陆模块
	 */

	//登陆渲染
    public function index()
    {
        // echo 123;
    	return view('home.login.login');
    }
    //登陆逻辑
    public function login(Request $request)
    {
    	//校验
            $this->validate(request(),[
            'username'=>'required|min:3',
            'password'=>'required|min:5|max:20',
             ]);
    	//逻辑
            //获取用户输入的账号和密码
            $username = request('username');
            $password = request('password');
           

            $data = User::where(compact('username'))->first();

           if (!$data) {
             echo '<script>alert("用户名输入错误");location.href="/home/logins";</script>';
            }
              //判断密码
            // dd($data->password);
        if (!Hash::check($password, $data->password)) {
             echo '<script>alert("密码输入错误");location.href="/home/logins";</script>';
        }

            // dump($data);
           
             session(['user_id' => $data->id]);
                //     if ($request->session()->has('id')) {
                // return '有';
                // }else{
                //     return '没有';
                // }

        //渲染
            return '<script>alert("登入成功");location.href="/";</script>';

    }

}
