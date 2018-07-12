<?php

use Illuminate\Database\Seeder;
use DB;
class UserFill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 50; $i++) {

        	DB::table('shop_express')->create([
        		'express_title'=>'今天你知道吗?天下雨了!!!',
        		'express_url'=>'http://www.taobao.com',
        		'express_status'=>1,

        	]);
        }
    }
}
