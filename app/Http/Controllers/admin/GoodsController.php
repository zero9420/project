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
        $goods = Goods::with('spec')->with('cate')->paginate(10);
        // dd($goods);
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
        foreach($cates as $k => $v){

            // 根据phth,将模版层次分明
            $rs = substr_count($v->cate_path,',')-1;
            $v->cate_name = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$rs).'|--'.$v->cate_name;

        }
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
        // 获取表单数据
        $data = $request->except('_token','goods_pic[]');

        $res = Goods::create($data);
        // 获取商品id
        $goods_id = $res->goods_id;

        //设置名字
        //商品图片
        if($request->hasFile('goods_pic')){

            $req = $request->file('goods_pic');

            $goods_pic= [];

            foreach($req as $k => $v){

                $g_pic = [];

                //设置名字
                $name = date('Y-m-d-H-i-s',time()).str_random(10);

                //获取后缀
                $suffix = $v->getClientOriginalExtension();

                //移动
                $v->move('./uploads/goods/photo/',$name.'.'.$suffix);

                // 添加商品id
                $g_pic['goods_gid'] = $goods_id;

                // 添加商品图片
                $g_pic['goods_pic'] = '/uploads/goods/photo/'.$name.'.'.$suffix;

                // 存入二维数组
                $goods_pic[] = $g_pic;

            }
        }
        $goods = Goods::find($goods_id);
        // dd($goods_pic);
        //模型
        try{
            // 存入数据库
            $data = $goods->spec()->createMany($goods_pic);
            if($data){
                return view('/layout/jump')->with([
                        'message'=>'添加成功',
                        'url' =>'/admin/goods',
                        'jumpTime'=>2,
                        'title'=>'添加成功'
                    ]);
            }
        }catch(\Exception $e){
            return view('/layout/jump')->with([
                        'message'=>'添加失败',
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
        // 获取分类
        $cate = Cate::select(DB::raw('*,concat(cate_path,cate_id) as paths'))
                ->orderBy('paths')
                ->get();

        foreach($cate as $k => $v){

            // 根据phth,将模版层次分明
            $rs = substr_count($v->cate_path,',')-1;
            $v->cate_name = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$rs).'|--'.$v->cate_name;

        }
        // 获取商品
        $goods = Goods::where('goods_id',$id)->first();
        return view('admin/goods/edit',
            ['title'=>'商品修改页',
            'cate'=>$cate,
            'goods'=>$goods
        ]);
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
        //表单验证
        $this->validate($request, [
            'goods_name' => 'required|unique:shop_goods|max:100',
            'goods_price'=>'required|regex:/^\d{0,9}\.\d{0,2}$/',
            'goods_stock'=>'required|regex:/^\d+$/',
        ],[
            'goods_name.required'=>'商品名不能为空',
            'goods_name.unique'=>'商品名不能重复',
            'goods_name.max'=>'商品名格式不正确',
            'goods_price.required'=>'商品价格不能为空',
            'goods_price.regex'=>'商品价格格式不正确',
            'goods_stock.required'=>'商品库存不能为空',
            'goods_stock.regex'=>'商品库存格式不正确',

        ]);
        $res = $request->except('_token','_method');
        //模型
        try{
            // 修改数据库
            $data = Goods::where('goods_id',$id)->update($res);
            if($data){
                return view('/layout/jump')->with([
                        'message'=>'修改成功',
                        'url' =>'/admin/goods',
                        'jumpTime'=>2,
                        'title'=>'修改成功'
                    ]);
            }
        }catch(\Exception $e){
            return view('/layout/jump')->with([
                        'message'=>'修改失败',
                        'url' =>'/admin/goods/'.$id.'/edit',
                        'jumpTime'=>2,
                    ]);

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
        echo "商品删除";
    }
}
