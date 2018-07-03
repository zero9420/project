<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Goods;
use App\Models\Admin\GoodsSpec;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i < 301; $i++) {
    		Goods::create([
	            'goods_name' => '天王盖地虎',
	            'goods_cate' => '电脑 / 办公',
	            'goods_price' => '7777.77',
	            'goods_stock' => '100',
	            'goods_hot' => '1',
	            'goods_desc' => '天王盖地虎,小鸡炖蘑菇!!!!!',
	            'goods_status' => '0'
        	]);
	        GoodsSpec::create([
	        	'goods_id' => $i,
	        	'goods_color' => '红色|蓝色|黄色|白色|黑色|紫色|粉红色',
	        	'goods_size' => '均码|S|M|L|XS|XL',
	            'goods_pic1' => '/uploads/goods/picture.png',
	            'goods_pic2' => '/uploads/goods/picture.png',
	            'goods_pic3' => '/uploads/goods/picture.png',
	            'goods_pic4' => '/uploads/goods/picture.png',
	            'goods_pic5' => '/uploads/goods/picture.png',
	        ]);
    	}
    }
}
