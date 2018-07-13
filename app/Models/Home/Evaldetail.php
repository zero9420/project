<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Evaldetail extends Model
{
    //

     /**
     * 与模型关联的数据表
     *
     * @var string
     */

    protected $table = 'shop_eval_detail';

    protected $primaryKey = 'did';

    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['eid','eval_pic'];
}
