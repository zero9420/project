<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //购物车模型
      protected $table = 'shop_cart';

	  protected $primaryKey = 'id';

	  public $timestamps = false;


	 /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = [
    	'id',
    

	];
}
