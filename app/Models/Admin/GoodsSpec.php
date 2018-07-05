<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class GoodsSpec extends Model
{
     //

     /**
     * 与模型关联的数据表
     *
     * @var string
     */

    protected $table = 'shop_goods_spec';

    protected $primaryKey = 'goods_spec_id';

    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['goods_gid','goods_pic'];

    /**
     * [goods description]
     * @return [type] [description]
     */
    public function goods()
    {
        return $this->belongsTo('App\Models\Admin\Goods', 'goods_id');
    }
}
