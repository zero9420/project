@extends('layout.homes')

@section('title',$title)

@section('content')
<div class="container">
	<div class="content">
	    <div class="header">
	        <a title="返回首页" href="/">
	            <i class="icon-home"></i>
	        </a>
	        <span class=" ">
	            <span class="navigation-pipe">></span>
	            <a href="/goodslist" title="返回所有商品">所有商品</a>
	        </span>
	        <span class=" ">
	            <span class="navigation-pipe">></span>
	            <a href="/goodslist/{{$goods->cate->cate_id}}" title="返回{{$goods->cate->cate_name}}">{{$goods->cate->cate_name}}</a>
	        </span>
	    </div>
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
	                                        <span class="sale-box">
	                                            <span class="sale">热销</span>
	                                        </span>
	                                        <span class="new-box">
	                                            <span class="new">新品上市</span>
	                                        </span>
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
	                                            <span class="sale-box">
	                                                <span class="sale">热销</span>
	                                            </span>
	                                            <span class="new-box">
	                                                <span class="new">新品上市</span>
	                                            </span>
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
	                            <div class="price-box">
	                                <span class="price">￥{{$goods->goods_price}}</span>
	                                <span class="old-price">￥70.00</span>
	                            </div>
	                            <div class="rating">
	                                <div class="star star-on"></div>
	                                <div class="star star-on"></div>
	                                <div class="star star-on"></div>
	                                <div class="star star-on"></div>
	                                <div class="star"></div>
	                            </div>
	                            <div class="short-description">
	                                <p>{{$goods->goods_info}}
	                                </p>
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
	                                    <input type="text" value="1">
	                                </p>
	                                <div class="shop-add-cart">
	                                    <button>加入购物车</button>
	                                </div>
	                            </div>
	                            <div class="widget-icon">
	                                <a href="#">
	                                    <i class="fa fa-facebook"></i>
	                                </a>
	                                <a href="#">
	                                    <i class="fa fa-twitter"></i>
	                                </a>
	                                <a href="#">
	                                    <i class="fa fa-linkedin"></i>
	                                </a>
	                                <a href="#">
	                                    <i class="fa fa-google-plus"></i>
	                                </a>
	                            </div>
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
	                            	<a href="">
	                            		<img src="/home/bs/img/detail/qitian.png" alt="" title="满足七天退货的前提下,包邮商品需买家承担退货运费!">
	                            		<span>七天退货</span>
	                            	</a>
	                            	<a href="">
	                            		<img src="/home/bs/img/detail/dingdanxian.png" alt="" title="订单险">
	                            		<span>订单险</span>
	                            	</a>
	                            	<a href="">
	                            		<img src="/home/bs/img/detail/wuyoutuihuo.png" alt="" title="无忧退货">
	                            		<span>无忧退货</span>
	                            	</a>
	                            	<a href="">
	                            		<img src="/home/bs/img/detail/yunfeixian.png" alt="" title="运费险">
	                            		<span>运费险</span>
	                            	</a>
	                            </div>
	                            <div class="widget-icon">
	                            </div>
	                            <div class="add-cart" style="margin-right: 20px;">
	                            	<span >支付:</span>
	                            	<a href="">
	                            		<img src="/home/bs/img/detail/zhifubao.png" alt="" title="支付宝">
	                            		<span>支付宝</span>
	                            	</a>
	                            	<a href="">
	                            		<img src="/home/bs/img/detail/weixin.png" alt="" title="微信">
	                            		<span>微信</span>
	                            	</a>
	                            	<a href="">
	                            		<img src="/home/bs/img/detail/xinyongka.png" alt="" title="信用卡">
	                            		<span>信用卡</span>
	                            	</a>
	                            	<a href="">
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
                            <a href="#">
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
                        <h2>Categories</h2>
                        <ul>
                            <li>
                                <span class="checkit">
                                    <input class="checkbox" type="checkbox" />
                                </span>
                                <label class="check-label">
                                    <a href="#">Cloths (13)</a>
                                </label>
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
                                    	<style>li{float:left;margin:2px;}</style>
                                        <li role="presentation" class="active"><a class="btn btn-info" href="#gried_view" role="tab" data-toggle="tab" title="商品详情">商品详情</a>
                                        </li>
                                        <li role="presentation"><a href="#list_view" role="tab" data-toggle="tab" title="商品评价" class="btn btn-primary">商品评价<span class="badge">4</span></a>
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
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-img">
                                                                    <a href="#">
                                                                        <img src="/home/bs/img/singlepro/1.jpg" alt="" />
                                                                    </a>
                                                                    <span class="sale-box">
                                                                        <span class="sale">Sale</span>
                                                                    </span>
                                                                    <span class="new-box">
                                                                        <span class="new">New</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-content">
                                                                    <div class="product-title">
                                                                        <h5>
                                                                            <a href="#">Fermentum dictum</a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                    </div>
                                                                    <div class="price-box">
                                                                        <span class="price">£50.00</span>
                                                                        <span class="old-price">£70.00</span>
                                                                    </div>
                                                                    <p class="product-desc">Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!
                                                                    </p>
                                                                    <div class="product-action">
                                                                        <button class="button btn btn-default add-cart" title="add to cart">Add to cart</button>
                                                                        <a class="add-wishlist" href="#" title="add to wishlist">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <a class="quick-view" href="#" title="quick view"  data-toggle="modal" data-target="#myModal">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="availability">
                                                                        <span>In stock</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 top-mar">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-img">
                                                                    <a href="#">
                                                                        <img src="/home/bs/img/singlepro/7.jpg" alt="" />
                                                                    </a>
                                                                    <span class="sale-box">
                                                                        <span class="sale">Sale</span>
                                                                    </span>
                                                                    <span class="new-box">
                                                                        <span class="new">New</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-content">
                                                                    <div class="product-title">
                                                                        <h5>
                                                                            <a href="#">Fermentum dictum</a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                    </div>
                                                                    <div class="price-box">
                                                                        <span class="price">£50.00</span>
                                                                        <span class="old-price">£70.00</span>
                                                                    </div>
                                                                    <p class="product-desc">Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!
                                                                    </p>
                                                                    <div class="product-action">
                                                                        <button class="button btn btn-default add-cart" title="add to cart">Add to cart</button>
                                                                        <a class="add-wishlist" href="#" title="add to wishlist">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <a class="quick-view" href="#" title="quick view"  data-toggle="modal" data-target="#myModal">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="availability">
                                                                        <span>In stock</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 top-mar">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-img">
                                                                    <a href="#">
                                                                        <img src="/home/bs/img/singlepro/2.jpg" alt="" />
                                                                    </a>
                                                                    <span class="sale-box">
                                                                        <span class="sale">Sale</span>
                                                                    </span>
                                                                    <span class="new-box">
                                                                        <span class="new">New</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-content">
                                                                    <div class="product-title">
                                                                        <h5>
                                                                            <a href="#">Fermentum dictum</a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                    </div>
                                                                    <div class="price-box">
                                                                        <span class="price">£50.00</span>
                                                                        <span class="old-price">£70.00</span>
                                                                    </div>
                                                                    <p class="product-desc">Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!
                                                                    </p>
                                                                    <div class="product-action">
                                                                        <button class="button btn btn-default add-cart" title="add to cart">Add to cart</button>
                                                                        <a class="add-wishlist" href="#" title="add to wishlist">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <a class="quick-view" href="#" title="quick view"  data-toggle="modal" data-target="#myModal">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="availability">
                                                                        <span>In stock</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 top-mar">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-img">
                                                                    <a href="#">
                                                                        <img src="/home/bs/img/singlepro/8.jpg" alt="" />
                                                                    </a>
                                                                    <span class="sale-box">
                                                                        <span class="sale">Sale</span>
                                                                    </span>
                                                                    <span class="new-box">
                                                                        <span class="new">New</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-content">
                                                                    <div class="product-title">
                                                                        <h5>
                                                                            <a href="#">Fermentum dictum</a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                    </div>
                                                                    <div class="price-box">
                                                                        <span class="price">£50.00</span>
                                                                        <span class="old-price">£70.00</span>
                                                                    </div>
                                                                    <p class="product-desc">Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!
                                                                    </p>
                                                                    <div class="product-action">
                                                                        <button class="button btn btn-default add-cart" title="add to cart">Add to cart</button>
                                                                        <a class="add-wishlist" href="#" title="add to wishlist">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <a class="quick-view" href="#" title="quick view"  data-toggle="modal" data-target="#myModal">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="availability">
                                                                        <span>In stock</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 top-mar">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-img">
                                                                    <a href="#">
                                                                        <img src="/home/bs/img/singlepro/3.jpg" alt="" />
                                                                    </a>
                                                                    <span class="sale-box">
                                                                        <span class="sale">Sale</span>
                                                                    </span>
                                                                    <span class="new-box">
                                                                        <span class="new">New</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-content">
                                                                    <div class="product-title">
                                                                        <h5>
                                                                            <a href="#">Fermentum dictum</a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                    </div>
                                                                    <div class="price-box">
                                                                        <span class="price">£50.00</span>
                                                                        <span class="old-price">£70.00</span>
                                                                    </div>
                                                                    <p class="product-desc">Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!
                                                                    </p>
                                                                    <div class="product-action">
                                                                        <button class="button btn btn-default add-cart" title="add to cart">Add to cart</button>
                                                                        <a class="add-wishlist" href="#" title="add to wishlist">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <a class="quick-view" href="#" title="quick view"  data-toggle="modal" data-target="#myModal">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="availability">
                                                                        <span>In stock</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 top-mar">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-img">
                                                                    <a href="#">
                                                                        <img src="/home/bs/img/singlepro/9.jpg" alt="" />
                                                                    </a>
                                                                    <span class="sale-box">
                                                                        <span class="sale">Sale</span>
                                                                    </span>
                                                                    <span class="new-box">
                                                                        <span class="new">New</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-content">
                                                                    <div class="product-title">
                                                                        <h5>
                                                                            <a href="#">Fermentum dictum</a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                    </div>
                                                                    <div class="price-box">
                                                                        <span class="price">£50.00</span>
                                                                        <span class="old-price">£70.00</span>
                                                                    </div>
                                                                    <p class="product-desc">Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!
                                                                    </p>
                                                                    <div class="product-action">
                                                                        <button class="button btn btn-default add-cart" title="add to cart">Add to cart</button>
                                                                        <a class="add-wishlist" href="#" title="add to wishlist">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <a class="quick-view" href="#" title="quick view"  data-toggle="modal" data-target="#myModal">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="availability">
                                                                        <span>In stock</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 top-mar">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-img">
                                                                    <a href="#">
                                                                        <img src="/home/bs/img/singlepro/1.jpg" alt="" />
                                                                    </a>
                                                                    <span class="sale-box">
                                                                        <span class="sale">Sale</span>
                                                                    </span>
                                                                    <span class="new-box">
                                                                        <span class="new">New</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-content">
                                                                    <div class="product-title">
                                                                        <h5>
                                                                            <a href="#">Fermentum dictum</a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                    </div>
                                                                    <div class="price-box">
                                                                        <span class="price">£50.00</span>
                                                                        <span class="old-price">£70.00</span>
                                                                    </div>
                                                                    <p class="product-desc">Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!
                                                                    </p>
                                                                    <div class="product-action">
                                                                        <button class="button btn btn-default add-cart" title="add to cart">Add to cart</button>
                                                                        <a class="add-wishlist" href="#" title="add to wishlist">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <a class="quick-view" href="#" title="quick view"  data-toggle="modal" data-target="#myModal">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="availability">
                                                                        <span>In stock</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 top-mar">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-img">
                                                                    <a href="#">
                                                                        <img src="/home/bs/img/singlepro/10.jpg" alt="" />
                                                                    </a>
                                                                    <span class="sale-box">
                                                                        <span class="sale">Sale</span>
                                                                    </span>
                                                                    <span class="new-box">
                                                                        <span class="new">New</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-content">
                                                                    <div class="product-title">
                                                                        <h5>
                                                                            <a href="#">Fermentum dictum</a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                    </div>
                                                                    <div class="price-box">
                                                                        <span class="price">£50.00</span>
                                                                        <span class="old-price">£70.00</span>
                                                                    </div>
                                                                    <p class="product-desc">Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!
                                                                    </p>
                                                                    <div class="product-action">
                                                                        <button class="button btn btn-default add-cart" title="add to cart">Add to cart</button>
                                                                        <a class="add-wishlist" href="#" title="add to wishlist">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <a class="quick-view" href="#" title="quick view"  data-toggle="modal" data-target="#myModal">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="availability">
                                                                        <span>In stock</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 top-mar">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-img">
                                                                    <a href="#">
                                                                        <img src="/home/bs/img/singlepro/5.jpg" alt="" />
                                                                    </a>
                                                                    <span class="sale-box">
                                                                        <span class="sale">Sale</span>
                                                                    </span>
                                                                    <span class="new-box">
                                                                        <span class="new">New</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-content">
                                                                    <div class="product-title">
                                                                        <h5>
                                                                            <a href="#">Fermentum dictum</a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                    </div>
                                                                    <div class="price-box">
                                                                        <span class="price">£50.00</span>
                                                                        <span class="old-price">£70.00</span>
                                                                    </div>
                                                                    <p class="product-desc">Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!
                                                                    </p>
                                                                    <div class="product-action">
                                                                        <button class="button btn btn-default add-cart" title="add to cart">Add to cart</button>
                                                                        <a class="add-wishlist" href="#" title="add to wishlist">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <a class="quick-view" href="#" title="quick view"  data-toggle="modal" data-target="#myModal">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="availability">
                                                                        <span>In stock</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 top-mar">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-img">
                                                                    <a href="#">
                                                                        <img src="/home/bs/img/singlepro/11.jpg" alt="" />
                                                                    </a>
                                                                    <span class="sale-box">
                                                                        <span class="sale">Sale</span>
                                                                    </span>
                                                                    <span class="new-box">
                                                                        <span class="new">New</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-content">
                                                                    <div class="product-title">
                                                                        <h5>
                                                                            <a href="#">Fermentum dictum</a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                    </div>
                                                                    <div class="price-box">
                                                                        <span class="price">£50.00</span>
                                                                        <span class="old-price">£70.00</span>
                                                                    </div>
                                                                    <p class="product-desc">Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!
                                                                    </p>
                                                                    <div class="product-action">
                                                                        <button class="button btn btn-default add-cart" title="add to cart">Add to cart</button>
                                                                        <a class="add-wishlist" href="#" title="add to wishlist">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <a class="quick-view" href="#" title="quick view"  data-toggle="modal" data-target="#myModal">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="availability">
                                                                        <span>In stock</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 top-mar">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-img">
                                                                    <a href="#">
                                                                        <img src="/home/bs/img/singlepro/6.jpg" alt="" />
                                                                    </a>
                                                                    <span class="sale-box">
                                                                        <span class="sale">Sale</span>
                                                                    </span>
                                                                    <span class="new-box">
                                                                        <span class="new">New</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-content">
                                                                    <div class="product-title">
                                                                        <h5>
                                                                            <a href="#">Fermentum dictum</a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                    </div>
                                                                    <div class="price-box">
                                                                        <span class="price">£50.00</span>
                                                                        <span class="old-price">£70.00</span>
                                                                    </div>
                                                                    <p class="product-desc">Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!
                                                                    </p>
                                                                    <div class="product-action">
                                                                        <button class="button btn btn-default add-cart" title="add to cart">Add to cart</button>
                                                                        <a class="add-wishlist" href="#" title="add to wishlist">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <a class="quick-view" href="#" title="quick view"  data-toggle="modal" data-target="#myModal">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="availability">
                                                                        <span>In stock</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 top-mar">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-img">
                                                                    <a href="#">
                                                                        <img src="/home/bs/img/singlepro/12.jpg" alt="" />
                                                                    </a>
                                                                    <span class="sale-box">
                                                                        <span class="sale">Sale</span>
                                                                    </span>
                                                                    <span class="new-box">
                                                                        <span class="new">New</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-content">
                                                                    <div class="product-title">
                                                                        <h5>
                                                                            <a href="#">Fermentum dictum</a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                    </div>
                                                                    <div class="price-box">
                                                                        <span class="price">£50.00</span>
                                                                        <span class="old-price">£70.00</span>
                                                                    </div>
                                                                    <p class="product-desc">Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!
                                                                    </p>
                                                                    <div class="product-action">
                                                                        <button class="button btn btn-default add-cart" title="add to cart">Add to cart</button>
                                                                        <a class="add-wishlist" href="#" title="add to wishlist">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <a class="quick-view" href="#" title="quick view"  data-toggle="modal" data-target="#myModal">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="availability">
                                                                        <span>In stock</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
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
    </div>
</div>
<!-- shop-area-end -->

@endsection