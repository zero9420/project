<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AboutDetail extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */

    protected $table = 'shop_about_detail';

    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['about_id','event'];
}
