<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $table = 'shop_order';

    protected $primaryKey = 'id';

    public $timestamps = false;

     /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];



   
     public function orderdetail()
    {
        return $this->hasMany('App\Models\Admin\OrderDetail','id','id');
    }

   
}



