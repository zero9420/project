@extends('layout.homes')

@section('title',$title)

@section('content')
<!-- heading-banner-start -->
<div class="heading-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="breadcrumb">
                    <a title="返回首页" href="/">
                        <i class="icon-home"></i>
                    </a>
                    <span class="navigation-page">
                        <span class="navigation-pipe">></span>
                        <a href="/goodslist?id={{$goods->cate->cate_id}}"title="返回{{$goods->cate->cate_name}}">{{$goods->cate->cate_name}}</a>
                        <span class="navigation-pipe">></span>
                        <a href="javascript:void(0)">商品详情</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- heading-banner-end -->

<!-- shop-detail-start -->
<div class="container">
	<div class="content">
	    <div class="body">
	        <div class="product-details">
	            <div class="container">
	                <div class="row">
	                    <div class="col-md-5 col-xs-12 col-sm-5">
	                        <div class="picture-tab">
	                            <ul class="pic-tabs">
	                            	@foreach($goods->spec as $k=>$v)
	                                <li class=" "><a data-toggle="tab" href="#pic{{$v->goods_spec_id}}" aria-expanded="true"><img src="{{$v->goods_pic}}" alt=""></a></li>
	                                @endforeach
	                            </ul>
	                            <div class="tab-content">
	                            <div id="pic{{$goods->spec[0]->goods_spec_id}}" class="tab-pane fade in active">
	                                <!-- single-product-start -->
	                                <div class="single-product">
	                                    <div class="single-product-img">
	                                        <a href="#">
	                                            <img src="{{$goods->spec[0]->goods_pic}}" alt="">
	                                        </a>
	                                        @if($goods->goods_hot == '2')
	                                        <span class="sale-box">
	                                            <span class="sale">热销</span>
	                                        </span>
	                                        @endif
	                                    </div>
	                                </div>
	                                <!-- single-product-end -->
	                            </div>
	                            @foreach($goods->spec as $k=>$v)
	                                <div id="pic{{$v->goods_spec_id}}" class="tab-pane fade">
	                                    <!-- single-product-start -->
	                                    <div class="single-product">
	                                        <div class="single-product-img">
	                                            <a href="#">
	                                                <img src="{{$v->goods_pic}}" alt="">
	                                            </a>
	                                            @if($goods->goods_hot == '2')
		                                        <span class="sale-box">
		                                            <span class="sale">热销</span>
		                                        </span>
		                                        @endif
	                                        </div>
	                                    </div>
	                                    <!-- single-product-end -->
	                                </div>
	                            @endforeach
	                            </div>
	                        </div>
	                    </div>

	                    <div class="col-md-7 col-xs-12 col-sm-7">
	                        <div class="product-details-info">
	                            <h5 class="product-title">{{$goods->goods_name}}</h5>
	                        <form action="/home/cart/{{$goods->goods_id}}" method='POST'>
	                        	{{ csrf_field() }}
	                            <div class="price-box">
	                                @if($goods->goods_preferential != $goods->goods_price)
                                    <span class="price">
                                        ￥{{$goods->goods_preferential}}
                                        <input type="hidden" name="new_price" value="{{$goods->goods_preferential}}">
                                    </span>
                                    <span class="old-price">
                                        ￥{{$goods->goods_price}}
                                        <input type="hidden" name="old_price" value="{{$goods->goods_price}}">
                                    </span>
                                    @else
                                    <span class="price">
                                        ￥{{$goods->goods_price}}
                                        <input type="hidden" name="old_price" value="{{$goods->goods_price}}">
                                        <input type="hidden" name="new_price" value="{{$goods->goods_price}}">
                                    </span>
                                    @endif
	                            </div>
	                            @if( empty(session('user_id')) )
		                            <div class="rating">
	                                    <a class="" href="/home/logins" title="加入我的收藏">
	                                        <i class="fa fa-heart"></i>
	                                        <span>收藏宝贝 </span>
	                                    </a>
		                            </div>
	                            @else
		                            @if(  in_array( $goods->goods_id,$arr) )
		                            <div class="rating">
	                                    <a class="add-wishlist" href="#" title="取消我的收藏" style="color:#ff6464;">
	                                        <i class="fa fa-heart"></i>
	                                        <span class='collect' id="<?php echo $goods->goods_id ?>" onclick="sto({{$goods->goods_id}})"  >取消收藏 </span>
	                                    </a>
		                            </div>
		                            @else
		                            <div class="rating">
	                                    <a class="add-wishlist" href="#" title="加入我的收藏">
	                                        <i class="fa fa-heart"></i>
	                                        <span class='collect' id="<?php echo $goods->goods_id ?>" onclick="sta({{$goods->goods_id}})" >收藏宝贝 </span>
	                                    </a>
		                            </div>
		                            @endif
		                        @endif
	                            <div class="short-description">
	                                <p>{{$goods->goods_info}}
	                                </p>
	                            </div>
	                            <div class="add-cart">
	                            	<span>销量:</span>
	                            	<a href="javascript:void(0)">
	                            		<span>{{$goods->goods_sales}}</span>
	                            	</a>
	                            </div>
	                            <div class="add-cart">
	                            	<span>尺码:</span>
	                            	@foreach($size as $k=>$v)
	                            	<a href="javascript:void(0)">
	                            		<input type="radio" name="goods_size" value="{{$v}}">
	                            		<span>{{strtoupper($v)}}</span>
	                            	</a>
	                            	@endforeach
	                            </div>
	                            <div class="add-cart">
	                            	<span>颜色:</span>
	                            	@foreach($color as $k=>$v)
	                            	<a href="javascript:void(0)">
	                            		<input type="radio" name="goods_color" value="{{$v}}">
	                            		<span>{{$v}}</span>
	                            	</a>
	                            	@endforeach
	                            </div>
	                            <div class="add-cart">
	                                <p class="quantity cart-plus-minus">
	                                    <label>购买数量</label>
	                                    <input type="text" value="1" name="num">
	                                </p>
	                                <div class="shop-add-cart">
	                                    <button class="addCart">加入购物车</button>
	                                    <button class="addCart" style="background: #ff6464;" title="点击按钮,到下一步确定购买信息!">立即购买</button>
	                                </div>
	                            </div>
	                        </form>
	                            <div class="widget-icon">
	                            </div>
	                            <style>
	                            	.add-cart a{
	                            		margin-right: 10px;
	                            	}
	                            	.add-cart span{
	                            		margin-right: 10px;
	                            	}
	                            </style>
	                            <div class="add-cart">
	                            	<span>承诺:</span>
	                            	<a href="javascript:void(0)">
	                            		<img src="/home/bs/img/detail/qitian.png" alt="" title="满足七天退货的前提下,包邮商品需买家承担退货运费!">
	                            		<span>七天退货</span>
	                            	</a>
	                            	<a href="javascript:void(0)">
	                            		<img src="/home/bs/img/detail/dingdanxian.png" alt="" title="订单险">
	                            		<span>订单险</span>
	                            	</a>
	                            	<a href="javascript:void(0)">
	                            		<img src="/home/bs/img/detail/wuyoutuihuo.png" alt="" title="无忧退货">
	                            		<span>无忧退货</span>
	                            	</a>
	                            	<a href="javascript:void(0)">
	                            		<img src="/home/bs/img/detail/yunfeixian.png" alt="" title="运费险">
	                            		<span>运费险</span>
	                            	</a>
	                            </div>
	                            <div class="widget-icon">
	                            </div>
	                            <div class="add-cart" style="margin-right: 20px;">
	                            	<span >支付:</span>
	                            	<a href="javascript:void(0)">
	                            		<img src="/home/bs/img/detail/zhifubao.png" alt="" title="支付宝">
	                            		<span>支付宝</span>
	                            	</a>
	                            	<a href="javascript:void(0)">
	                            		<img src="/home/bs/img/detail/weixin.png" alt="" title="微信">
	                            		<span>微信</span>
	                            	</a>
	                            	<a href="javascript:void(0)">
	                            		<img src="/home/bs/img/detail/xinyongka.png" alt="" title="信用卡">
	                            		<span>信用卡</span>
	                            	</a>
	                            	<a href="javascript:void(0)">
	                            		<img src="/home/bs/img/detail/mayihuabei.png" alt="" title="蚂蚁花呗">
	                            		<span>蚂蚁花呗</span>
	                            	</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<!-- shop-detail-end -->

<!-- brand-area-start 相关商品 -->
<div class="brand-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h3>相关商品</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="brands wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                <div class="brand-carousel">
                	@foreach($related as $k=>$v)
                    <div class="col-md-12">
                        <div class="single-brand">
                            <a href="/goodsdetail/{{$v->goods_id}}">
                                <img src="{{$v->spec[0]->goods_pic}}" alt="{{$v->goods_name}}" title="{{$v->goods_name}}" />
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand-area-end -->

<!-- shop-area-start -->
<div class="shop-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="shop-left-col wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                    <div class="content-box">
                        <h2>在线云客服</h2>
                        <ul>
                            <li>
                            	<a class="btn btn-info" href="https://www.sobot.com/chat/pc/index.html?sysNum=5f9e61cabbdc4577b59b9a02664d137b" title="云商城在线客服,点击联系客服!">
								  云商城在线客服<span class="badge"><img src="/home/bs/img/detail/kefu.png" alt="云商城在线客服"></span>
								</a>
                            </li>
                            <li>
                            	<div class="row">
								    <div class="col-sm-12 col-md-12">
								        <div class="thumbnail">
								            <img src="{{$goods->spec[0]->goods_pic}}" alt="...">
								            <div class="caption">
								                <h3>
								                    云商城购物中心
								                </h3>
								                <p>
								                    {{$goods->goods_info}}
								                </p>
								            </div>
								        </div>
								    </div>
								</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="shop-right-col wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                    <div class="category-products">
                        <div class="topbar-category">
                            <div class="pager-area">
                                <div>
                                    <!-- Nav tabs -->
                                    <ul class="btn-group">
                                    	<style>.lis{float:left;margin:2px;}</style>
                                        <li role="presentation" class="active lis"><a class="btn btn-info" href="#gried_view" role="tab" data-toggle="tab" title="商品详情">商品详情</a>
                                        </li>
                                        <li role="presentation" class="lis"><a href="#list_view" role="tab" data-toggle="tab" title="商品评价" class="btn btn-primary">累计评价<span class="badge">{{count($comments)}}</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="shop-category-product">
                            <div class="row">
                                <div class="category-product">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active fade in" id="gried_view">
                                            <div class="col-md-12 col-sm-12 col-xs-12 mar-bot">
                                                <!-- single-product-start -->
                                                <div class="single-product">
                                                	<table class="table table-hover">
 														<tr>
 															<td>尺码:</td>
 															<td>
 																@foreach($size as $k=>$v)
			                                                		<span>{{strtoupper($v)}}&nbsp;&nbsp;</span>
			                                                	@endforeach
 															</td>
 														</tr>
 														<tr>
 															<td>颜色:</td>
 															<td>
 																@foreach($color as $k=>$v)
			                                                		<span>{{$v}}&nbsp;&nbsp;</span>
			                                                	@endforeach
 															</td>
 														</tr>
 														<tr>
 															<td>适用场景:</td>
 															<td>
			                                                	<span>日常</span>
 															</td>
 														</tr>
 														<tr>
 															<td>适用季节:</td>
 															<td>
			                                                	<span>四季</span>
 															</td>
 														</tr>
													</table>
                                                </div>
                                                <div class="single-product">
                                                	<style>
                                                		p{
                                                			margin: 0px;
                                                			padding: 0px;
                                                		}
                                                	</style>
                                                    <div class="single-product-img">
                                                        {!!$goods->goods_desc!!}
                                                    </div>
                                                </div>
                                                <!-- single-product-end -->
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="list_view">
                                            <div class="list-view">
                                                <div class="row">
                                                	@foreach($comments as $v)
                                                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
                                                        <!-- shop-eval-start -->
                                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                                        	<div class="col-md-12">{{$v->comments}}</div>
                                                        	<div class="col-md-12">
							                                    <span class="label label-info">商品星级评价</span>&nbsp;:&nbsp;
							                                    @if($v->goods_grade == '2.0')
							                                    <a href="javascript:void(0)" title="很不满意!"><img src="/home/bs/pingjia/img/yixing.png" alt=""></a>
							                                    @elseif($v->goods_grade == '4.0')
							                                    <a href="javascript:void(0)" title="不满意!"><img src="/home/bs/pingjia/img/erxing.png" alt=""></a>
							                                    @elseif($v->goods_grade == '6.0')
							                                    <a href="javascript:void(0)" title="一般!"><img src="/home/bs/pingjia/img/sanxing.png" alt=""></a>
							                                    @elseif($v->goods_grade == '8.0')
							                                    <a href="javascript:void(0)" title="满意!"><img src="/home/bs/pingjia/img/sixing.png" alt=""></a>
							                                    @elseif($v->goods_grade == '10.0')
							                                    <a href="javascript:void(0)" title="非常满意!"><img src="/home/bs/pingjia/img/wuxing.png" alt=""></a>
							                                    @endif
							                                </div>
							                                <div class="col-md-12">
							                                	@foreach($v->evalua as $ve)
								                                    <div class="col-xs-4 col-md-2">
																	    <a href="javascript:void(0)" class="thumbnail">
																	     	<img src="{{$ve->eval_pic}}" alt="..." data-toggle="modal" data-target="#myModal{{$ve->did}}">
																	    </a>
																	</div>
																@endforeach
							                                </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                                        	<span>颜色:</span>{{$v->order->goods_color}}<br/>
                                                        	<span>尺码:</span>{{$v->order->goods_size}}
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                                        	<span class="label label-info">用户名</span>{{substr($v->user->username,0,2)}}********
                                                        </div>
                                                        <!-- shop-eval-end -->
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shop-area-end -->
@foreach($comments as $v)
@foreach($v->evalua as $ve)
<div class="modal fade" id="myModal{{$ve->did}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:500px;height: auto;">
    <div class="modal-content">
	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	        <img src="{{$ve->eval_pic}}" alt="" style="width:100%;height: auto;">
	    </div>
    </div>
  </div>
</div>
@endforeach
@endforeach


@endsection

@section('js')
<script>

	// 收藏宝贝
	function sta($id){

		var id = $id;

		$.get('/home/back',{id:id},function(data){


			   window.location.reload();
			   
		})


	}


	// 取消收藏
	function sto($id){

		var id = $id;


		$.get('/home/back',{id:id},function(data){

			   window.location.reload();

		})

	}

	

</script>

@endsection
