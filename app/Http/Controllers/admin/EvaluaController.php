<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Evalua;
use App\Models\Admin\Users;
use App\Models\Home\Evaldetail;
class EvaluaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //浏览页面渲染


        $Evaluas = Evalua::all();
        $uid = [];
        foreach($Evaluas as $k =>$v){
            $uid= $v;
        }
        if(!empty($uid)){
            $eid = $uid->eid;

        }else{
            $eid = 0;
        }


        $Image = Evaldetail::where('eid',$eid)->first();
//        dd($Image);
        if(empty($Image)){
            $Image = '/uploads/hyHV5wypIC1531804079.jpg';
        }
//        dd($Image);
        if(!empty($uid)){
            $uids = $uid->uid;
        }else{
            $uids = 0;
        }


//        dd($Image->eval_pic);
        $Users = Users::where('id',$uids)->first();

       return view('admin.eval.index',['title'=>'商品评论页面','Evaluas'=>$Evaluas,'Users'=>$Users,'Image'=>$Image]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //渲染回帖页面
        $Evaluas = Evalua::where('eid',$id)->first();
        $uid = $Evaluas->uid;
        $Users = Users::where('id',$uid)->first();
//        dd($Users);
        return view('admin.eval.add',['title'=>'商品评论页面','Users'=>$Users,'Evaluas'=>$Evaluas]);
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
        //
        $huitie = $request->input('huitie');
        if(empty($huitie)){
          return back()->with('error','回帖内容不能为空');
        }

      $res = $Evaldetail =  Evalua::where('eid',$id)->first();

            if(empty($Evaldetail)){
                Evalua::where('eid',$id)->create(['huitie'=>$huitie]);
                return back()->with('success','回帖成功');
            }else{

                if($huitie == $res->huitie){
                    return back()->with('error','回帖不能重复');
                }

                Evalua::where('eid',$id)->update(['huitie'=>$huitie]);
                return back()->with('success','回帖成功');
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

       $date= Evalua::where('eid',$id)->delete();
        $res = Evaldetail::where('eid',$id)->delete();
        if($res || $date) {
            return back()->with('success', '删除成功');
        }else{
            return back()->with('error', '删除失败');
        }
    }
}
