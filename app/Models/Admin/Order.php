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



     public function goodsspec()
    {
        return $this->hasMany('App\Models\Admin\GoodsSpec;','goods_gid');
    }

     public function goods()
    {
        return $this->hasMany('App\Models\Admin\Goods','goods_id');
    }

   
}



