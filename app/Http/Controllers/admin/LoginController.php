<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Auth;
use Hash;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

class LoginController extends Controller
{
    //渲染登录模块
    public function login()
    {
    	return view('admin.login.login');
    }

    public function dologin(Request $request)
    {

        // $this->validate(request(),[
        //     'auth_name'=>'required|min:3',
        //     'password'=>'required|min:5|max:20',
        //      ]);
    	// dump($request->all());
    	$res = $request->except('_token');
    	$uname = Auth::where('auth_name',$res['auth_name'])->first();
    	// dump($uname);
    	//获取用户名
    	if(!$uname){
    		return back()->with('error','用户名不正确');
    	}
        //判断密码
        if (!Hash::check($res['password'], $uname->password)) {
            // 密码对比...

            //如果说密码失败
            return back()->with('error','密码不正确');
        }

        //验证码
        if(session('code') != $res['code']){

            return back()->with('error','验证码不正确');
        }

        session(['id'=>$uname->id]);
        session(['auth'=>$uname->auth]);

        session(['auth_name'=>$uname->auth_name]);
       // dd($da);die;
        session(['profile'=>$uname->profile]);
        return redirect('/admin/index');
    }

     //生成验证码方法
    public function captcha()
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(123, 203, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 90, $height = 35, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        //可以使用
        // Session::flash('code', $phrase);

        //
         session(['code'=>$phrase]);

       

        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    public function outlogin()
    {
        if(!session(['id'=>'']))
        {
            return redirect('/admin/login');
        }
    }
}