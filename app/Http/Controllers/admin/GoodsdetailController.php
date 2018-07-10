<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Goods;
use App\Models\Admin\GoodsSpec;

class GoodsdetailController extends Controller
{
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
}
