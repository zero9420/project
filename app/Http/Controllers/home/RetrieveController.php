<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Models\Home\User;

class RetrieveController extends Controller
{
    //
    public function index(){
       return view('home.retrieve.index');
    }

    public function retrieve(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email',$email)->first();
        $id = $user['id'];
        $email = $user['email'];

        if(!empty($user)){
            //发送邮件
            Mail::send('email.retrieve', ['id'=>$id,'email'=>$email], function($m) use ($user) {

                $m->from(env('MAIL_USERNAME'), '云购物-密码找回');

                $m->to($user['email'], $user['username'])->subject('云购物-密码找回');
            });

            return view('email.retrieveemail');


        }else{
            return back()->with('error','邮箱不存在');
        }

    }

    public function retrieves(Request $request)
    {
        $id=$request->input('id');
       $email=$request->input('email');
        $res = User::where('id',$id)->where('email',$email)->first();
        if(empty($res)){
            return redirect('home/retrieve')->with('error','修改账号失败请重试');die;
        }else{
            $password = bcrypt('123456');
            $date = User::where('id',$id)->where('email',$email)->update(['password'=>$password]);
            if($date){
              return view('email.editpassword',['res'=>$res]);
            }else{
                echo 'no';
            }
        }

    }

}
