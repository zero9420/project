<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $table = 'shop_order';

    protected $primaryKey = 'order_id';

    public $timestamps = false;

     /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

   
}
