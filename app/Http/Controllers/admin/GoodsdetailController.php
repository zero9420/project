<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Goods;
use App\Models\Admin\GoodsSpec;

class GoodsdetailController extends Controller
{
	/**
	 * [up 商品上架]
	 * @param  [type]  $id     [description]
	 * @param  integer $status [description]
	 * @return [type]          [description]
	 */
    public function up($id)
    {
        $res = Goods::where('goods_id',$id)->update(['goods_status'=>'2']);
        return redirect('/admin/goods');
    }
    /**
     * [down 商品下架]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function down($id)
    {
        $res = Goods::where('goods_id',$id)->update(['goods_status'=>'1']);
        return redirect('/admin/goods');
    }
}
