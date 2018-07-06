<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
      //用户管理模型
        protected $table = 'shop_user';

    protected $primaryKey ='id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['username','password','email','phone','status'];
}
