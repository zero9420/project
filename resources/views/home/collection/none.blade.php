@extends('layout.homes')

@section('content')
<link rel="shortcut icon" type="image/x-icon" href="/homes/img/icon/favicon.ico">
<link rel="stylesheet" type="text/css" href="/homes/css/base.css">
<link rel="stylesheet" type="text/css" href="/homes/css/user.css">
<link rel="stylesheet" type="text/css" href="/homes/css/home.css">
<link rel="stylesheet" type="text/css" href="/homes/css/member.css">
<script type="text/javascript" src="/homes/js/jquery.js"></script>
<script type="text/javascript" src="/homes/js/index.js"></script>
<script type="text/javascript" src="/homes/js/modernizr-custom-v2.7.1.min.js"></script>
<script type="text/javascript" src="/homes/js/jquery.SuperSlide.js"></script>
<div class="containers center"><div class="pc-nav-item"><a href="#">首页</a> &gt; <a href="#">会员中心 </a> &gt; <a href="#">商城快讯</a></div></div>
<section id="member">
	<div class="member-center clearfix">
		<div class="member-left fl">
			<div class="member-apart clearfix">
				<div class="fl tu"><a href="#"><img src="img/mem.png"></a></div>
				<div class="f1">

					<p>用户名：<div></div></p>

				</div>
			</div>
			<div class="member-lists">
				<dl>
					<dt>我的商城</dt>
					<dd><a href="/home/order">我的订单</a></dd>
					<dd><a href="/home/collection">我的收藏</a></dd>
					<dd><a href="/home/userinfo">个人中心</a></dd>
					<dd><a href="#">我的评价</a></dd>
				</dl>
				<dl>
					<dt>客户服务</dt>
					<dd class="cur"><a href="/home/apply">退货申请</a></dd>
					<dd><a href="#">退货/退款记录</a></dd>
				</dl>
				<dl>
					<dt>我的消息</dt>
					<dd><a href="/home/express">商城快讯</a></dd>
					<dd><a href="#">帮助中心</a></dd>
				</dl>
			</div>
		</div>
		<div class="member-right fr">
			<div class="member-head">
				<div class="member-heels fl"><h2>我的收藏</h2></div>
				<div class="member-backs member-icons fr"><a href="#">搜索</a></div>
				<div class="member-about fr"><input placeholder="商品名称/商品编号/订单编号" type="text"></div>
			</div>
			<div class="member-switch clearfix">
				<ul id="H-table" class="H-table">
					<li><a href="#">我的收藏的商品</a></li>
				</ul>
			</div>
			<div class="member-border">

				<div class="member-return H-over">
					<div class="member-troll clearfix">
						<div class="member-all fl"><b class="on"></b>全选</div>
						<div class="member-check clearfix fl"> <a href="#" class="member-delete">删除商品</a> </div>
					</div>
					<div class="member-vessel">
						<ul>
							<li class="clearfix">
								

								<div class="member-volume fl">
									<a href="#" class="fl member-btn-fl"></a>
									<div class="member-cakes fl">
										<ul>
											<li>
												<a href="#"><img src="/homes/images/shangpinxiangqing/X-1.png" title="" width="125" height="125"></a>
												<p>￥78.00</p>
											</li>
											
										</ul>
									</div>
									<a href="#" class="fr member-btn-fr"></a>
								</div>
							</li>
							<li class="clearfix">
								<div class="member-volume fl">
									<a href="#" class="fl member-btn-fl"></a>
									<div class="member-cakes fl">
										<ul>
											<li>
												<a href="#"><img src="/homes/images/shangpinxiangqing/X-1.png" title="" width="125" height="125"></a>
												<p>￥78.00</p>
											</li>
											<li>
												<a href="#"><img src="/homes/images/shangpinxiangqing/X-1.png" title="" width="125" height="125"></a>
												<p>￥78.00</p>
											</li>
											<li>
												<a href="#"><img src="/homes/images/shangpinxiangqing/X-1.png" title="" width="125" height="125"></a>
												<p>￥78.00</p>
											</li>
											<li>
												<a href="#"><img src="/homes/images/shangpinxiangqing/X-1.png" title="" width="125" height="125"></a>
												<p>￥78.00</p>
											</li>
										</ul>
									</div>
									<a href="#" class="fr member-btn-fr"></a>
								</div>
							</li>
						</ul>
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