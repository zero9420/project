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
    protected $fillable = ['gid','uid','oid','goods_grade','comments','created_at','updated_at'];
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
}
