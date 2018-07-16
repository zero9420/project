<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
	  protected $table = 'shop_order_detail';

	  protected $primaryKey = 'id';

	  public $timestamps = false;

	  protected $guarded = [];

}
