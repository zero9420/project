<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $table = 'shop_order';

	  protected $primaryKey = 'id';

	  public $timestamps = false;

	  
	  protected $guarded = [];
}
