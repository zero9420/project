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
    	for ($i=1; $i < 300; $i++) {
    		$res = Goods::create([
	            'goods_name' => '天王盖地虎'.str_random(8),
	            'cate_id' => mt_rand(1,6),
	            'goods_price' => mt_rand(100,10000),
	        	'goods_color' => '红色|蓝色|黄色|白色|黑色|紫色|粉红色',
                'goods_size' => '36|37|38|39|40',
	        	'goods_info' => '大江东去，浪淘尽，千古风流人物。故垒西边，人道是，三国周郎赤壁。乱石穿空，惊涛拍岸，卷起千堆雪。江山如画，一时多少豪杰。遥想公瑾当年，小乔初嫁了，雄姿英发。羽扇纶巾，谈笑间，樯橹灰飞烟灭。故国神游，多情应笑我，早生华发。人生如梦一尊还酹江月',
	            'goods_hot' => '1',
	            'goods_status' => mt_rand(1,2),
	            'goods_desc' => '<p><img src="/uploads/goods/image/20180709/1531128571142130dhy6hyuuypd6n5qy.jpg" style="" title="1531128571142130dhy6hyuuypd6n5qy.jpg"/></p><p><img src="/uploads/goods/image/20180709/1531128571142130dhy6hyuuypd6n5qy.jpg" style="" title="1531128571142130dhy6hyuuypd6n5qy.jpg"/></p><p><img src="/uploads/goods/image/20180709/1531128571142130dhy6hyuuypd6n5qy.jpg" style="" title="1531128571142130dhy6hyuuypd6n5qy.jpg"/></p><p><img src="/uploads/goods/image/20180709/1531128571142130dhy6hyuuypd6n5qy.jpg" style="" title="1531128571142130dhy6hyuuypd6n5qy.jpg"/></p><p><br/></p>'
        	]);
        	$goods_gid = $res->goods_id;
        	$goods_pic = ['goods_gid'=>$goods_gid,'goods_pic'=>'/uploads/goods/photo/2018-07-04-21-24-3483MabP8Q3v.jpg'];
        	GoodsSpec::create($goods_pic);
    	}
    }
}
