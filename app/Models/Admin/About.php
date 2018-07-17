<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //

     /**
     * 与模型关联的数据表
     *
     * @var string
     */

    protected $table = 'shop_about';

    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * 不可被批量赋值的属性。。
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * [about description]
     * @return [type] [description]
     */
    public function abouts()
    {
        return $this->hasMany('App\Models\Admin\AboutDetail', 'about_id');
    }
}
