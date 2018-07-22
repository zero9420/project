<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Auth;
use Hash;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
 *　　　　　　　　┏┓　　　┏┓+ +
 *　　　　　　　┏┛┻━━━┛┻┓ + +
 *　　　　　　　┃　　　　　　　┃ 　
 *　　　　　　　┃　　　━　　　┃ ++ + + +
 *　　　　　　 ████━████ ┃+
 *　　　　　　　┃　　　　　　　┃ +
 *　　　　　　　┃　　　┻　　　┃
 *　　　　　　　┃　　　　　　　┃ + +
 *　　　　　　　┗━┓　　　┏━┛
 *　　　　　　　　　┃　　　┃　　　　　　　　　　　
 *　　　　　　　　　┃　　　┃ + + + +
 *　　　　　　　　　┃　　　┃　　　　Code is far away from bug with the animal protecting　　　　　　　
 *　　　　　　　　　┃　　　┃ + 　　　　神兽保佑,代码无bug　　
 *　　　　　　　　　┃　　　┃
 *　　　　　　　　　┃　　　┃　　+　　　　　　　　　
 *　　　　　　　　　┃　 　　┗━━━┓ + +
 *　　　　　　　　　┃ 　　　　　　　┣┓
 *　　　　　　　　　┃ 　　　　　　　┏┛
 *　　　　　　　　　┗┓┓┏━┳┓┏┛ + + + +
 *　　　　　　　　　　┃┫┫　┃┫┫
 *　　　　　　　　　　┗┻┛　┗┻┛+ + + +
 */


    public function index(Request $request)
    {
        //管理员列表页面
        $Auth = Auth::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('search');
                $email = $request->input('email');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('auth_name','like','%'.$username.'%');
                }
                //如果邮箱不为空
                if(!empty($email)) {
                    $query->where('email','like','%'.$email.'%');
                }
            })
            ->paginate($request->input('num', 1));
        //逻辑
        $res = Auth::paginate(1);

        return view('admin.auth.index',[
            'title'=>'管理员的列表页面',
            'res'=>$Auth,
            'request'=>$request

        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        //渲染添加管理页面
         return view('admin.auth.add',['title'=>'添加管理员']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //添加管理逻辑
        
        //校验
        $this->validate($request, [
            'auth_name' => 'required|regex:/^\w{5,12}$/',
            'password' => 'required|regex:/^\S{5,30}$/',
            'repass'=>'same:password',
            'email'=>'email|required',
            'phone'=>'required|regex:/^1[3456789]\d{9}$/',            
        ],[
            'auth_name.required'=>'用户名不能为空',
            'auth_name.regex'=>'用户名格式不正确',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'repass.same'=>'两次密码不一致',
            'email.required'=>'邮箱不可以为空',
            'email.email'=>'邮箱格式不正确',
            'phone.required'=>'手机号不能为空',
            'phone.regex'=>'手机号格式不正确'

        ]);
         $res = $request->except(['_token','repass']);

         //头像上传
          if($request->hasFile('profile')){

            //设置名字
            $name = str_random(10).time();

            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();

            //移动
            $request->file('profile')->move('./uploads/',$name.'.'.$suffix);
        }

          $res['profile'] = '/uploads/'.$name.'.'.$suffix;
          $res['created_at'] =  $created_at = time();
          $res['password'] = bcrypt(request('password'));
         //执行添加管理员
        $data = Auth::create($res);
      
        if($data){

            return redirect('/admin/auth')->with('info','添加成功');

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
        //渲染视图
         $data = Auth::where('id',$id)->get();
       return view('admin.auth.edit',['title'=>'修改管理员'],['data'=>$data]);

         // return  dump($id);
      
        // dump($data);
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
        //更新编辑页面逻辑
         //校验
        $this->validate($request, [
            'auth_name' => 'required|regex:/^\w{5,12}$/',
            'email'=>'email|required',
            'phone'=>'required|regex:/^1[3456789]\d{9}$/',            
        ],[
            'auth_name.required'=>'用户名不能为空',
            'auth_name.regex'=>'用户名格式不正确',
            'email.required'=>'邮箱不可以为空',
            'email.email'=>'邮箱格式不正确',
            'phone.required'=>'手机号不能为空',
            'phone.regex'=>'手机号格式不正确'
        ]);
          
           $res = $request->except(['_token','tupian','_method']);
           // dd($res);
              //头像上传
          if($request->hasFile('profile')){

            //设置名字
            $name = str_random(10).time();

            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();

            //移动
            $request->file('profile')->move('./uploads/',$name.'.'.$suffix);
             
             // dump($res['profile']);die;
        }
         if(empty($res['profile'])){
               $res['profile'] = $request->input(['tupian']);

           }else{
                    //清除图片 
        $foo = Auth::find($id);

        $urls = $foo->profile;

        // dd($urls);
             if(file_exists('.'.$urls)){
                 $info = '@'.unlink('.'.$urls);
             }


            
            $res['profile'] = '/uploads/'.$name.'.'.$suffix;
           }
         // dd($res['profile']);
         //执行添加管理员
        $data = Auth::where('id',$id)->update($res);
        if($data){

            return redirect('/admin/outlogin');

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
        //执行管理员删除

            //清除图片 
        $foo = Auth::find($id);


        $urls = $foo->profile;
       
        // dd($urls);
        if(file_exists('.'.$urls)){
            $info = '@'.unlink('.'.$urls);
        }


        $res =  Auth::where('id',$id)->delete();

        if($res){

            return redirect('/admin/auth')->with('success','删除成功');
        }
    }

    // 修改用户密码
    public function authpassword($id)
    {   
        // 渲染修改密码页面
       $res = Auth::where('id',$id)->first();
       return view('admin/login/editpassword',['title'=>'管理员修改密码页面','res'=>$res]);
    }


    public function editpasswords(Request $request)
    {

         //校验
        $this->validate($request, [
            'passwords' => 'required|regex:/^\S{5,30}$/',
            'password' => 'required|regex:/^\S{5,30}$/',
            'repass' => 'required|regex:/^\S{5,30}$/',             
        ],[

            'passwords.required'=>'原密码不能为空',
            'passwords.regex'=>'原密码格式不正确',
            'password.required'=>'新密码不能为空',
            'password.regex'=>'新密码格式不正确',
            'repass.required'=>'确认新密码不能为空',
            'repass.regex'=>'确认新密码格式不正确',

        ]);
            $res = $request->except(['_token']);
           $uname = Auth::where('auth_name',$res['auth_name'])->first();

           if ($res['repass'] != $res['password']) {
               return back()->with('error','新密码与确认密码必须相同');
           }

           if ($res['passwords'] === $res['password']) {
                return back()->with('error','原密码与新密码不可以相同');
           }
            

      //判断密码
        if (!Hash::check($res['passwords'], $uname->password)) {
            // 密码对比...

            //如果说密码失败
            return back()->with('error','原密码或新密码不正确');
        }
                // dd($uname);

        $password = $request->input('password');

        $date = bcrypt($password);

        $data = Auth::where('auth_name',$res['auth_name'])->update(['password'=>$date]);
        if ($data) {
            return back()->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }
}
