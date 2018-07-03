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
        $goods = Goods::with('spec')->paginate(10);
        $num = $goods->firstItem();
        return view('admin/goods/index',['title'=>'商品浏览页','goods'=>$goods,'num'=>$num]);
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
        $cates = Cate::select(DB::raw('*,concat(cate_path,cate_id) as paths'))
                ->orderBy('paths')
                ->get();
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
        $res = $request->except(['_token']);
        // 商品图片
        foreach ($res['goods_pic'] as $key => $value) {
            $suffix[] = $value->getClientOriginalExtension();
        }
        //设置名字
        $name1 = time().str_random(10);
        $name2 = time().str_random(10);
        $name3 = time().str_random(10);
        $name4 = time().str_random(10);
        $name5 = time().str_random(10);
        $file = $request->file('goods_pic');
        // 判断是否上传图片数量存入数据库
        if(count($file) == '5') {
            $file[0]->move('./uploads/goods/',$name1.'.'.$suffix[0]);
            $file[1]->move('./uploads/goods/',$name2.'.'.$suffix[1]);
            $file[2]->move('./uploads/goods/',$name3.'.'.$suffix[2]);
            $file[3]->move('./uploads/goods/',$name4.'.'.$suffix[3]);
            $file[4]->move('./uploads/goods/',$name5.'.'.$suffix[4]);
            $res['goods_pic1'] = Config::get('app.goods_path').$name1.'.'.$suffix[0];
            $res['goods_pic2'] = Config::get('app.goods_path').$name2.'.'.$suffix[1];
            $res['goods_pic3'] = Config::get('app.goods_path').$name3.'.'.$suffix[2];
            $res['goods_pic4'] = Config::get('app.goods_path').$name4.'.'.$suffix[3];
            $res['goods_pic5'] = Config::get('app.goods_path').$name5.'.'.$suffix[4];
        } else if (count($file) == '4') {
            $file[0]->move('./uploads/goods/',$name1.'.'.$suffix[0]);
            $file[1]->move('./uploads/goods/',$name2.'.'.$suffix[1]);
            $file[2]->move('./uploads/goods/',$name3.'.'.$suffix[2]);
            $file[3]->move('./uploads/goods/',$name4.'.'.$suffix[3]);
            $res['goods_pic1'] = Config::get('app.goods_path').$name1.'.'.$suffix[0];
            $res['goods_pic2'] = Config::get('app.goods_path').$name2.'.'.$suffix[1];
            $res['goods_pic3'] = Config::get('app.goods_path').$name3.'.'.$suffix[2];
            $res['goods_pic4'] = Config::get('app.goods_path').$name4.'.'.$suffix[3];
        } else if (count($file) == '3')  {
            $file[0]->move('./uploads/goods/',$name1.'.'.$suffix[0]);
            $file[1]->move('./uploads/goods/',$name2.'.'.$suffix[1]);
            $file[2]->move('./uploads/goods/',$name3.'.'.$suffix[2]);
            $res['goods_pic1'] = Config::get('app.goods_path').$name1.'.'.$suffix[0];
            $res['goods_pic2'] = Config::get('app.goods_path').$name2.'.'.$suffix[1];
            $res['goods_pic3'] = Config::get('app.goods_path').$name3.'.'.$suffix[2];
        } else if (count($file) == '2')  {
            $file[0]->move('./uploads/goods/',$name1.'.'.$suffix[0]);
            $file[1]->move('./uploads/goods/',$name2.'.'.$suffix[1]);
            $res['goods_pic1'] = Config::get('app.goods_path').$name1.'.'.$suffix[0];
            $res['goods_pic2'] = Config::get('app.goods_path').$name2.'.'.$suffix[1];
        }  else if (count($file) == '1')  {
            $file[0]->move('./uploads/goods/',$name1.'.'.$suffix[0]);
            $res['goods_pic1'] = Config::get('app.goods_path').$name1.'.'.$suffix[0];
        }

        //存数据表
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
        $detail = Goods::with('spec')->find($id);
        return view('admin/goods/show',['title'=>'商品详情页','detail'=>$detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/goods/edit',['title'=>'商品修改页']);
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
        echo "商品删除";
    }
}
