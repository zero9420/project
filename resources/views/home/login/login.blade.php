<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="Generator" content="EditPlus®">
	<meta name="Author" content="">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta name="renderer" content="webkit">
	<title>登录.云购物商城</title>
	<link rel="shortcut icon" type="image/x-icon" href="home/login/img/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/home/login/css/base.css">
	<link rel="stylesheet" type="text/css" href="/home/login/css/home.css">
	 <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
    >
</head>
<body>

<header id="pc-header">
	<div class="center">
		<div class="pc-fl-logo">
			<h1>
				<a href="/"></a>
			</h1>
		</div>
	</div>
</header>
<section>
	<div class="pc-login-bj">
		<div class="center clearfix">
			<div class="fl"></div>
			<div class="fr pc-login-box" style="width: 415px">
				<div class="pc-login-title"><h2>用户登录</h2></div>
				<form action="/home/logins" method="post">
				{{ csrf_field() }}
					<div class="pc-sign">
						<input type="text" name="username" placeholder="用户名/邮箱/手机号">
					</div>
					<div class="pc-sign">
						<input type="password" name="password" placeholder="请输入您的密码">
					</div>
				 @if(count($errors)>0)
                <div class="alert alert-danger" role='alert'>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </div>  
            @endif  
					<div class="pc-submit-ss">
						<input type="submit" value="登录" placeholder="">
					</div>
					<div class="pc-item-san clearfix">
						<a href="#"><img src="/home/login/img/icon/weixin.png" alt="">微信登录</a>
						<a href="#"><img src="/home/login/img/icon/weibo.png" alt="">微博登录</a>
						<a href="#" style="margin-right:0"><img src="/home/login/img/icon/tengxun.png" alt="">QQ登录</a>
					</div>
					<div class="pc-reg">
						<a href="#">忘记密码</a>
						<a href="/home/register" class="red">免费注册</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<footer>
	<div class="center">
		<div class="pc-footer-login">
			<p>关于我们 招聘信息 联系我们 商家入驻 商家后台 商家社区 ©2017 Yungouwu.com 北京云购物网络有限公司</p>
			<p style="color:#999">营业执照注册号：990106000129004 | 网络文化经营许可证：北网文（2016）0349-219号 | 增值电信业务经营许可证：京2-20110349 | 安全责任书 | 京公网安备 99010602002329号 </p>
		</div>
	</div>
</footer>

</body>
</html>