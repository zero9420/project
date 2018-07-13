<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="/home/bs/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/home/bs/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/home/bs/css/font-awesome.min.css" />
    <link href="/home/bs/style.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/homes/img/icon/favicon.ico">
</head>
<body>
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 hidden-xs">
                        <div class="header-top-left">
                            <div class="welcome-msg">
                                <span class="default-msg hidden-xs">欢迎来到云购物商城</span>
                                <span class="phone">服务热线: <span class="number">01234-567890</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12">
                        <div class="header-top-right">
                            <ul class="header-links hidden-xs">
                                @if(empty(session('user_id')))
                                <li>您好！欢迎来到云购物商城,请&nbsp;&nbsp;<a class="login" href="/home/logins">登录</a></li>
                                @else
                                <li>您好！&nbsp;&nbsp;<a class="login" href="/home/userinfo">{{session('user_name')}}</a>&nbsp;&nbsp;欢迎来到云购物商城!</li>
                                @endif
                                <li><a class="my-wishlist" href="/home/userinfo">个人中心</a></li>
                                <li><a class="checkout" href="#">我的订单</a></li>
                                <li><a class="my-account" href="#">帮助</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-8">
                        <div class="logo">
                            <a href="/"><img src="/home/bs/img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6 hidden-xs">
                        <div class="search-box">
                            <form action="/goodslist" method="get">
                                <input class="form-control search-form" name="gname" type="text" placeholder="请输入关键字">
                                <button class="search-button" value="Search" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-4 col-sm-6">
                    @php
                        $user_id = session('user_id');
                        $cart = App\Models\Home\Cart::where('user_id',$user_id)->get();
                    @endphp
                    @if(count($cart) != 0)
                        <div class="shopping-cart">
                            <a class="cart" href="/home/cart" title="view shopping cart"><span class="hidden-xs">我的购物车 <br><small>{{count($cart)}} 件商品</small></span></a>
                            <div class="top-cart-content">
                            @foreach($cart as $k=>$v)
                                <div class="media header-middle-checkout">
                                    <div class="media-left check-img">
                                        <a href="#"><img src="{{$v->goods_pic}}" alt=""></a>
                                    </div>
                                    <div class="media-body checkout-content">
                                        <h4 class="media-heading">
                                                <span class="cart-count">{{$v->num}}</span>
                                                <a href="/goodsdetail/{{$v->goods_id}}">{{$v->goods_name}}</a>
                                            </h4>
                                        <p>￥{{$v->goods_price}}</p>
                                    </div>
                                </div>
                            @endforeach
                                <div class="checkout">
                                    <a href="/home/cart"><span>进入购物车<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="shopping-cart">
                            <a class="cart" href="/home/cart" title="view shopping cart"><span class="hidden-xs">我的购物车 <br><small>0件商品</small></span></a>
                            <div class="top-cart-content">
                                <div class="checkout">
                                    <a href="/home/cart"><span>进入购物车<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                                </div>
                            </div>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu-area hidden-xs hidden-sm">
            <div class="container">
                <div class="row">
                    <div class="colo-md-12">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="/">首页</a></li>
                                    @php
                                        $cates = App\Http\Controllers\admin\CateController::getsubcate(0);
                                    @endphp
                                    @foreach($cates as $k=>$v)
                                    <li><a href="/goodslist?id={{$v->cate_id}}">{{$v->cate_name}}</a></li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


@section('content')


@show


    <!-- footer-start -->
    <footer>
        <div class="footer-area wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s" style="visibility: visible; animation-duration: 0.5s; animation-delay: 0.5s; animation-name: fadeIn;">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <h4>咨询中心</h4>
                                    <ul class="toggle-footer">
                                        <li><a title="Specials" href="#changxiao">畅销商品</a><li>
                                        <li><a title="Best sellers" href="#youhui">优惠商品</a></li>
                                        <li><a title="Our stores" href="#">实体商店</a></li>
                                        <li><a title="Contact us" href="#">联系我们</a></li>
                                        <li><a title="Sitemap" href="#">站点地图</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <h4>个人中心</h4>
                                    <ul class="toggle-footer">
                                        <li><a title="My orders" href="#">我的订单</a></li>
                                        <li><a title="My credit slips" href="#"> 我的购物车 </a></li>
                                        <li><a title="My addresses" href="#">我的地址</a></li>
                                        <li><a title="My personal info" href="/home/userinfo">我的个人信息</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <h4>商品分类</h4>
                                    <ul class="toggle-footer">
                                        @php
                                            $cates = App\Http\Controllers\admin\CateController::getsubcate(0);
                                        @endphp
                                        @foreach($cates as $k=>$v)
                                            <li><a title="My orders" href="/goodslist?id={{$v->cate_id}}">{{$v->cate_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-3  col-sm-3 col-xs-12">
                                    <h4>联系地址</h4>
                                    <div class="footer-contact">
                                        <p class="description">回龙观育荣教育园区兄弟连教学楼
                                        </p>
                                        <p class="address add">
                                            <span>中国北京市</span>
                                        </p>
                                        <p class="phone add">
                                            <span> 01234-567890</span>
                                        </p>
                                        <p class="email add">
                                            <a href="#">admin@admin.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment">
                        <a href="#"><img src="/home/bs/img/payment.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 footer-link">
                            <ul>
                                <li><a href="#">客户服务</a></li>
                                <li><a href="#">安全支付</a></li>
                                <li><a href="#">使用条款</a></li>
                                <li><a href="#">关于我们</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->



    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="/home/bs/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- bootstrap js -->
    <script src="/home/bs/js/bootstrap.min.js"></script>
    <!-- owl.carousel js -->
    <script src="/home/bs/js/owl.carousel.min.js"></script>
    <!-- meanmenu js -->
    <script src="/home/bs/js/jquery.meanmenu.js"></script>
    <!-- countdown js -->
    <script src="/home/bs/js/countdown.js"></script>
    <!-- jquery.nivo.slider.pack js -->
    <script src="/home/bs/js/jquery.nivo.slider.pack.js"></script>
    <!-- jquery-ui.min.js -->
    <script src="/home/bs/js/jquery-ui.min.js"></script>
    <!-- wow js -->
    <script src="/home/bs/js/wow.min.js"></script>
    <!-- plugins js -->
    <script src="/home/bs/js/plugins.js"></script>
    <!-- main js -->
    <script src="/home/bs/js/main.js"></script>
    <script src="/home/bs/js/myshop.js"></script>
    @section('js')


    @show

</body>
</html>