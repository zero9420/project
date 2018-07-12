@extends('layout.homes')

@section('title',$title)

@section('content')
<link rel="shortcut icon" type="image/x-icon" href="/homes/img/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/homes/css/base.css">
	<link rel="stylesheet" type="text/css" href="/homes/css/home.css">
	<link rel="stylesheet" type="text/css" href="/homes/css/member.css">
	<script type="text/javascript" src="/homes/js/jquery.js"></script>
	<script type="text/javascript" src="/homes/js/index.js"></script>
	<script type="text/javascript" src="/homes/js/modernizr-custom-v2.7.1.min.js"></script>
	<script type="text/javascript" src="/homes/js/jquery.SuperSlide.js"></script>
	
	
	<style>
		.ff2 {
			position:absolute;
			top: 350px;
			
			margin-right: 15px;
		}
		.ff3{
			position: absolute;
			top: -100px;
			margin-right: 15px;

		}
		.ff4{
			position:absolute;
			top:200px;
			left: 150px;
		}
	
		.member-circle .ci7{

			height: 150px;
			
		}
		.member-circle .ci7 .gr2 {
			
   			 display: block;
    		float: left;
    		padding-right: 50px;
   			 padding-top: 10px;
			white-space:normal; width:240px;
			position: relative;
  			left: 30px;
  			top: 20px;
		}

		img {
   			 max-width: 100px;
    			height: auto;
		}


	
	</style>

<div class="containers center ff4"><div class="pc-nav-item"><a href="#">首页</a> &gt; <a href="#">会员中心 </a> &gt; <a href="/home/order">我的订单</a></div></div>	
<section id="member">
	<div class="member-center clearfix">
			<div class="member-left fl ff2"  >
			<div class="member-apart clearfix ff3">

				<div class="fl  "><a href="#"><img src=" {{$res->info_image}} " ></a></div>
				<div class="fl ">
					<p>用户昵称：</p>
					<p><a href="/home/userinfo"></a> {{$res->info_name}} </p>
					
				</div>
			</div>
			<div class="member-lists">
				<dl>
					<dt>我的商城</dt>
					<dd><a href="#">我的订单</a></dd>
					<dd><a href="#">我的收藏</a></dd>
					<dd><a href="/home/userinfo">个人中心</a></dd>
					<dd><a href="#">我的评价</a></dd>
					
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
		<div class="member-right fr">
			<div class="member-head">
				<div class="member-heels fl"><h2>我的订单</h2></div>
				<div class="member-backs member-icons fr"><a href="#">搜索</a></div>
				<div class="member-about fr"><input placeholder="商品名称/商品编号/订单编号" type="text"></div>
			</div>
			<div class="member-whole clearfix">
				<ul id="H-table" class="H-table">
					<li class="cur"><a href="#">我的订单</a></li>
					
				</ul>
			</div>
			<div class="member-border">
				<div class="member-return H-over">
					<div class="member-cancel clearfix">
						<span class="be1">订单信息</span>
						<span class="be2">收货人</span>
						<span class="be2">订单金额</span>
						<span class="be2">发货时间</span>
						<span class="be2">订单状态</span>
						<span class="be2">订单操作</span>
					</div>
				

					<div class="member-sheet clearfix">
							@foreach($order as $k => $v)
						<ul>
							<li>
								<div class="member-minute clearfix">
									<span>{{$v->order_create_time}}</span>
									<span>订单号：<em>{{$v->order_id}}</em></span>
									<span><a href="#">云购物旗舰店</a></span>
									<span class="member-custom">客服电话：<em>010-6544-0986</em></span>
								</div>
								<div class="member-circle clearfix">
									<div class="ci1">
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="{{$v->order_shop_img}}"></a></span>
											<span class="gr2"><a href="#">{{$v->order_shop_title}}</a></span>
											<span class="gr3">X{{$v->order_cat}}</span>
										</div>
										
									</div>
									<div class="ci2">{{$v->order_name}}</div>
									<div class="ci3"><b>￥{{$v->order_payment}}</b><p>在线支付</p><p class="iphone">手机订单</p></div>
									<div class="ci4"><p>{{$v->order_consign_time}}</p></div>
									<div class="ci5"><p></p><p>
										<a href="#">
											@if($v->order_status == 0)
											未发货
											@elseif($v->order_status == 1)
											已发货
											@else
											交易完成
											@endif
										</a></p> <p><a href="/home/order/{{$v->id}}">订单详情</a></p></div>
									<div class="ci5 ci8"><p></p><a href="#">申请退款</a<p> </p> <p><a href="#">投诉建议</a> </p></div>
								</div>
							</li>
						
						</ul>
						@endforeach
					</div>
					
				</div>
				

				<div class="clearfix" style="padding:30px 20px;">
					<div class="fr pc-search-g pc-search-gs">
						<a style="display:none" class="fl " href="#">上一页</a>
						<a href="#" class="current">1</a>
						<a href="javascript:;">2</a>
						<a href="javascript:;">3</a>
						<a href="javascript:;">4</a>
						<a href="javascript:;">5</a>
						<a href="javascript:;">6</a>
						<a href="javascript:;">7</a>
						<span class="pc-search-di">…</span>
						<a href="javascript:;">1088</a>
						<a title="使用方向键右键也可翻到下一页哦！" class="" href="javascript:;">下一页</a>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>


@endsection