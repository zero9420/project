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
		.pagination>li>a, .pagination>li>span {
   
    		 padding: 0px 12px; 

		}

		.member-pages {
   			 padding: 0px;
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
					<li><a href="#">待付款<em>(44)</em></a></li>
					<li><a href="#">待发货</a></li>
					<li><a href="#">待收货</a></li>
					<li><a href="#">交易完成</a></li>
					<li><a href="#">订单信息</a></li>
				</ul>
			</div>
			<div class="member-border">
				<div class="member-return H-over">
					<div class="member-cancel clearfix">
						<span class="be1">订单信息</span>
						<span class="be2">收货人</span>
						<span class="be2">订单金额</span>
						<span class="be2">订单时间</span>
						<span class="be2">订单状态</span>
						<span class="be2">订单操作</span>
					</div>
					<div class="member-sheet clearfix">
						<ul>
							<li>
								<div class="member-minute clearfix">
									<span>2015-09-22 18:22:33</span>
									<span>订单号：<em>98653056821</em></span>
									<span><a href="#">以纯甲醇旗舰店</a></span>
									<span class="member-custom">客服电话：<em>010-6544-0986</em></span>
								</div>
								<div class="member-circle clearfix">
									<div class="ci1">
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="images/shangpinxiangqing/X-1.png" title="" about="" width="60" height="60"></a></span>
											<span class="gr2"><a href="#">红米Note2 标准版 白色 移动4G手机 双卡双待</a></span>
											<span class="gr3">X1</span>
										</div>
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="images/shangpinxiangqing/X-1.png" title="" about="" width="60" height="60"></a></span>
											<span class="gr2"><a href="#">AXON天机mini NBA限量版</a></span>
											<span class="gr3">X9</span>
										</div>
									</div>
									<div class="ci2">张子琪</div>
									<div class="ci3"><b>￥120.00</b><p>货到付款</p><p class="iphone">手机订单</p></div>
									<div class="ci4"><p>2015-09-22</p></div>
									<div class="ci5"><p>等待付款</p> <p><a href="#">物流跟踪</a></p> <p><a href="#">订单详情</a></p></div>
									<div class="ci5 ci8"><p>剩余15时20分</p> <p><a href="#" class="member-touch">立即支付</a> </p> <p><a href="#">取消订单</a> </p></div>
								</div>
							</li>
							<li>
								<div class="member-minute clearfix">
									<span>2015-09-22 18:22:33</span>
									<span>订单号：<em>98653056821</em></span>
									<span><a href="#">以纯甲醇旗舰店</a></span>
									<span class="member-custom">客服电话：<em>010-6544-0986</em></span>
								</div>
								<div class="member-circle clearfix">
									<div class="ci1">
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="images/shangpinxiangqing/X-1.png" title="" about="" width="60" height="60"></a></span>
											<span class="gr2"><a href="#">红米Note2 标准版 白色 移动4G手机 双卡双待</a></span>
											<span class="gr3">X1</span>
										</div>
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="images/shangpinxiangqing/X-1.png" title="" about="" width="60" height="60"></a></span>
											<span class="gr2"><a href="#">AXON天机mini NBA限量版</a></span>
											<span class="gr3">X9</span>
										</div>
									</div>
									<div class="ci2">张子琪</div>
									<div class="ci3"><b>￥120.00</b><p>货到付款</p><p class="iphone">手机订单</p></div>
									<div class="ci4"><p>2015-09-22</p></div>
									<div class="ci5"><p>等待卖家发货 </p> <p><a href="#">订单详情</a></p></div>
									<div class="ci5 ci8"><p><a href="#" class="member-touch">提醒发货</a> </p> <p><a href="#">取消订单</a> </p></div>
								</div>
							</li>
							<li>
								<div class="member-minute clearfix">
									<span>2015-09-22 18:22:33</span>
									<span>订单号：<em>98653056821</em></span>
									<span><a href="#">以纯甲醇旗舰店</a></span>
									<span class="member-custom">客服电话：<em>010-6544-0986</em></span>
								</div>
								<div class="member-circle clearfix">
									<div class="ci1">
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="images/shangpinxiangqing/X-1.png" title="" about="" width="60" height="60"></a></span>
											<span class="gr2"><a href="#">红米Note2 标准版 白色 移动4G手机 双卡双待</a></span>
											<span class="gr3">X1</span>
										</div>
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="images/shangpinxiangqing/X-1.png" title="" about="" width="60" height="60"></a></span>
											<span class="gr2"><a href="#">AXON天机mini NBA限量版</a></span>
											<span class="gr3">X9</span>
										</div>
									</div>
									<div class="ci2">张子琪</div>
									<div class="ci3"><b>￥120.00</b><p>货到付款</p><p class="iphone">手机订单</p></div>
									<div class="ci4"><p>2015-09-22</p></div>
									<div class="ci5"><p>已完成</p> <p><a href="#">订单详情</a></p></div>
									<div class="ci5 ci8"><p><a href="#">查看</a></p> <p></p><p><a href="#" class="member-touch">确认收货</a></p></div>
								</div>
							</li>
							<li>
								<div class="member-minute clearfix">
									<span>2015-09-22 18:22:33</span>
									<span>订单号：<em>98653056821</em></span>
									<span><a href="#">以纯甲醇旗舰店</a></span>
									<span class="member-custom">客服电话：<em>010-6544-0986</em></span>
								</div>
								<div class="member-circle clearfix">
									<div class="ci1">
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="images/shangpinxiangqing/X-1.png" title="" about="" width="60" height="60"></a></span>
											<span class="gr2"><a href="#">红米Note2 标准版 白色 移动4G手机 双卡双待</a></span>
											<span class="gr3">X1</span>
										</div>
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="images/shangpinxiangqing/X-1.png" title="" about="" width="60" height="60"></a></span>
											<span class="gr2"><a href="#">AXON天机mini NBA限量版</a></span>
											<span class="gr3">X9</span>
										</div>
									</div>
									<div class="ci2">张子琪</div>
									<div class="ci3"><b>￥120.00</b><p>货到付款</p><p class="iphone">手机订单</p></div>
									<div class="ci4"><p>2015-09-22</p></div>
									<div class="ci5"><p>已完成</p> <p><a href="#">订单详情</a></p></div>
									<div class="ci5 ci8"><p><a href="#">查看</a> | <a href="#">删除</a></p> <p></p><p><a href="#" class="member-touch">确认收货</a></p></div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="member-return H-over" style="display:none;">
					<div class="member-cancel clearfix">
						<span class="be1">订单信息</span>
						<span class="be2">收货人</span>
						<span class="be2">订单金额</span>
						<span class="be2">订单时间</span>
						<span class="be2">订单状态</span>
						<span class="be2">订单操作</span>
					</div>
					<div class="member-sheet clearfix">
						<ul>
							<li>
								<div class="member-minute clearfix">
									<span>2015-09-22 18:22:33</span>
									<span>订单号：<em>98653056821</em></span>
									<span><a href="#">以纯甲醇旗舰店</a></span>
									<span class="member-custom">客服电话：<em>010-6544-0986</em></span>
								</div>
								<div class="member-circle clearfix">
									<div class="ci1">
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="../theme/img/pd/m1.png" title="" about="" width="60" height="60"></a></span>
											<span class="gr2"><a href="#">红米Note2 标准版 白色 移动4G手机 双卡双待</a></span>
											<span class="gr3">X1</span>
										</div>
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="../theme/img/pd/m2.png" title="" about="" width="60" height="60"></a></span>
											<span class="gr2"><a href="#">AXON天机mini NBA限量版</a></span>
											<span class="gr3">X9</span>
										</div>
									</div>
									<div class="ci2">张子琪</div>
									<div class="ci3"><b>￥120.00</b><p>货到付款</p><p class="iphone">手机订单</p></div>
									<div class="ci4"><p>2015-09-22</p></div>
									<div class="ci5"><p>已申请退货</p> <p><a href="#">退货日志</a></p></div>
									<div class="ci6"><p><a href="#">取消退货</a> </p></div>
								</div>
							</li>
							<li>
								<div class="member-minute clearfix">
									<span>2015-09-22 18:22:33</span>
									<span>订单号：<em>98653056821</em></span>
									<span><a href="#">以纯甲醇旗舰店</a></span>
									<span class="member-custom">客服电话：<em>010-6544-0986</em></span>
								</div>
								<div class="member-circle clearfix">
									<div class="ci1">
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="../theme/img/pd/m1.png" title="" about="" width="60" height="60"></a></span>
											<span class="gr2"><a href="#">红米Note2 标准版 白色 移动4G手机 双卡双待</a></span>
											<span class="gr3">X1</span>
										</div>
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="../theme/img/pd/m2.png" title="" about="" width="60" height="60"></a></span>
											<span class="gr2"><a href="#">AXON天机mini NBA限量版</a></span>
											<span class="gr3">X9</span>
										</div>
									</div>
									<div class="ci2">张子琪</div>
									<div class="ci3"><b>￥120.00</b><p>货到付款</p><p class="iphone">手机订单</p></div>
									<div class="ci4"><p>2015-09-22</p></div>
									<div class="ci5"><p>已完成</p> <p><a href="#">订单详情</a></p></div>
									<div class="ci6"><p><a href="#">取消退货</a> </p></div>
								</div>
							</li>
							<li>
								<div class="member-minute clearfix">
									<span>2015-09-22 18:22:33</span>
									<span>订单号：<em>98653056821</em></span>
									<span><a href="#">以纯甲醇旗舰店</a></span>
									<span class="member-custom">客服电话：<em>010-6544-0986</em></span>
								</div>
								<div class="member-circle clearfix">
									<div class="ci1">
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="../theme/img/pd/m1.png" title="" about="" width="60" height="60"></a></span>
											<span class="gr2"><a href="#">红米Note2 标准版 白色 移动4G手机 双卡双待</a></span>
											<span class="gr3">X1</span>
										</div>
										<div class="ci7 clearfix">
											<span class="gr1"><a href="#"><img src="../theme/img/pd/m2.png" title="" about="" width="60" height="60"></a></span>
											<span class="gr2"><a href="#">AXON天机mini NBA限量版</a></span>
											<span class="gr3">X9</span>
										</div>
									</div>
									<div class="ci2">张子琪</div>
									<div class="ci3"><b>￥120.00</b><p>货到付款</p><p class="iphone">手机订单</p></div>
									<div class="ci4"><p>2015-09-22</p></div>
									<div class="ci5"><p>已完成</p> <p><a href="#">订单详情</a></p></div>
									<div class="ci6"><p><a href="#">取消退货</a> </p></div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="H-over member-over" style="display:none;"><h2>待发货</h2></div>
				<div class="H-over member-over" style="display:none;"><h2>待收货</h2></div>
				<div class="H-over member-over" style="display:none;"><h2>交易完成</h2></div>
				<div class="H-over member-over" style="display:none;"><h2>订单信息</h2></div>

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