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

					<p><span class="label label-info">昵称</span>&nbsp;&nbsp;</p>

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
					<dd><a href="/home/eval">我的评价</a></dd>
				</dl>
				<dl>
					<dt>客户服务</dt>
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
				<div class="member-heels fl"><h2>我的收藏</h2></div>
				<form action="/home/collection" method='get'>
			 <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label  class="DataTables1">
                        最小价格:
                        <input type="number" name='min_price' value="{{$request->min_price}}">
                    </label>
                    <label class="DataTables2">
	                    最大价格:
	                    <input type="number" name='max_price' value="{{$request->max_price}}">
	                </label>

	                <button class='btn btn-info'>搜索</button>
	        </div>	
	    </form>
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
					
</section>



@endsection