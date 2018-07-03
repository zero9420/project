<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cate;
use App\Models\Admin\Goods;
use App\Models\Admin\GoodsSpec;
use App\Http\Requests\FormRequest;
use Config;
use DB;

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
        $cates = DB::select('select *,concat(cate_path,cate_id) from shop_cate order by concat(cate_path,cate_id)');
        return view('admin.goods.add',['title'=>'商品添加页','cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequest $request)
    {
        $res = $request->except(['_token','goods_pic']);
        // 商品图片
        if($request->hasFile('goods_pic')){

            //设置名字
            $name = date('Y-m-d H:i:s',time()).str_random(10);
            //获取后缀
            $suffix = $request->file('goods_pic')->getClientOriginalExtension();

            //移动
            $request->file('goods_pic')->move('./uploads/goods/',$name.'.'.$suffix);
        }

        //存数据表
        $res['goods_pic'] = Config::get('app.goods_path').$name.'.'.$suffix;
        $res['goods_color'] = implode('|',$res['goods_color']);
        $res['goods_size'] = implode('|', $res['goods_size']);
        // 开启事务
        DB::beginTransaction();
        // 存数据到商品表
        $data = Goods::create($res);
        // 获取商品id
        $res['goods_id'] = $data->goods_id;
        // 存数据到商品详情表
        $data_spec = GoodsSpec::create($res);
        if($data && $data_spec){   //判断两条同时执行成功
            DB::commit();  //提交事务
            return view('/layout/jump')->with([
                        'message'=>'添加成功！',
                        'url' =>'/admin/goods',
                        'jumpTime'=>2,
                        'title'=>'添加成功'
                    ]);
        } else {
            DB::rollback();  //回滚事务
            return view('/layout/jump')->with([
                        'message'=>'添加失败！',
                        'url' =>'/admin/goods/create',
                        'jumpTime'=>2,
                    ]);
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
