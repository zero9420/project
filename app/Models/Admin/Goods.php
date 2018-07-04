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
    protected $fillable = ['goods_name',
                        'cate_id','goods_price',
                        'goods_stock','goods_sales',
                        'goods_color','goods_size',
                        'goods_hot','goods_status',
                        'goods_desc',
                        'created_at','updated_at'
    				];
    /**
     * 模型的日期字段保存格式。
     *
     * @var string
     */
    protected $dateFormat = 'U';
    /**
     * [comments description]
     * @return [type] [description]
     */
    public function spec()
    {
        return $this->hasMany('App\Models\Admin\GoodsSpec', 'goods_gid');
    }

    /**
     * [cate description]
     * @return [type] [description]
     */
    public function cate()
    {
        return $this->belongsTo('App\Models\Admin\Cate', 'cate_id');
    }

}
