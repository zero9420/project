<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{

    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'shop_position';

    protected $primaryKey = 'position_id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = [

    	'position_id',
    	'position_name',
    	'position_url',
    	'position_price',
    	'position_desc',
    	'position_status',
    	'position_image',

	];
}
