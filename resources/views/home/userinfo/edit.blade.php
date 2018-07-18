@extends('layout.homes')

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
<div class="containers center"><div class="pc-nav-item"><a href="#">首页</a> &gt; <a href="#">会员中心 </a> &gt; <a href="#">商城快讯</a></div></div>
<section id="member">

	<form action="/home/userup/{{$mation->info_id}}" method="post" enctype='multipart/form-data'>
	<div class="member-center clearfix">
		<div class="member-left fl">
			<div class="member-apart ">
				<div class="fl tu"><a href="#">
					<img src="{{$mation->info_image}}"></a>
				</div>
				<div class="fffl" >

					<p><span class="label label-info">昵称</span>&nbsp;&nbsp;{{$mation->info_nickname}}</p>
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
		<div class="member-right fr">
			<div class="member-head">
				<div class="member-heels fl"><h2>个人中心</h2></div>
			</div>
			  	<div class='tupian'>
				<input type="file" name="info_image">
				</div>
				<div class="member-caution clearfix">
					<ul>
						<li class="clearfix">
							<div class="warn1"></div>
							<div class="warn2">姓名</div>
							<input type="text" class="war" name="info_name" value="{{$mation->info_name}}">
							<!-- <div class="warn4"><a href="#">修改</a> </div> -->
						</li>
						<li class="clearfix">
							<div class="warn1"></div>
							<div class="warn2">性别</div>
							<span class="checkit  p1"><input type="radio" name="info_sex"  value="1"  @if($mation->info_sex == 1)  checked @endif></span> <label for="" class= 'check-label'>男</label>
							<span class="checkit p1"><input type="radio" name="info_sex"  value="2"   @if($mation->info_sex == 2)  checked @endif ></span><label for="" class= 'check-label'>女</label>
						</li>
						<li class="clearfix">
							<div class="warn1"></div>
							<div class="warn2">昵称</div>
							<input type="text" class="war" name="info_nickname" value="{{$mation->info_nickname}}">
						</li>
						<li class="clearfix">
							<div class="warn6"></div>
							<div class="warn2">联系电话</div>
							<input type="text" class="war" name="info_telphone" value="{{$mation->info_telphone}}">
						</li>
						<li class="clearfix">
							<div class="warn6"></div>
							<div class="warn2">地址</div>
							<input type="text" class="wa" name="info_address" value="{{$mation->info_address}}">
						</li>
						<li class="clearfix">
							<div class="warn6"></div>
							<input type='submit' value="提交" class='btn'>
						</li>
					</ul>
				</div>

				{{csrf_field()}}
			 </form>	
			</div>
		</div>
	</div>
</section>
<style>
.info{

    position:absolute;
    top:370px;
    right:680px;
}
</style>
        @if (count($errors) > 0)
            <div class="mws-form-message error info">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

@endsection