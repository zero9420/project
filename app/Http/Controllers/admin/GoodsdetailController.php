<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Goods;
use App\Models\Admin\GoodsSpec;
use App\Models\Admin\About;
use App\Models\Admin\AboutDetail;

class GoodsdetailController extends Controller
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
     * [ajaxsize 商品规格修改]
     * @return [type] [description]
     */
    public function ajaxsize(Request $request)
    {
        $res['goods_size'] = $request->input('spec');

        $ids = $request->input('ids');

        try{
            $data = Goods::where('goods_id',$ids)->update($res);

            if($data){

                echo 1;
            }

        }catch(\Exception $e){

                echo 0;
        }
    }
    /**
     * [ajaxcolor 商品颜色修改]
     * @return [type] [description]
     */
    public function ajaxcolor(Request $request)
    {
        $res['goods_color'] = $request->input('colour');

        $ids = $request->input('id');

        try{
            $data = Goods::where('goods_id',$ids)->update($res);

            if($data){

                echo 1;
            }

        }catch(\Exception $e){

                echo 0;
        }
    }
    /**
     * [ajaxstatus 商品状态修改 上架下架]
     * @return [type] [description]
     */
    public function ajaxstatus(Request $request)
    {
        $res = $request->input('status');
        $id = $request->input('id');

        try{
            if ($res == '1') {
                $data = Goods::where('goods_id',$id)->update(['goods_status'=>'2']);
                echo 2;
            } else {
                $data = Goods::where('goods_id',$id)->update(['goods_status'=>'1']);
                echo 1;
            }


        }catch(\Exception $e){

                echo 0;
        }
    }
    /**
     * [ajaxhot 定义热卖商品]
     * @return [type] [description]
     */
    public function ajaxhot(Request $request)
    {
        $res = $request->input('hots');
        $id = $request->input('ids');

        try{
            if ($res == '1') {
                $data = Goods::where('goods_id',$id)->update(['goods_hot'=>'2']);
                echo 2;
            } else {
                $data = Goods::where('goods_id',$id)->update(['goods_hot'=>'1']);
                echo 1;
            }


        }catch(\Exception $e){

                echo 0;
        }
    }
    /**
     * [ajaxuct 商品减价]
     * @param  Request $requect [description]
     * @return [type]           [description]
     */
    public function ajaxuct(Request $requect)
    {
        $n_pres = $requect->input('n_pres');
        $id = $requect->input('id');
        $res = Goods::where('goods_id',$id)->update(['goods_preferential'=>$n_pres]);
        // echo $res;
        if($res){
            echo '01';
        } else {
            echo '00';
        }
    }
    /**
     * [ajaxadd 增加库存]
     * @param  Request $requect [description]
     * @return [type]           [description]
     */
    public function ajaxadd(Request $requect)
    {
        $num = $requect->input('stock');
        $res = Goods::where('goods_stock','<=',20)->increment('goods_stock',$num);
        // echo $res;
        if($res){
            echo '01';
        } else {
            echo '00';
        }
    }
    /**
     * [allstatus 一键全部上架]
     * @param  Request $requect [description]
     * @return [type]           [description]
     */
    public function allstatus(Request $requect)
    {
        $all = $requect->input('all');
        $res = Goods::where('goods_status','2')->update(['goods_status'=>$all]);
        // echo $res;
        if($res){
            echo '01';
        } else {
            echo '00';
        }
    }
    /**
     * [aboutstatus  修改关于我们状态]
     * @param  Request $requect [description]
     * @return [type]           [description]
     */
    public function aboutstatus(Request $requect)
    {
        $id = $requect->input('id');
        $status = $requect->input('status');
        // 查询 修改
        if($status == '2'){
            $res = About::where('status','1')->first();
            if($res){
                echo '00';
            } else {
                $req = About::where('id',$id)->update(['status'=>'1']);
                if ($req) {
                    echo '01';
                } else {
                    echo '02';
                }
            }
        } else {
            $req = About::where('id',$id)->update(['status'=>'2']);
            if ($req) {
                echo '02';
            } else {
                echo '01';
            }
        }
    }
    /**
     * [aboutdel 删除]
     * @param  Request $requect [description]
     * @return [type]           [description]
     */
    public function aboutdel(Request $requect)
    {
        $id = $requect->input('id');
        $res = AboutDetail::where('id',$id)->delete();
        // echo $res;
        if($res){
            echo '01';
        } else {
            echo '00';
        }
    }
    /**
     * [aboutedit 修改]
     * @param  Request $requect [description]
     * @return [type]           [description]
     */
    public function aboutedit(Request $requect)
    {
        $id = $requect->input('id');
        $data['event'] = $requect->input('tvs');
        $res = AboutDetail::where('id',$id)->update($data);
        if($res){
            echo '01';
        } else {
            echo '00';
        }
    }
    /**
     * [aboutedit 修改]
     * @param  Request $requect [description]
     * @return [type]           [description]
     */
    public function aboutinsert(Request $requect)
    {
        $data['about_id'] = $requect->input('id');
        $data['event'] = $requect->input('msg');
        $res = AboutDetail::insert($data);
        if($res){
            echo '01';
        } else {
            echo '00';
        }
    }
    /**
     * [addstock 单个加库存 修改]
     * @param  Request $requect [description]
     * @return [type]           [description]
     */
    public function addstock(Request $requect)
    {
        $id = $requect->input('id');
        $num = $requect->input('num');
        $res = Goods::where('goods_id',$id)->increment('goods_stock', $num);
        if($res){
            echo '01';
        } else {
            echo '00';
        }
    }
}
