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
    public function index(Request $request)
    {
        $goods = Goods::with('spec')->with('cate')->orderBy('goods_id','asc')

            ->where(function($query) use($request){
                // 检测关键字
                $gname = $request->input('gname');
                $max_price = $request->input('max_price');
                $min_price = $request->input('min_price');
                // 如果用户名不为空
                if(!empty($gname)) {
                    $query->where('goods_name','like','%'.$gname.'%');
                }
                // 如果最大价格不为空
                if(!empty($max_price)) {
                    $query->where('goods_price','<=',$max_price);
                }
                // 如果最小价格不为空
                if(!empty($min_price)) {
                    $query->where('goods_price','>=',$min_price);
                }
            })

        ->paginate($request->input('pages', 10));
        // dd($goods);
        $num = $goods->firstItem();
        return view('admin/goods/index',['title'=>'商品浏览页',
                                        'goods'=>$goods,
                                        'num'=>$num,
                                        'request'=> $request
                                    ]);
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

        // 商品名唯一
        $num = Goods::where('goods_name',$data['goods_name'])->first();

        if($num){
            return redirect('/admin/goods/create')->with('success','添加失败,店内已经有此商品!');
        }

        // 判断优惠
        if(empty($data['goods_preferential']) || $data['goods_preferential']=="0"){
            $data['goods_preferential'] = $data['goods_price'];
        }
        if($data['goods_preferential'] > $data['goods_price']){
            return redirect('/admin/goods/create')->with('success','添加失败,优惠价不得大于原价!');
        }

        // 存入商品主表
        $res = Goods::create($data);
        // 获取商品id
        $goods_id = $res->goods_id;

        // 商品图片
        if($request->hasFile('goods_pic')){

            $req = $request->file('goods_pic');

            $goods_pic= [];

            foreach($req as $k => $v){

                $g_pic = [];

                // 设置名字
                $name = date('Y-m-d-H-i-s',time()).str_random(10);

                // 获取后缀
                $suffix = $v->getClientOriginalExtension();

                // 移动
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
                        'jumpTime'=>2
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
        $spec = GoodsSpec::where('goods_gid',$id)->get();
        return view('admin/goods/edit',
            ['title'=>'商品修改页',
            'cate'=>$cate,
            'goods'=>$goods,
            'spec'=>$spec
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
        // 表单验证
        $this->validate($request, [
            'goods_name' => 'required|unique:shop_goods|max:30',
            'goods_price'=>'required|regex:/^\d{1,9}$/',
            'goods_preferential'=>'regex:/^\d{0,9}$/',
            'goods_info'=>'required|max:120',
            'goods_desc'=>'required',
            'goods_pic'=>'required|max:4',
        ],[
            'goods_name.required'=>'商品名不能为空',
            'goods_name.unique'=>'商品名不能重复',
            'goods_name.max'=>'商品名格式不正确',
            'goods_price.required'=>'商品价格不能为空',
            'goods_price.regex'=>'商品价格格式不正确',
            'goods_preferential.regex'=>'商品优惠格式不正确',
            'goods_info.required'=>'商品简介不能为空',
            'goods_info.regex'=>'商品简介格式不正确',
            'goods_desc.required'=>'商品描述不能为空',
            'goods_pic.required'=>'商品图片不能为空',
            'goods_pic.max'=>'商品图片最多4张',

        ]);
        $res = $request->except('_token','_method','goods_pic');
        // 判断优惠
        if(empty($data['goods_preferential']) || $data['goods_preferential']=="0"){
            $data['goods_preferential'] = $data['goods_price'];
        }
        if($data['goods_preferential'] > $data['goods_price']){
            return redirect('/admin/goods/'.$id.'/edit')->with('success','修改失败,优惠价不得大于原价!');
        }

        // 商品图片
        if($request->hasFile('goods_pic')){
            // 删除详情表本地图片
            $url = '/uploads/goods/picture.png';
            $urls = GoodsSpec::where('goods_gid',$id)->get();
            foreach ($urls as $k => $v) {
                if($v->goods_pic == $url){
                    // 默认图片不删除
                    continue;
                } else {
                    unlink('.'.$v->goods_pic);
                }
            }

            // 删除原图片所有记录
            $res_spec = GoodsSpec::where('goods_gid',$id)->delete();

            // 重新添加图片
            $req = $request->file('goods_pic');

            $goods_pic= [];

            foreach($req as $k => $v){

                $g_pic = [];

                // 设置名字
                $name = date('Y-m-d-H-i-s',time()).str_random(10);

                // 获取后缀
                $suffix = $v->getClientOriginalExtension();

                // 移动
                $v->move('./uploads/goods/photo/',$name.'.'.$suffix);

                // 添加商品id
                $g_pic['goods_gid'] = $id;

                // 添加商品图片
                $g_pic['goods_pic'] = '/uploads/goods/photo/'.$name.'.'.$suffix;

                // 存入二维数组
                $goods_pic[] = $g_pic;

            }
            // 添加到数据库
            $data_pic = Goods::find($id)->spec()->createMany($goods_pic);
        }
        // 模型
        try{
            // 修改商品表
            $data = Goods::where('goods_id',$id)->update($res);
            if($data){
                return view('/layout/jump')->with([
                        'message'=>'修改成功',
                        'url' =>'/admin/goods',
                        'jumpTime'=>2
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
        // 删除详情表本地图片
        $url = '/uploads/goods/picture.png';
        $urls = GoodsSpec::where('goods_gid',$id)->get();
        foreach ($urls as $k => $v) {
            if($v->goods_pic == $url){
                // 默认图片不删除
                continue;
            } else {
                unlink('.'.$v->goods_pic);
            }
        }

        try {
            $goods = Goods::find($id);
            $res_one = $goods->delete();
            $res_spec = $goods->spec()->delete();
            if ($res_one && $res_spec) {
                return view('/layout/jump')->with([
                    'message'=>'删除成功',
                    'url' =>'/admin/goods',
                    'jumpTime'=>2
                ]);
            }
        } catch (\Exception $e) {
            return view('/layout/jump')->with([
                    'message'=>'删除失败',
                    'url' =>'/admin/goods',
                    'jumpTime'=>2
                ]);
        }
    }
}
