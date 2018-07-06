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
	            'goods_name' => '天王盖地虎'.str_random(5),
	            'cate_id' => mt_rand(1,50),
	            'goods_price' => mt_rand(100,10000),
	            'goods_stock' => mt_rand(100,1000),
	        	'goods_color' => '红色|蓝色|黄色|白色|黑色|紫色|粉红色',
	        	'goods_size' => '36|37|38|39|40',
	            'goods_hot' => '1',
	            'goods_status' => mt_rand(1,2),
	            'goods_desc' => '<p><img src="/uploads/goods/image/20180705/1530758286142130dhy6hyuuypd6n5qy.jpg" style="" title="153075966117-121109161R1.jpg"/></p><p><img src="/uploads/goods/image/20180705/1530758286142130dhy6hyuuypd6n5qy.jpg" style="" title="1530758286142130dhy6hyuuypd6n5qy.jpg"/></p><p><img src="/uploads/goods/image/20180705/1530758286142130dhy6hyuuypd6n5qy.jpg" style="" title="1530758286142130dhy6hyuuypd6n5qy.jpg"/></p><p><img src="/uploads/goods/image/20180705/1530758286142130dhy6hyuuypd6n5qy.jpg" style="" title="1530758286142130dhy6hyuuypd6n5qy.jpg"/></p><p><br/></p>'
        	]);
        	$goods_gid = $res->goods_id;
        	$goods_pic = ['goods_gid'=>$goods_gid,'goods_pic'=>'/uploads/goods/photo/2018-07-04-21-24-3483MabP8Q3v.jpg'];
        	GoodsSpec::create($goods_pic);
    	}
    }
}
