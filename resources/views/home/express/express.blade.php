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
			top:220px;
			left: 250px;
		}
		.pagination>li>a, .pagination>li>span {
   
     padding: 0px 12px; 

		}

		.member-pages {
   			 padding: 0px;
	}

	
	</style>


<div class="containers center ff4"><div class="pc-nav-item"><a href="#">首页</a> &gt; <a href="#">会员中心 </a> &gt; <a href="#">商城快讯</a></div></div>
<section id="member">
	<div class="member-center clearfix" >
		<div class="member-left fl ff2"  >
			<div class="member-apart clearfix ff3">
				<div class="fl  "><a href="#"><img src="/homes/img/mem.png" "></a></div>
				<div class="fl ">
					<p>用户名：</p>
					<p><a href="#">亚里士多德</a></p>
					<p>搜悦号：</p>
					<p>389323080</p>
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
					<dd><a href="#">退货申请</a></dd>
					<dd><a href="#">退货/退款记录</a></dd>
				</dl>
				<dl>
					<dt>我的消息</dt>
					<dd class="cur"><a href="#">商城快讯</a></dd>
					<dd><a href="#">帮助中心</a></dd>
				</dl>
			</div>
		</div>
		<div class="member-right fr">
			<div class="member-head">
				<div class="member-heels fl"><h2>商城快讯</h2></div>
			</div>
			<div class="member-border">
				<div class="member-form clearfix">


					<form action="/home/express" method="get">
						<input class="text-news" placeholder="商城快讯关键字" type="text"  name='express_title' value="{{$res['express_title']}}" >
						<button class="button-btn">搜索</button> 
					</form>
				</div>
				<div class="member-entry">
					<div class="member-issue clearfix">
						<span>标题</span>
						<span>发布时------间</span>
					</div>
					<ul>
						@foreach($res as $k=>$v)
						<li class="clearfix"><div><a href="{{$v->express_url}}"> {{$v->express_title}} </a></div><div> {{$v->created_at}} </div></li>
				
					
						@endforeach
					
					</ul>
				</div>
				<div class="member-pages clearfix">
					<div class="fr pc-search-g  links">
						
						{{$res->links()}}
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div style="height:100px"></div>
@endsection