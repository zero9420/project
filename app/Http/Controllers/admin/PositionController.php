<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Position;
use Config;
use App\Http\Requests\PositionRequest;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //接收数据条件查询
        $res = Position::where('position_name','like','%'.$request->input('search').'%')->paginate($request->input('num',6));

        $arr = ['num'=>$request->input('num'),'search'=>$request->input('search')];

        //显示模板分配数据
        return view('admin.position.index',['title'=>'广告浏览页','res'=>$res,'arr'=>$arr]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //显示模板
        return view('admin.position.add',['title'=>'广告中心添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionRequest $request)
    {   


        //接收数据
        $res = $request->except('_token','position_image');

        // dump($res);

        //检测是否上传广告图片
        if($request->hasFile('position_image')){

            //设置名字
            $name = str_random(6).time();


            //获取后缀
            $suffix = $request->file('position_image')->getClientOriginalExtension();

            //移动
            $request->file('position_image')->move('./uploads/',$name.'.'.$suffix);

        }


        //存入数据表
        $res['position_image'] =Config::get('app.path').$name.'.'.$suffix;

        try{
        //模型存入数据表
        $data = Position::create($res);

        if($data){

            return redirect('/admin/position')->with('success','添加成功');
            }
        } catch(\Exception $e) {

            return back()->with('error','添加失败');
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

        //接收数据
        $res = Position::find($id);

        
        //显示模板
        return view('admin.position.edit',['title'=>'广告修改页','res'=>$res]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PositionRequest $request, $id)
    {

        //删除原文件
        $file = Position::find($id);

        $urls = $file->position_image;

        $info = unlink('.'.$urls);

        if(!$info) return; 

        $res = $request->except('_token','_method','position_image');


        //检测是否上传广告图片
        if($request->hasFile('position_image')){



            //设置名字
            $name = str_random(6).time();


            //获取后缀名
            $suffix = $request->file('position_image')->getClientOriginalExtension();

            //移动
           $request->file('position_image')->move('./uploads/',$name.'.'.$suffix);

         

        }



        //存数据表
        $res['position_image'] = Config::get('app.path').$name.'.'.$suffix;
      
        try{
        //提交修改的数据
        $data = Position::where('position_id',$id)->update($res);

        //判断是否存入成功
        if($data){

            return redirect('/admin/position')->with('success','成功修改');
            }
        }catch(\Exception $e){

            return back()->with('error','修改失败');
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
        //删除文件图片
        $file = Position::find($id);

        $urls = $file->position_image;

        $info = unlink('.'.$urls);

        if(!$info) return;

        $res = Position::where('position_id',$id)->delete();


        if($res){

            return redirect('/admin/position')->with('success','删除成功');
        }




    }
}
