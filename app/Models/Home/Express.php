<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Express extends Model
{
    protected $table = 'shop_express';

    protected $primaryKey = 'express_id';

    public $timestamps = false;

     /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];
}
