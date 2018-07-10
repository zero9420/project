<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\LinkRequest;
use Config;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   


        //接收数据条件查询
        $res = DB::table('shop_link')->where('link_name','like','%'.$request->input('search').'%')->paginate($request->input('num',6));

        $arr = ['num'=>$request->input('num'),'search'=>$request->input('search')];

        //显示模板
        return view('admin.link.index',['title'=>'友情链接列表','res'=>$res,'arr'=>$arr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        //显示添加模板
        return view('admin.link.add',['title'=>'友情链接添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request)
    {
        
      
        //接收数据
        $res = $request->except(['_token','link_logo']);
       

        if($request->hasFile('link_logo')){

            //设置名字
            $name = str_random(6).time();


            //获取后缀
            $suffix = $request->file('link_logo')->getClientOriginalExtension();

            //移动
            $request->file('link_logo')->move('./link/',$name.'.'.$suffix);

        }

         //存入数据表
        $res['link_logo'] =Config::get('app.link').$name.'.'.$suffix;

        try{
        //插入数据
        $data = DB::table('shop_link')->insert($res);

        //判断是否插入成功
        if($data){

                return redirect('/admin/link')->with('success','添加成功');
            } 
        }catch(\Exception $e){

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
        $res = DB::table('shop_link')->where('link_id',$id)->first();

        //显示模板
        return view('admin.link.edit',['title'=>'修改链接','res'=>$res]);

      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LinkRequest $request, $id)
    {


        $file = DB::table('shop_link')->where('link_id',$id)->first();

        $urls = $file->link_logo;

        $info = unlink('.'.$urls);

        if(!$info) return; 

        //接受信息
        $res = $request->except(['_token','_method','link_logo']);


        if($request->hasFile('link_logo')){

            //设置名字
            $name = str_random(6).time();


            //获取后缀
            $suffix = $request->file('link_logo')->getClientOriginalExtension();

            //移动
            $request->file('link_logo')->move('./link/',$name.'.'.$suffix);

        }

         //存入数据表
        $res['link_logo'] =Config::get('app.link').$name.'.'.$suffix;


        try{


        //修改信息
        $data = DB::table('shop_link')->where('link_id',$id)->update($res);

        if(!$data){

            $data = $res;
        }

        if($data){

            return redirect('/admin/link')->with('success','修改成功');
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

        //删除图片
        $file = DB::table('shop_link')->where('link_id',$id)->first();

        $urls = $file->link_logo;

        $info = unlink('.'.$urls);

        if(!$info) return; 

        //接受信息
        $data = DB::table('shop_link')->where('link_id',$id)->delete();

        
        if($data){
                  return redirect('/admin/link')->with('success','删除成功');
        }else{

            return back()->with('error','删除失败');
        }

        

    }
}
