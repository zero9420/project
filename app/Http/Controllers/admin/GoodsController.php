<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cate;
use App\Models\Admin\Goods;
use App\Models\Admin\GoodsSpec;

class GoodsController extends Controller
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
        //
        // 商品分类
        $cates=Cate::select()->get();
        return view('admin.goods.add',['title'=>'商品添加页','cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        //表单验证
        $this->validate($request, [
            'goods_name' => 'required|regex:/^\w{5,120}$/',
            'goods_cate' => 'required',
            'goods_price'=>'required|regex:/^\d{0,6}\.\d{0,2}$/',
            'goods_stock'=>'required|regex:/^\d+$/',
            'goods_color'=>'required|regex:/^1[3456789]\d{9}$/',
            'goods_size'=>'required|regex:/^1[3456789]\d{9}$/',
            'goods_hot'=>'required|regex:/^1[3456789]\d{9}$/',
            'goods_pic'=>'required|regex:/^1[3456789]\d{9}$/',
            'goods_desc'=>'required|regex:/^1[3456789]\d{9}$/',
            'goods_status'=>'required|regex:/^1[3456789]\d{9}$/',
            'goods_status'=>'required|regex:/^1[3456789]\d{9}$/',
        ],[
            'username.required'=>'用户名不能为空',
            'username.regex'=>'用户名格式不正确',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'repass.same'=>'两次密码不一致',
            'email.email'=>'邮箱格式不正确',
            'phone.required'=>'手机号不能为空',
            'phone.regex'=>'手机号格式不正确'

        ]);
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
