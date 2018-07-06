<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;


class Info extends Model
{

     /**
     * 与模型关联的数据表
     *
     * @var string
     */
	  protected $table = 'shop_info';

	  protected $primaryKey = 'info_id';

	  public $timestamps = false;


	 /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = [

    	'info_id',
    	'info_cid',
    	'info_name',
    	'info_sex',
    	'info_nickname',
    	'info_telphone',
    	'info_image',
    	'info_uid',
    	'info_address',

	];

      /**
     * 获得与用户关联的电话记录。
     */
    public function order()
    {
        return $this->hasOne('App\Models\Home\order','order_name');
    }


}
