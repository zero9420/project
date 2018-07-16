@extends('layout.homes')

@section('title',$title)
<link rel="stylesheet" type="text/css" href="/homes/css/member.css">
<link rel="stylesheet" type="text/css" href="/homes/css/user.css">
<link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.ico">
<link rel="stylesheet" type="text/css" href="/homes/css/base.css">
<link rel="stylesheet" type="text/css" href="/homes/css/home.css">
<script type="text/javascript" src="/homes/js/jquery.js"></script>
<script type="text/javascript" src="/homes/js/index.js"></script>
<script type="text/javascript" src="/homes/js/modernizr-custom-v2.7.1.min.js"></script>
<script type="text/javascript" src="/homes/js/jquery.SuperSlide.js"></script>
@section('content')
<div class="containers center"><div class="pc-nav-item"><a href="/home/userinfo">首页</a> &gt; <a href="javascript:void(0)">{{$title}}</a></div></div>
<div class="container">
	<div class="row">
		<div class="col-md-3 col-sm-3 col-xs-12">
			<section id="member">
				<div class="member-center clearfix">
					<div class="member-left fl">
						<div class="member-apart ">
							<div class="fl tu"><a href="/home/userinfo">
								<img src="{{$user->info_image}}"></a>
							</div>
							<div class="fffl" >
								<p><span class="label label-info">昵称</span>&nbsp;:&nbsp;{{$user->info_nickname}}</p>
							</div>

						</div>
						<div class="member-lists">
							<dl>
								<dt>我的商城</dt>
								<dd><a href="/home/order">我的订单</a></dd>
								<dd><a href="/home/collection">我的收藏</a></dd>
								<dd><a href="/home/userinfo">个人中心</a></dd>
							</dl>
							<dl>
								<dt>评论管理</dt>
								<dd><a href="/home/myeval">我的评价</a></dd>
							</dl>
							<dl>
								<dt>客户服务</dt>
								<dd><a href="/home/apply">退货申请</a></dd>
								<dd><a href="#">退货/退款记录</a></dd>
							</dl>
							<dl>
								<dt>我的消息</dt>
								<dd class="cur"><a href="/home/express">商城快讯</a></dd>
								<dd><a href="#">帮助中心</a></dd>
							</dl>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
            <div role="tabpanel" class="tab-pane active fade in" id="list_view">
                <div class="list-view">
                    <div class="row">
                        @if(session('success'))
                            <div id="form-error" class="alert alert-danger" role="alert">
                                {{session('success')}}
                            </div>
                        @endif
                        @if(session('error'))
                            <div id="form-error" class="alert alert-danger" role="alert">
                                {{session('error')}}
                            </div>
                        @endif
                    	@if(!empty($data))
	                    	@foreach($data as $v)
		                        <div class="col-md-12 col-sm-12 col-xs-12">
		                            <!-- shop-eval-start -->
		                            <div class="col-md-8 col-sm-8 col-xs-8">
		                            	<div class="col-md-12">{{$v->comments}}</div>
			                            <div class="col-md-12">
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
													     	<img src="{{$ve->eval_pic}}" alt="...">
													    </a>
													</div>
												@endforeach
			                                </div>
			                            </div>
		                            </div>
		                            <div class="col-md-4 col-sm-4 col-xs-4">
                                        <div class="col-md-12"><a class="quick-view" href="#" title="快速浏览商品"  data-toggle="modal" data-target="#myModal{{$v->order->goods_id}}">
                                        <span class="label label-success">快速浏览商品详情</span>
                                        </a></div>
                                        <div style="margin-bottom: 30px;"></div>
                                        <div class="col-md-12"><span class="label label-default">添加时间</span>&nbsp;:&nbsp;{{$v->created_at}}</div>
		                            </div>
		                            <!-- shop-eval-end -->
		                        </div>
	                        @endforeach
                        @else
                        <div class="col-md-12 col-sm-12 col-xs-12">
							<div class="slider">
							    <!-- Slider Image -->
							    <div id="mainslider" class="nivoSlider slider-image">
							       <img src="/home/bs/pingjia/img/wish.jpg" alt="main slider" title="#htmlcaption1" />
							    </div>
							        <!-- Slider Caption 1 -->
							    <div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
						            <div class="slider-progress"></div>
						            <div class="slide1-text slide-1 hidden-xs">
						                <div class="middle-text">
						                	<div class="cap-dec wow bounceInLeft" data-wow-duration="0.9s" data-wow-delay="0s">
						                        <h2>评论列表空空如也,快去购买你心仪的商品吧.....</h2>
						                    </div>
						                    <div class="cap-readmore wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
						                        <a href="/">去购物....</a>
						                    </div>
						                </div>
						            </div>
						        </div>
							</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>


@foreach($goods as $vg)
<div id="myModal{{$vg->goods_id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="product-details">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-xs-12 col-sm-5">
                                <div class="picture-tab">
                                    <ul class="pic-tabs">
                                        @foreach($vg->spec as $vv)
                                        <li class=" "><a data-toggle="tab" href="#pic{{$vv->goods_spec_id}}" aria-expanded="true"><img src="{{$vv->goods_pic}}" alt=""></a></li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">
                                    <div id="pic{{$vg->spec[0]->goods_spec_id}}" class="tab-pane fade in active">
                                        <!-- single-product-start -->
                                        <div class="single-product">
                                            <div class="single-product-img">
                                                <a href="/goodsdetail/{{$vg->goods_id}}">
                                                    <img src="{{$vg->spec[0]->goods_pic}}" alt="">
                                                </a>
                                                <span class="sale-box">
                                                    <span class="sale">热销</span>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- single-product-end -->
                                    </div>
                                    @foreach($vg->spec as $vvv)
                                        <div id="pic{{$vvv->goods_spec_id}}" class="tab-pane fade">
                                            <!-- single-product-start -->
                                            <div class="single-product">
                                                <div class="single-product-img">
                                                    <a href="/goodsdetail/{{$v->goods_id}}">
                                                        <img src="{{$vvv->goods_pic}}" alt="">
                                                    </a>
                                                    <span class="sale-box">
                                                        <span class="sale">热销</span>
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
                                    <form action="/home/cart/{{$v->goods_id}}" method='POST'>
                                        {{ csrf_field() }}
                                        <h5 class="product-title">{{$vg->goods_name}}</h5>
                                        <div class="price-box">
                                            @if($vg->goods_preferential != $v->goods_price)
                                                <span class="price">
                                                    ￥{{$vg->goods_preferential}}
                                                    <input type="hidden" name="new_price" value="{{$vg->goods_preferential}}">
                                                </span>
                                                <span class="old-price">
                                                    ￥{{$vg->goods_price}}
                                                    <input type="hidden" name="old_price" value="{{$vg->goods_price}}">
                                                </span>
                                            @else
                                                <span class="price">
                                                    ￥{{$vg->goods_price}}
                                                    <input type="hidden" name="old_price" value="{{$vg->goods_price}}">
                                                    <input type="hidden" name="new_price" value="{{$v->goods_price}}">
                                                </span>
                                            @endif
                                        </div>
                                        <div class="rating">
                                            <a class="add-wishlist" href="/goodsdetail/{{$vg->goods_id}}" title="加入我的收藏">
                                                <i class="fa fa-heart"></i>
                                                <span>收藏宝贝</span>
                                            </a>
                                        </div>
                                        <div class="short-description">
                                            <p>{{$vg->goods_info}}
                                            </p>
                                        </div>
                                        <div class="add-cart">
                                            <span>销量:</span>
                                            <a href="javascript:void(0)">
                                                <span>{{$vg->goods_sales}}</span>
                                            </a>
                                        </div>
                                        @php
                                            $size = array_filter(explode('|',$vg->goods_size));
                                            $color = array_filter(explode('|',$vg->goods_color));
                                        @endphp
                                        <div class="add-cart">
                                            <span>尺码:</span>
                                            @foreach($size as $vs)
                                            <a href="javascript:void(0)">
                                                <input type="radio" name="goods_size" value="{{$vs}}">
                                                <span>{{strtoupper($vs)}}</span>
                                            </a>
                                            @endforeach
                                        </div>
                                        <div class="add-cart">
                                            <span>颜色:</span>
                                            @foreach($color as $vc)
                                            <a href="javascript:void(0)">
                                                <input type="radio" name="goods_color" value="{{$vc}}">
                                                <span>{{$vc}}</span>
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
</div>
@endforeach
@endsection