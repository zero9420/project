<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admins/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admins/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admins/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/themer.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admins/css/admins.css" media="screen">

<title>@yield('title')</title>

</head>

<body>
	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap" style="color: white">
                <a href="/"><h4>云购物购物商城首页</h4></a>
			</div>
        </div>
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        	<!-- Notifications -->
            @php
                $count = App\Models\Admin\Goods::where('goods_stock','<','20')->count();
                $prompt = App\Models\Admin\Goods::where('goods_stock','<','20')->take(5)->get();
            @endphp
        	<div id="mws-user-notif" class="mws-dropdown-menu">
                <a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a>
                <!-- Unread notification count -->
                <span class="mws-dropdown-notif">{{$count}}</span>
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                    <div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                            @foreach($prompt as $v)
                            <li class="read">
                                <a href="#">
                                    <span class="message">
                                        商品ID:{{$v->goods_id}}; 商品名:{{$v->goods_name}}
                                    </span>
                                    <span class="time">
                                        库存不足,请及时添加
                                    </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="mws-dropdown-viewall">
                            <a href="/admin/index">查看全部.....</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="{{session('profile')}}" alt="User Photo">
                </div>
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                         {{session('auth_name')}}
                    </div>
                    <ul>
                    	<li><a href="/admin/auth/{{session('id')}}/edit">修改头像</a></li>
                        <li><a href="/admin/authpassword/{{session('id')}}">修改密码</a></li>
                        <li><a href="/admin/outlogin">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">

    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>

        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">

            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>



            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                	<li>
                        <a href="/admin/index"><i class="icon-direction"></i>返回首页</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i>个人信息</a>
                        <ul class='closed'>
                            <li><a href="/admin/user">浏览信息</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-users"></i>角色管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/auth/create">添加角色</a></li>
                            <li><a href="/admin/auth">浏览角色</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-th"></i>分类管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/cate/create">添加分类</a></li>
                            <li><a href="/admin/cate">浏览分类</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-shopping-cart"></i>商品管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/goods/create">添加商品</a></li>
                            <li><a href="/admin/goods">浏览商品</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-calendar"></i>广告管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/position/create">添加广告</a></li>
                            <li><a href="/admin/position">浏览广告</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-link"></i>链接管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/link/create">添加链接</a></li>
                            <li><a href="/admin/link">浏览链接</a></li>
                        </ul>
                    </li>

                     <li>

                        <a href="#"><i class="icon-television"></i>轮播管理</a>

                        <ul class='closed'>
                            <li><a href="/admin/lunbo/create">添加轮播</a></li>
                            <li><a href="/admin/lunbo">浏览轮播</a></li>

                        </ul>
                    </li>

                     <li>
                        <a href="#"><i class="icon-list-2"></i>订单管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/order">浏览订单</a></li>
                          


                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-users"></i>用户管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/users/create">添加用户</a></li>
                            <li><a href="/admin/users">浏览用户</a></li>

                        </ul>
                    </li>



                      <li>
                        <a href="#"><i class="icon-link"></i>商城快讯</a>
                        <ul class='closed'>
                            <li><a href="/admin/express/create">添加快讯</a></li>
                            <li><a href="/admin/express">浏览快讯</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
            
                @if(session('success'))
                    <div class="mws-form-message info">
                        {{session('success')}}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mws-form-message warning">
                        {{session('error')}}
                    </div>
                @endif
                
                @section('content')


                @show

               
                
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website {{date('Y-m-d',time())}}. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admins/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admins/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admins/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admins/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admins/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admins/jui/jquery-ui.custom.min.js"></script>
    <script src="/admins/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admins/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/admins/plugins/flot/jquery.flot.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/admins/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admins/plugins/validate/jquery.validate-min.js"></script>
    <script src="/admins/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/admins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admins/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admins/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admins/js/demo/demo.dashboard.js"></script>

    <script src="/admins/js/times/goods.js"></script>

    <script type="text/javascript">
    </script>
    @section('js')


    @show

</body>
</html>