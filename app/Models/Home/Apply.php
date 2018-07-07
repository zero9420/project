<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
	  protected $table = 'shop_order';

	  protected $primaryKey = 'order_id';

	  public $timestamps = false;


	 /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = [

    	'order_id',
    	'order_cat',
    	'order_payment',
    	'order_phone',
    	'order_name',
    	'order_addr',
    	'order_status',
    

	];
}
