@extends('layout.homes')

<link rel="stylesheet" type="text/css" href="/homes/css/member.css">
<link rel="stylesheet" type="text/css" href="/homes/css/user.css">
@section('content')
<div class="containers center"><div class="pc-nav-item"><a href="#">首页</a> &gt; <a href="#">会员中心 </a> &gt; <a href="#">商城快讯</a></div></div>
<section id="member">

	<form action="/home/userup/{{$mation->info_id}}" method="post" enctype='multipart/form-data'>
	<div class="member-center clearfix">
		<div class="member-left fl">
			<div class="member-apart ">
				<div class="fl"><a href="#">
					<img src="{{$mation->info_image}}"></a>
				</div>
				<div class="fffl" >

					<p>用户名：<div></div>{{$mation->info_nickname}}</p>
					
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
							<input type="radio" name="info_sex" id="inlineRadio1" value="1" class='p1'   @if($mation->info_sex == 1)  checked @endif> 男
							<input type="radio" name="info_sex" id="inlineRadio1" value="2" class='p1'  @if($mation->info_sex == 2)  checked @endif > 女
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
	top:330px;
	right:540px;
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