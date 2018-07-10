<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Express extends Model
{
    protected $table = 'shop_express';

    protected $primaryKey = 'shop_express';

    public $timestamps = true;

     /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

}
