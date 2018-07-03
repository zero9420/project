<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //

     /**
     * 与模型关联的数据表
     *
     * @var string
     */

    protected $table = 'shop_goods';

    protected $primaryKey = 'goods_id';

    public $timestamps = true;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['goods_name','goods_cate',
    					'goods_price','goods_price',
    					'goods_stock','goods_sales',
    					'goods_hot','goods_desc',
                        'goods_status','created_at','updated_at'
    				];
    /**
     * 模型的日期字段保存格式。
     *
     * @var string
     */
    protected $dateFormat = 'U';
     /**
     * 获得与商品关联字段。
     */
    public function spec()
    {
        return $this->hasOne('App\Models\Admin\GoodsSpec','goods_id');
    }

}
