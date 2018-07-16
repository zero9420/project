<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Evalua extends Model
{
    //

     /**
     * 与模型关联的数据表
     *
     * @var string
     */

    protected $table = 'shop_goods_eval';

    protected $primaryKey = 'eid';

    public $timestamps = true;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * 模型的日期字段保存格式。
     *
     * @var string
     */
    protected $dateFormat = 'U';
    /**
     * [comments 评论详情表]
     * @return [type] [description]
     */
    public function evalua()
    {
        return $this->hasMany('App\Models\Home\Evaldetail','eid');
    }
    /**
     * 获得与用户关联的订单记录。
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Home\OrderDetail','oid','order_id');
    }
    /**
     * 获得与用户关联的姓名。
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Home\User','uid','id');
    }
}
