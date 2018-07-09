@extends('layout.homes')

@section('content')
<link rel="stylesheet" type="text/css" href="/homes/css/member.css">
<link rel="stylesheet" type="text/css" href="/homes/css/user.css">
<script src="/js/jquery-3.2.1.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="containers center"><div class="pc-nav-item"><a href="#">首页</a> &gt; <a href="#">会员中心 </a> &gt; <a href="#">商城快讯</a></div></div>
<section id="member">
	
	<div class="member-center clearfix">
		<div class="member-left fl">
			<div class="member-apart clearfix">
				<div class="fl"><a href="#">
					<img src="{{$res->info_image}}"></a>
				</div>
				<div class="f1">

				<p>用户名：<div></div>{{$res->info_nickname}}</p>
					
				</div>
			</div>
			<div class="member-lists">
				<dl>
					<dt>我的商城</dt>
					<dd><a href="#">我的订单</a></dd>
					<dd><a href="#">我的收藏</a></dd>
					<dd><a href="#">账户安全</a></dd>
					<dd><a href="#">我的评价</a></dd>
					<dd><a href="#">地址管理</a></dd>
				</dl>
				<dl>
					<dt>客户服务</dt>
					<dd class="cur"><a href="#">退货申请</a></dd>
					<dd><a href="#">退货/退款记录</a></dd>
				</dl>
				<dl>
					<dt>我的消息</dt>
					<dd><a href="#">商城快讯</a></dd>
					<dd><a href="#">帮助中心</a></dd>
				</dl>
			</div>
		</div>
		<div class="member-right fr">
			<div class="member-head">
				<div class="member-heels fl"><h2>退货申请</h2></div>
				
			</div>
			<div class="member-border">
				<div class="member-newly"><span><b>订单号：</b>{{$data->order_id}}</span> <span><b>订单状态：</b><i class="reds">@if($data->order_return_goods == 1)退款中 @elseif($data->order_return_goods == 2) 退款成功   @else申请退款   @endif</i></span></div>
				<div class="member-cargo">
					<h3>收货人信息：</h3>
					<p>{{$data->order_name}}</p>
					<p>{{$data->order_phone}}</p>
					<p>{{$data->order_addr}}</p>
				</div>
				<div class="member-cargo">
					<h3>商品信息：</h3>
					<p>悦商城自营店</p>
				</div>
				<div class="member-sheet clearfix">
					<ul>
						<li>
							<div class="member-circle clearfix">
								<div class="member-apply clearfix">
									<div class="ap1 fl">
										<span class="gr1"><a href="#"><img about="" title="" src="images/shangpinxiangqing/X-1.png" width="60" height="60"></a></span>
										<span class="gr2"><a href="#">红米Note2 标准版 白色 移动4G手机 双卡双待</a></span>
										<span class="gr3">X1</span>
									</div>
									
									<div class="ap3 fl ajax tk" id="1"><a href="#">@if($data->order_return_goods == 1)退款中 @elseif($data->order_return_goods == 2) 退款成功   @else申请退款   @endif</a> </div>
								</div>
								<div class="member-apply clearfix">
									<div class="ap1 fl">
										<span class="gr1"><a href="#"><img about="" title="" src="images/shangpinxiangqing/X-1.png" width="60" height="60"></a></span>
										<span class="gr2"><a href="#">红米Note2 标准版 白色 移动4G手机 双卡双待</a></span>
										<span class="gr3">X1</span>
									</div>
									<div class="ap3 fl ajax ck"><a href="#">@if($data->order_return_goods == 1)退款中 @elseif($data->order_return_goods == 2) 退款成功   @else申请退款   @endif</a> </div>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="member-modes clearfix">
					<p class="clearfix"><b>支付方式：</b><em>块钱</em></p>
					<p class="clearfix"><b>发票信息：</b><em>无发票</em></p>
				</div>
				<div class="member-modes clearfix">
					<p class="clearfix"><b>配送方式：</b><em> 顺丰快递</em></p>
				</div>
				<div class="member-modes clearfix">
					<p class="clearfix"><b>商品金额：</b><em>2113</em></p>
					<p class="clearfix"><b>运费：</b><em> ￥20.00</em></p>
				</div>
				<div class="member-modes clearfix">
					<p class="clearfix"><b>订单合计金额：</b><em>{{$data->order_payment}}</em></p>
				</div>
			</div>
		</div>
	</div>
</section>


});
<script>
	
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
	
	$('.ajax').click(function(){

	

		$.post('/home/ajax',{status:1},function(data){

			
			console.log(data);

		})



	})

</script>

@endsection