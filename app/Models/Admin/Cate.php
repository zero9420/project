<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
     //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */

    protected $table = 'shop_cate';

    protected $primaryKey = 'cate_id';

    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['cate_name','cate_pid','cate_path'];

}
