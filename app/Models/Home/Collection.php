<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
	  protected $table = 'shop_collection';

	  protected $primaryKey = 'collection_id';

	  public $timestamps = false;


	 /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = [

    	'collection_id',
    	'collection_gid',
    	'collection_cid',
    	
	];


   
}
