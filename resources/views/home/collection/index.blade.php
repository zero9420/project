@extends('layout.homes')

@section('content')
<link rel="shortcut icon" type="image/x-icon" href="/homes/img/icon/favicon.ico">
<link rel="stylesheet" type="text/css" href="/homes/css/base.css">
<link rel="stylesheet" type="text/css" href="/homes/css/user.css">
<link rel="stylesheet" type="text/css" href="/homes/css/home.css">
<link rel="stylesheet" type="text/css" href="/homes/css/member.css">
<script src="/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/homes/js/jquery.js"></script>
<script type="text/javascript" src="/homes/js/index.js"></script>
<script type="text/javascript" src="/homes/js/modernizr-custom-v2.7.1.min.js"></script>
<script type="text/javascript" src="/homes/js/jquery.SuperSlide.js"></script>
<div class="containers center"><div class="pc-nav-item"><a href="#">首页</a> &gt; <a href="#">会员中心 </a> &gt; <a href="#">商城快讯</a></div></div>
<section id="member">
	<div class="member-center clearfix">
		<div class="member-left fl">
			<div class="member-apart clearfix">
				<div class="fl tu"><a href="#"><img src="{{$res->info_image}}"></a></div>
				<div class="f1">
					<p>用户名：<div></div>{{$res->info_nickname}}</p>

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
				<div class="member-heels fl"><h2>我的收藏</h2></div>
			</div>
			<div class="member-switch clearfix">
				<ul id="H-table" class="H-table">
					<li><a href="#">我的收藏的商品</a></li>
				</ul>
			</div>
			<div class="member-border">
			  <form action="/home/goods" method="post">
				<div class="member-return H-over">
					<div class="member-troll clearfix">
						
						<div class="member-check clearfix fl"> <button class="del" type="submit" >删除商品</button> </div>
						@if(session('success'))
		                    <div class="mws-form-message info">
		                        <span style="margin-left:50px; color:green;font-size:18px;">{{session('success')}}</span>
		                    </div>
		                @endif

		                @if(session('error'))
		                    <div class="mws-form-message warning">
		                        <span style="margin-left:50px; color:red; font-size:18px;">{{session('error')}}</span>
		                    </div>
		                @endif
					</div>
					<div class="member-vessel">
						<ul>
							<li class="clearfix">
								<div class="member-volume fl">
									<a href="#" class="fl member-btn-fl"></a>
									<div class="member-cakes fl">
										<ul>
											@foreach($data as $k=>$v)
												
											<li class="dpic">
												<a href="/goodsdetail/{{$v->goods_id}}"><img src="{{$v->spec[0]->goods_pic}}" title="" width="125" height="125"></a>
												<p>￥{{$v->goods_price}}</p>
												<input type="checkbox" class="check" name="gid[]" value='{{$v->goods_id}}'>
											</li>
											@endforeach
										</ul>
									</div>
									<a href="#" class="fr member-btn-fr"></a>
								</div>
							</li>
						</ul>
					</div>
				</div>
				{{csrf_field()}}
				<div class='page' style="margin-left:400px" >
					{{ $data->links() }}	
				</div>
			  </form>
				 <button id="member-delall" class="anniu1">全选</button>
			</div>
		</div>
	</div>
</section>
<script>
	
	
	$("#member-delall").click(function(){

   		 $(":checkbox").each(function(){

        	this.checked = !this.checked;
    	});
	});



	
	

</script>


@endsection