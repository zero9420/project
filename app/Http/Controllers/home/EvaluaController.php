<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Evalua;
use App\Models\Home\Evaldetail;
use DB;

class EvaluaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.eval.add',['title'=>'商品评价页']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 表单验证
        $this->validate($request, [
            'goods_grade' => 'required',
            'comments'=>'max:120',
            'goods_pic'=>'max:5',
        ],[
            'goods_grade.required'=>'商品星级评价不能为空',
            'comments.max'=>'商品评价最多120字!',
            'goods_pic.max'=>'商品图片最多5张',

        ]);
        $res = $request->except('_token','_method','eval_pic');

        dd($res);

        // 获取用户id
        $res['uid'] = session('user_id');

        // 获取商品id
        $res['gid'] = session('user_id');

        // 获取订单id
        $res['oid'] = session('user_id');

        // 存入评价主表
        $res = Evalua::create($res);
        // 获取评价id
        $eid = $res->eid;

        // 商品图片
        if($request->hasFile('eval_pic')){

            $req = $request->file('eval_pic');

            $eval_pic= [];

            foreach($req as $k => $v){

                $e_pic = [];

                // 设置名字
                $name = date('Y-m-d-H-i-s',time()).str_random(10);

                // 获取后缀
                $suffix = $v->getClientOriginalExtension();

                // 移动
                $v->move('./uploads/goods/pingjia/',$name.'.'.$suffix);

                // 添加评价id
                $e_pic['eval_eid'] = $eid;

                // 添加评论图片
                $e_pic['eval_pic'] = '/uploads/goods/pingjia/'.$name.'.'.$suffix;

                // 存入二维数组
                $eval_pic[] = $e_pic;

            }
            $eval = Evalua::find($eid);
            //模型
            try{
                // 存入数据库
                $data = $eval->evalua()->createMany($eval_pic);
                if($res && $data){
                    return view('/home/userinfo')->with('success','评价成功!');
                }
            }catch(\Exception $e){
                return back()->with('error','评价失败!');

            }
        } else {
            try{
                if($res){
                    return view('/home/userinfo')->with('success','评价成功!');
                }
            }catch(\Exception $e){
                return back()->with('error','评价失败!');

            }
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}