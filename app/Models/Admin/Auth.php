<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    //
        protected $table = 'shop_auth';

    protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['auth_name','password','email','phone','auth','created_at','profile'];
}
