<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cate;
use DB;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res = Cate::where('cate_name','like','%'.$request->input('search').'%')->
                paginate($request->input('pages',10));
        $arr = ['pages'=>$request->input('pages'),'search'=>$request->input('search')];
        // 获取每页首条数据编号
        $num = $res->firstItem();
        return view('admin/cate/index',['title'=>'商品类别表',
                                        'res'=>$res,
                                        'num'=>$num,
                                        'arr'=>$arr,
                                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        error_reporting(0);
        // 分类添加页
        // $cates=Cate::select()->orderBy('cate_path')->get();
        $cates = DB::select('select *,concat(cate_path,cate_id) from shop_cate order by concat(cate_path,cate_id)');
        // dd($cates);
        return view('admin/cate/add',['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'cate_pid' => 'required',
            'cate_name' => 'required',
        ],[
            'cate_pid.required'=>'分类不能为空',
            'cate_name.required'=>'类名不能为空',
        ]);
        $res = $request->except(['_token']);
        if($res['cate_pid']==0){
            $res['cate_path'] = '0,';
        }else{
            // 根据cate_id获取cate
            $cate = Cate::where('cate_id',$res['cate_pid'])->first();
            $res['cate_path']=$cate->cate_path.$res['cate_pid'].',';
        }
        // 存入数据表
        try{
            $data = Cate::create($res);
            if($data){
                return view('/layout/jump')->with([
                        'message'=>'添加成功！',
                        'url' =>'/admin/cate',
                        'jumpTime'=>2,
                        'title'=>'添加成功'
                    ]);

            }
        } catch(\Exception $e) {

            return view('/layout/jump')->with([
                        'message'=>'添加失败！',
                        'url' =>'/admin/cate/create',
                        'jumpTime'=>2
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
        $res = Cate::where('cate_id',$id)->first();
        return view('admin.cate.edit',[
            'title'=>'类别修改页',
            'res'=>$res
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
        //表单验证
        $this->validate($request, [
            'cate_name' => 'required',
        ],[
            'cate_name.required'=>'类名不能为空',
        ]);
        $res = $request->except(['_token','_method']);
        // dd($res);
        // 修改数据表
        try{
                $data = Cate::where('cate_id',$id)->update($res);
            if($data){
                return view('/layout/jump')->with([
                        'message'=>'修改成功！',
                        'url' =>'/admin/cate',
                        'jumpTime'=>2,
                        'title'=>'修改成功'
                    ]);

            }
        } catch(\Exception $e) {

            return view('/layout/jump')->with([
                        'message'=>'修改失败！',
                        'url' =>'/admin/cate/'.$id.'/edit',
                        'jumpTime'=>2
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
        //
        $cate=Cate::where('cate_pid','=',$id)->first();
        // dd($cate);
        if($cate){
            return view('/layout/jump')->with([
                    'message'=>'有子类不能删除！',
                    'url' =>'/admin/cate',
                    'jumpTime'=>2,
                    'title'=>'删除失败'
                ]);
        }
        try {
            $res = Cate::where('cate_id',$id)->delete();
            if($res){
                return view('/layout/jump')->with([
                    'message'=>'删除成功',
                    'url' =>'/admin/cate',
                    'jumpTime'=>2,
                    'title'=>'删除成功页'
                ]);
            }
        } catch (\Exception $e) {
            return view('/layout/jump')->with([
                    'message'=>'删除失败',
                    'url' =>'/admin/cate',
                    'jumpTime'=>2
                ]);
        }
    }
}
