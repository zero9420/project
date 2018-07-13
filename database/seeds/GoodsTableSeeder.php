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
    	for ($i=1; $i < 150; $i++) {
    		$res = Goods::create([
	            'goods_name' => '天王盖地虎'.str_random(8),
	            'cate_id' => mt_rand(1,7),
	            'goods_price' => mt_rand(5000,6000),
                'goods_preferential'=>mt_rand(4000,5000),
	        	'goods_color' => '红色|蓝色|黄色|白色|黑色|紫色|粉红色',
                'goods_size' => '36|37|38|39|40',
	        	'goods_info' => '大江东去，浪淘尽，千古风流人物。故垒西边，人道是，三国周郎赤壁。乱石穿空，惊涛拍岸，卷起千堆雪。江山如画，一时多少豪杰。遥想公瑾当年，小乔初嫁了，雄姿英发。羽扇纶巾，谈笑间，樯橹灰飞烟灭。故国神游，多情应笑我，早生华发。人生如梦一尊还酹江月',
	            'goods_hot' => mt_rand(1,2),
	            'goods_status' => mt_rand(1,2),
	            'goods_desc' => '<p><img src="/uploads/goods/detail.jpg" style="" title="填充图片"/></p><p><img src="/uploads/goods/detail.jpg" style="" title="填充图片"/></p><p><img src="/uploads/goods/detail.jpg" style="" title="填充图片"/></p><p><img src="/uploads/goods/detail.jpg" style="" title="填充图片"/></p><p><img src="/uploads/goods/detail.jpg" style="" title="填充图片"/></p><p><br/></p>'
        	]);
        	$goods_gid = $res->goods_id;
        	$goods_pic = ['goods_gid'=>$goods_gid,'goods_pic'=>'/uploads/goods/gpic.jpg'];
        	GoodsSpec::create($goods_pic);
    	}
    }
}
