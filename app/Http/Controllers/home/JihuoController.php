<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\User;
class JihuoController extends Controller
{
    //
    public function jihuo(Request $request){
        $id = $request->input('id');

        $user=User::where('id',$id)->first();

        if(empty($user)){
            echo '激活失败';
        }else {

            $rs['status'] = '1';
            $info = User::where('id',$id)->update($rs);
            return redirect('home/logins')->with('success','激活成功,请登入');
        }
    }
}
