<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\AboutDetail;

class AboutController extends Controller
{
    /**
     *　　　　　　　　┏┓　　　┏┓+ +
     *　　　　　　　┏┛┻━━━┛┻┓ + +
     *　　　　　　　┃　　　　　　　┃ 　
     *　　　　　　　┃　　　━　　　┃ ++ + + +
     *　　　　　　 ████━████ ┃+
     *　　　　　　　┃　　　　　　　┃ +
     *　　　　　　　┃　　　┻　　　┃
     *　　　　　　　┃　　　　　　　┃ + +
     *　　　　　　　┗━┓　　　┏━┛
     *　　　　　　　　　┃　　　┃　　　　　　　　　　　
     *　　　　　　　　　┃　　　┃ + + + +
     *　　　　　　　　　┃　　　┃　　　　Code is far away from bug with the animal protecting　　　　　　　
     *　　　　　　　　　┃　　　┃ + 　　　　神兽保佑,代码无bug　　
     *　　　　　　　　　┃　　　┃
     *　　　　　　　　　┃　　　┃　　+　　　　　　　　　
     *　　　　　　　　　┃　 　　┗━━━┓ + +
     *　　　　　　　　　┃ 　　　　　　　┣┓
     *　　　　　　　　　┃ 　　　　　　　┏┛
     *　　　　　　　　　┗┓┓┏━┳┓┏┛ + + + +
     *　　　　　　　　　　┃┫┫　┃┫┫
     *　　　　　　　　　　┗┻┛　┗┻┛+ + + +
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = About::with('abouts')->where('status','1')->first();
        $arr = About::where(function($query) use($request){
                    // 检测关键字
                    $sign = $request->input('sign');
                    // 如果关键字不为空
                    if (!empty($sign)) {
                        $query->where('sign','like','%'.$sign.'%');
                    }
                })->paginate(5);
        // dd($data['about']);
        return view('admin.about.index',['data'=>$data,
                        'arr'=>$arr,
                        'title'=>'关于我们',
                        'request'=>$request
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.add',['title'=>'添加关于我们']);
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
            'culture' => 'required',
            'address' => 'required|max:120',
            'about'=>'required',
            'event'=>'required',
        ],[
            'culture.required'=>'企业文化不能为空',
            'culture.image'=>'企业文化格式不正确,请上传(jpeg、png、bmp、gif、或 svg)格式图片',
            'address.required'=>'企业地址不能为空',
            'address.max'=>'企业地址格式不正确',
            'about.required'=>'企业简介不能为空',
            'event.required'=>'事件不能为空',
        ]);
        // 获取表单数据
        $data = $request->except('_token','culture','event');
        // 查询状态
        if ($data['status'] == '1') {
            $sta = About::where('status',$data['status'])->first();
            if($sta){
                return back()->with('error','关于我们同时不能有两个启动状态!!');
            }
        }
        $event = $request->only('event');
        // 企业文化
        if($request->hasFile('culture')){

            // 设置名字
            $name = date('Y-m-d-H-i-s',time()).str_random(10);

            // 获取后缀
            $suffix = $request->file('culture')->getClientOriginalExtension();

            // 移动
            $request->file('culture')->move('./uploads/about/photo/',$name.'.'.$suffix);

        }
        // 添加文化图片
        $data['culture'] = '/uploads/about/photo/'.$name.'.'.$suffix;
        // 存入about主表
        $res = About::create($data);
        $about_id = $res->id;
        // 去除空元素存入二维数组
        if ($event['event']) {
            $ents = [];
            foreach (array_filter($event) as $k => $v) {
                foreach (array_filter($v) as $kk => $vv) {
                    $ent = [];
                    $ent['event'] = $vv;
                    $ent['about_id'] = $about_id;
                    $ents[] = $ent;
                }
            }
        }
        $about = About::find($about_id);
        try{
            // 存入数据库
            $res_ = $about->abouts()->createMany($ents);;
            if($res_ && $res){
                return view('/layout/jump')->with([
                        'message'=>'添加成功',
                        'url' =>'/admin/about',
                        'jumpTime'=>2
                    ]);
                }
            }catch(\Exception $e){
                return view('/layout/jump')->with([
                        'message'=>'添加失败',
                        'url' =>'/admin/about/create',
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
        $data = About::where('id',$id)->first();
        return view('admin.about.edit',['title'=>'修改','data'=>$data]);
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
        // 表单验证
        $this->validate($request, [
            'culture' => 'required',
            'address' => 'required|max:120',
            'about'=>'required',
        ],[
            'culture.required'=>'企业文化不能为空',
            'culture.image'=>'企业文化格式不正确,请上传(jpeg、png、bmp、gif、或 svg)格式图片',
            'address.required'=>'企业地址不能为空',
            'address.max'=>'企业地址格式不正确',
            'about.required'=>'企业简介不能为空',
        ]);
        // 获取表单数据
        $data = $request->except('_token','culture','_method');
        // 企业文化
        if($request->hasFile('culture')){
            // 删除原图片
            $urls = About::where('id',$id)->value('culture');
            unlink('.'.$urls);
            // 设置新名字
            $name = date('Y-m-d-H-i-s',time()).str_random(10);

            // 获取后缀
            $suffix = $request->file('culture')->getClientOriginalExtension();

            // 移动
            $request->file('culture')->move('./uploads/about/photo/',$name.'.'.$suffix);

        }
        // 添加文化图片
        $data['culture'] = '/uploads/about/photo/'.$name.'.'.$suffix;
        try{
            // 存入数据库
            $res = About::where('id',$id)->update($data);
            if($res){
                return view('/layout/jump')->with([
                        'message'=>'修改成功',
                        'url' =>'/admin/about',
                        'jumpTime'=>2
                    ]);
                }
            }catch(\Exception $e){
                return view('/layout/jump')->with([
                        'message'=>'修改失败',
                        'url' =>"/admin/about/$id/edit",
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
        $urls = About::where('id',$id)->value('culture');
        unlink('.'.$urls);
        try {
            $about = About::find($id);
            $res = $about->delete();
            $res_ = $about->abouts()->delete();
            if ($res && $res_) {
                return view('/layout/jump')->with([
                    'message'=>'删除成功',
                    'url' =>'/admin/about',
                    'jumpTime'=>2
                ]);
            }
        } catch (\Exception $e) {
            return view('/layout/jump')->with([
                    'message'=>'删除失败',
                    'url' =>'/admin/about',
                    'jumpTime'=>2
                ]);
        }
    }
}
