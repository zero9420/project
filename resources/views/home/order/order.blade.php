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
		
		.tu{
			margin: -10px -10px;
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

				<div class="fl tu "><a href="#"><img src=" {{$res->info_image}} "></a></div>
				<div class="fl ">
					<p>用户昵称：</p>

					<p><a href="/home/userinfo"></a> {{$res->info_nickname}} </p>
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

				<div class="member-about fr">
					<form action="/home/order" method="get">

						<input class="text-news" placeholder="关键字" type="text"  name='goods_name'>

						<button class="btn">搜索</button>
					</form>
				</div>
			</div>
			<div class="member-whole clearfix">
				<ul id="H-table" class="H-table">
					<li class="cur"><a href="#">我的订单</a></li>

				</ul>
			</div>
			<div class="member-border">
				<div class="member-return H-over">

					<div class="member-sheet clearfix">

						<div class="bs-example" data-example-id="hoverable-table">
									    <table class="table table-hover">
									      <thead>
									        <tr>
									          <th>订单号</th>
									          <th>商品图片</th>
									          <th>商品名称</th>
									          <th>商品单价</th>
									          <th>购买数量</th>
									          <th>订单状态</th>
									          <th>操作</th>
									        </tr>
									      </thead>

									      @foreach($order as $k => $v)

									      <tbody>
									      	@foreach($v as $kk => $vv)
									        <tr>
									          <th scope="row">{{$vv->order_id}}</th>
									          <td>
									          	<img src=" {{$vv->goods_pic}} " alt="..." class="img-circle">


									          </td>
									          <td> {{$vv->goods_name}} </td>
									          <td>  {{$vv->goods_price}}  </td>
									          <td>  {{$vv->num}}  </td>

									            <td>
									          	@if($vv->goods_status==0)未发货@elseif($vv->goods_status==1)已发货@else交易完成@endif
									            </td>
									            <td>
										          	<div class="ci5">
										          		<p>
										          			<a href="/home/order/{{$vv->id}}">订单详情</a>
										          		</p>
										          		<p>
										          			<a href="/home/ajax">申请退款</a>
										          		</p>
										          	</div>
										        </td>
									        </tr>
									    </tbody>

									     		@endforeach
											@endforeach
									    </table>
									  </div>

						</div>
					</div>
				<div class="clearfix" style="padding:30px 20px;">
					<div class="fr pc-search-g pc-search-gs">
						{{$ord->links()}}


					</div>
					
				</div>

			</div>
		</div>
	</div>
</section>


@endsection