`<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Express;

class ExpressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $res =  Express::where('express_title','like','%'.$request->input('express_title').'%')->
                paginate($request->input('num',5));


        $arr = ['num'=>$request->input('num'),'search'=>$request->input('search')];

 
        return view('admin/express/index',[

            'title'=>'快讯浏览',
            'res'=>$res,
            'arr'=>$arr
        ]);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.express.add',['title'=>'商城快讯']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request, [

            'express_title'=>'required',       
            'express_url' =>'required',   
             'express_url' =>array('regex:/(http?|ftp?):\/\/(www)\.([^\.\/]+)\.(com|cn)(\/[\w-\.\/\?\%\&\=]*)?/i'),

                   
        ],[
            'express_url.required'=>'地址不能不能为空',
            'express_url.regex'=>'地址格式不正确,必须http://www.********.com',
            'express_title.required'=>'标题不能为空',

           

        ]); 
       
        $res = $request->except('_token');

        $data = Express::create($res);

        if ($data) {
            return redirect('admin/express')->with('success','创建成功');
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
    public function edit(Request $request,$id)
    {



        $res = Express::where('express_id',$id)->get();

       

        return view('admin/express/edit',['res'=>$res,'title'=>'修改快讯']);
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

            $this->validate($request, [

            'express_title'=>'required',       
            'express_url' =>'required',   
            'express_url' => array('regex:/(http?|ftp?):\/\/(www)\.([^\.\/]+)\.(com|cn)(\/[\w-\.\/\?\%\&\=]*)?/i'),

                   
        ],[
            'express_url.required'=>'地址不能不能为空',
            'express_url.regex'=>'地址格式不正确,必须http://www.********.com',
            'express_title.required'=>'标题不能为空',

           

        ]); 


        $res = $request->except('_token','_method');

        $data = Express::where('express_id',$id)->update($res);

        if ($data) {
            return redirect('/admin/express')->with('success','修改成功咯');
        }else{

            return back()->with('error','检测到没有任何修改');

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
       $res = Express::where('express_id',$id)->delete();

       if ($res) {
          return redirect('/admin/express')->with('success','删除成功咯');
       }
    }
}
