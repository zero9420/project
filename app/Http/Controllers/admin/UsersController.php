<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Users;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //用户浏览渲染
        $res = Users::paginate(10);

        return view('admin.users.index',[
            'title'=>'用户的列表页面',
            'res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //用户注册
        return view('admin.users.add',['title'=>'用户注册页面']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //用户注册逻辑

          //校验
        $this->validate($request, [
            'username' => 'required|regex:/^\w{5,12}$/',
            'password' => 'required|regex:/^\S{5,30}$/',
            'repass'=>'same:password',
            'email'=>'email|required',
            'phone'=>'required|regex:/^1[3456789]\d{9}$/',            
        ],[
            'username.required'=>'用户名不能为空',
            'username.regex'=>'用户名格式不正确',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'repass.same'=>'两次密码不一致',
            'email.required'=>'邮箱不可以为空',
            'email.email'=>'邮箱格式不正确',
            'phone.required'=>'手机号不能为空',
            'phone.regex'=>'手机号格式不正确'

        ]);
         $res = $request->except(['_token','repass']);
         $username= Users::where('username',$res['username'])->first();
         if ($username) {
             return back()->with('error','用户名已存在请更换');
         }
          $phone= Users::where('phone',$res['phone'])->first();
         if ($phone) {
           return back()->with('error','手机号已存在,请更换');
         }

          $res['password'] = bcrypt(request('password'));
         //执行添加管理员

        $data = Users::create($res);
          // $data = DB::table('shop_user')->insert(['username'=>$res['username'],
          //   'password'=>$res['password'],
          //   'email'=>$res['email'],
          //   'phone'=>$res['phone'],
          
          //   ]);
      
        if($data){

            return redirect('/admin/users')->with('success','添加成功');

        } else {

            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $data = Users::where('id',$id)->get();
         return view('admin.users.edit',['title'=>'修改用户页面'],['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //用户修改
         $this->validate($request, [
            'username' => 'regex:/^\w{5,12}$/',
            'email'=>'email|required',
            // 'repass'=>'same:password',
            'phone'=>'required|regex:/^1[3456789]\d{9}$/',
            // 'password' => 'required|regex:/^\S{5,30}$/', 
                     
        ],[
            // 'username.required'=>'用户名不能为空',
            'username.regex'=>'用户名格式不正确',
            'email.required'=>'邮箱不可以为空',
            'email.email'=>'邮箱格式不正确',
            // 'password.required'=>'新密码不能为空',
            // 'password.regex'=>'新密码格式不正确',
            // 'repass.same'=>'两次密码不一致',
            'phone.required'=>'手机号不能为空',
            'phone.regex'=>'手机号格式不正确'
        ]);
          
           $res = $request->except(['_token','_method','tupian','password','repass']);
           $id =$id;
            $ids = Users::where('id',$id)->first();

            if ($res['username'] ==$ids->username) {
                 
                }else{
                    $username = Users::where('username',$res['username'])->first();

                     if ($username) {
                    return back()->with('error','用户名已存在请重新更换!');
                }
                }


            if ($res['phone'] ==$ids->phone) {
                 
                }else{
                    $phone = Users::where('phone',$res['phone'])->first();

                     if ($phone) {
                    return back()->with('error','手机号已存在请重新更换!');
                }
                }


            $passwor = $request->input('password');
            $repass  = $request->input('repass');
            
            
            // dd($passwor);
        if (empty($passwor)) {
            // dd($id);
            // $data = Users::where('id',$id)->update($res);

         }else
            {   
             if ($passwor !=$repass ) {
               return back()->with('error','新密码与确认密码必须相同');
            }
            
            $res['password'] = Bcrypt($passwor);
        }
            $data = Users::where('id',$id)->update($res);
         //执行修改管理员
       
        if($data){

            return redirect('/admin/users')->with('success','修改成功');

        } else {

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $date = Users::where('id',$id)->delete();

        if ($date) {
            return redirect('/admin/users')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
