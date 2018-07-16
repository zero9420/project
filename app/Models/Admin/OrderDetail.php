<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'shop_order_detail';

    protected $primaryKey = 'id';

    public $timestamps = false;

     /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];
}
