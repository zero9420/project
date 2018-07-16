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
    	for ($i=1; $i < 100; $i++) {
    		$res = Goods::create([
	            'goods_name' => '云购物商城'.str_random(8),
                'cate_id' => mt_rand(1,7),
	            'goods_stock' => mt_rand(500,800),
	            'goods_price' => mt_rand(5000,6000),
                'goods_preferential'=>mt_rand(4000,5000),
	        	'goods_color' => '红色|蓝色|黄色|白色|黑色|紫色|粉红色',
                'goods_size' => '36|37|38|39|40',
	        	'goods_info' => '面料舒适，锁边工整，彰显品质，穿着轻松自如，鲜亮的颜色永远是漂亮MM的最爱，百搭款式，奏响青春节拍，瘦身的设计款式有条理的纹理编织布料显现女性柔美气质!!!',
	            'goods_hot' => mt_rand(1,2),
	            'goods_status' => mt_rand(1,2),
	            'goods_desc' => '<p><img src="/uploads/goods/image/20180713/1.png" style="" title="填充图片"/></p><p><img src="/uploads/goods/image/20180713/2.png" style="" title="填充图片"/></p><p><img src="/uploads/goods/image/20180713/3.png" style="" title="填充图片"/></p><p><img src="/uploads/goods/image/20180713/4.png" style="" title="填充图片"/></p><p><img src="/uploads/goods/image/20180713/5.png" style="" title="填充图片"/></p><p><img src="/uploads/goods/image/20180713/6.png" style="" title="填充图片"/></p><p><img src="/uploads/goods/image/20180713/7.png" style="" title="填充图片"/></p><p><img src="/uploads/goods/image/20180713/8.png" style="" title="填充图片"/></p><p><img src="/uploads/goods/image/20180713/9.png" style="" title="填充图片"/></p><p><br/></p>'
        	]);
        	$goods_gid = $res->goods_id;
            $goods = Goods::find($goods_gid);
            $goods->spec()->createMany([
                                    [
                                        'goods_gid' => $goods_gid,
                                        'goods_pic'=>'/uploads/goods/gpic1.jpg',
                                    ],
                                    [
                                        'goods_gid' => $goods_gid,
                                        'goods_pic'=>'/uploads/goods/gpic2.png',
                                    ],
                                    [
                                        'goods_gid' => $goods_gid,
                                        'goods_pic'=>'/uploads/goods/gpic3.jpg',
                                    ],
                                    [
                                        'goods_gid' => $goods_gid,
                                        'goods_pic'=>'/uploads/goods/gpic4.jpg',
                                    ],
                                ]);
        	// $goods_pic = ['goods_gid'=>,'goods_pic'=>'/uploads/goods/gpic.jpg'];
        	// GoodsSpec::create($goods_pic);
    	}
    }
}
