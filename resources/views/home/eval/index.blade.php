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
                    	@if(count($data) != '0')
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
													     	<img src="{{$ve->eval_pic}}" alt="..." data-toggle="modal" data-target="#myModal{{$ve->did}}">
													    </a>
													</div>
												@endforeach
			                                </div>
                                            <hr>
			                            </div>
                                    </div>
		                            <div class="col-md-4 col-sm-4 col-xs-4">
                                        <div class="col-md-12"><span  class="label label-primary">商品名称</span>&nbsp;:&nbsp;<a href="/goodsdetail/{{$v->order->goods_id}}">{{$v->order->goods_name}}</a></div>
                                        <div style="height:25px;"></div>
                                        <div class="col-md-12"><span  class="label label-danger">商品价格</span>&nbsp;:&nbsp;￥{{$v->order->goods_price}}</div><div style="height:25px;"></div>
                                        <div class="col-md-12"><span  class="label label-info">商品颜色</span>&nbsp;:&nbsp;{{$v->order->goods_color}}</div>
                                        <div style="height:25px;"></div>
                                        <div class="col-md-12"><span  class="label label-warning">商品尺寸</span>&nbsp;:&nbsp;{{$v->order->goods_size}}</div>
                                        <div style="height:25px;"></div>
                                        <div class="col-md-12"><span class="label label-default">添加时间</span>&nbsp;:&nbsp;{{$v->created_at}}</div>
                                        <hr>
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
@foreach($data as $dv)
@foreach($dv->evalua as $vp)
﻿<div class="modal fade" id="myModal{{$vp->did}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:500px;height: auto;">
    <div class="modal-content">
	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	        <img src="{{$vp->eval_pic}}" alt="" style="width:100%;height: auto;">
	    </div>
    </div>
  </div>
</div>
@endforeach
@endforeach
@endsection