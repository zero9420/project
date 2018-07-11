@extends('layout.homes')
@section('title',$title)

@section('content')
<!-- slider(轮播图)-start -->
<div class="slider-container">
    <div class="slider">
        <!-- Slider Image -->
        <div id="mainslider" class="nivoSlider slider-image">
            <img src=" {{$arr[0]->lunbo_image1}} " alt="main slider" title="#htmlcaption1" />
            <img src=" {{$arr[0]->lunbo_image2}} " alt="main slider" title="#htmlcaption2" />
            <img src=" {{$arr[0]->lunbo_image3}} " alt="main slider" title="#htmlcaption3" />
            <img src=" {{$arr[0]->lunbo_image4}} " alt="main slider" title="#htmlcaption4" />
            <img src=" {{$arr[0]->lunbo_image5}} " alt="main slider" title="#htmlcaption5" />
        </div>
        <!-- Slider Caption 1 -->
        <div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
            <div class="slider-progress"></div>
            <div class="slide1-text slide-1 hidden-xs">
                <div class="middle-text">
                    <div class="cap-dec wow bounceInLeft" data-wow-duration="0.9s" data-wow-delay="0s">
                        <h2> {{$arr[0]->lunbo_title}} </h2>
                    </div>
                    <div class="cap-title wow bounceInRight" data-wow-duration="1.2s" data-wow-delay="0.2s">
                        <h4>活动时间截止到:{{$arr[0]->lunbo_time}} </h4>
                    </div>
                    <div class="cap-readmore wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                        <a href="#">快来买买买....</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Caption 2 -->
        <div id="htmlcaption2" class="nivo-html-caption slider-caption-2">
            <div class="slider-progress"></div>
            <div class="slide1-text slide-2 hidden-xs">
                <div class="middle-text">
                    <div class="cap-dec wow bounceInLeft" data-wow-duration="0.9s" data-wow-delay="0s">
                         <h2> {{$arr[0]->lunbo_title}} </h2>
                    </div>
                    <div class="cap-title wow bounceInRight" data-wow-duration="1.2s" data-wow-delay="0.2s">
                        <h4>活动时间截止到:{{$arr[0]->lunbo_time}} </h4>
                    </div>
                    <div class="cap-readmore wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                        <a href="#">快来买买买....</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Caption 3 -->
        <div id="htmlcaption3" class="nivo-html-caption slider-caption-3">
            <div class="slider-progress"></div>
                    <div class="slide1-text slide-3 hidden-xs">
                <div class="middle-text">
                    <div class="cap-dec wow bounceInLeft" data-wow-duration="0.9s" data-wow-delay="0s">
                       <h2> {{$arr[0]->lunbo_title}} </h2>
                    </div>
                    <div class="cap-title wow bounceInRight" data-wow-duration="1.2s" data-wow-delay="0.2s">
                        <h4>活动时间截止到:{{$arr[0]->lunbo_time}} </h4>
                    </div>
                    <div class="cap-readmore wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                        <a href="#">快来买买买....</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Slider Caption 4 -->
        <div id="htmlcaption4" class="nivo-html-caption slider-caption-4">
            <div class="slider-progress"></div>
            <div class="slide1-text slide-4 hidden-xs">
                <div class="middle-text">
                    <div class="cap-dec wow bounceInLeft" data-wow-duration="0.9s" data-wow-delay="0s">
                       <h2> {{$arr[0]->lunbo_title}} </h2>
                    </div>
                    <div class="cap-title wow bounceInRight" data-wow-duration="1.2s" data-wow-delay="0.2s">
                        <h4>活动时间截止到:{{$arr[0]->lunbo_time}} </h4>
                    </div>
                    <div class="cap-readmore wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                        <a href="#">快来买买买....</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Caption 5 -->
        <div id="htmlcaption5" class="nivo-html-caption slider-caption-5">
            <div class="slider-progress"></div>
            <div class="slide1-text slide-5 hidden-xs">
                <div class="middle-text">
                    <div class="cap-dec wow bounceInLeft" data-wow-duration="0.9s" data-wow-delay="0s">
                        <h2> {{$arr[0]->lunbo_title}} </h2>
                    </div>
                    <div class="cap-title wow bounceInRight" data-wow-duration="1.2s" data-wow-delay="0.2s">
                        <h4>活动时间截止到:{{$arr[0]->lunbo_time}} </h4>
                    </div>
                    <div class="cap-readmore wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                        <a href="#">快来买买买....</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider-end -->

<!-- banner-area-start (广告)-->
<div class="banner-area hidden-sm hidden-xs">
    <div class="container">
        <div class="row">
            @foreach($data as $k=>$v)
            <div class="col-md-4 col-xs-12" @if($v->position_status == 1) style="display:block @else style="display:none @endif">
                <div class="single-banner wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                    <a href="{{$v->position_url}}">
                        <img src="{{$v->position_image}}" alt="" />
                    </a>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</div>
<!-- banner-area-end -->


<!-- feature-area-start (热卖商品)-->
<div class="feature-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h3>
                        热卖商品
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="feature-tab wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                    <ul class="my-tab">
                        <li class=" ">
                            <a data-toggle="tab" href="">
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="new" class="tab-pane fade in active">
                            <div class="tab-carousel">
                                @foreach($goods as $k => $v)
                                <form action="/home/cart/{{$v->goods_id}}" method="POST">
                                    {{ csrf_field() }}
                                <div class="col-md-12">
                                    <!-- single-product-start -->
                                    <div class="single-product">
                                        <div class="single-product-img">
                                            <a href="/goodsdetail/{{$v->goods_id}}">
                                                <img src="{{$v->spec[0]->goods_pic}}" alt="" title="{{$v->goods_info}}" />
                                            </a>
                                            <span class="sale-box">
                                                <span class="sale">
                                                    热卖
                                                </span>
                                            </span>
                                        </div>
                                        <div class="single-product-content">
                                            <div class="product-title">
                                                <h5>
                                                    <a href="/goodsdetail/{{$v->goods_id}}">
                                                        {{$v->goods_name}}
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="rating">
                                                <div class="star star-on">
                                                </div>
                                                <div class="star star-on">
                                                </div>
                                                <div class="star star-on">
                                                </div>
                                                <div class="star star-on">
                                                </div>
                                                <div class="star">
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="price">
                                                    ￥{{$v->goods_price}}
                                                </span>
                                                <span class="old-price">
                                                    ￥70.00
                                                </span>
                                            </div>
                                            <div class="product-action">
                                                <button class="btn btn-default add-cart" title="add to cart">
                                                    加入购物车
                                                </button>
                                                <a class="add-wishlist" href="#" title="加入我的收藏">
                                                    <i class="fa fa-heart">
                                                    </i>
                                                </a>
                                                <a class="quick-view" href="javascript:void(0)" title="快速查看商品详情" data-toggle="modal"
                                                data-target="#myModal{{$v->goods_id}}"
                                                >
                                                    <i class="fa fa-search">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-end -->
                                </div>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- feature-area-end -->


<!-- exclusive-area-start (优惠商品) -->
<div class="exclusive-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-12 hidden-sm wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                <div class="best-seller">
                    <div class="row">
                        <div class="best-carousel">
                            <div class="col-md-12">
                                <!-- single-product-start -->
                                <div class="single-product">
                                    <div class="single-product-img">
                                        <a href="#"><img src="/home/bs/img/singlepro/11.jpg" alt="" /></a>
                                        <span class="discount-box">-12%</span>
                                    </div>
                                    <div class="upcoming">
                                        <span class="is-countdown"> </span>
                                        <div data-countdown="2018/09/01"></div>
                                    </div>
                                    <div class="single-product-content">
                                        <div class="product-title">
                                            <h5><a href="#">商品名称</a></h5>
                                        </div>
                                        <div class="rating">
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star"></div>
                                        </div>
                                        <div class="price-box">
                                            <span class="price">￥50.00</span>
                                            <span class="old-price">￥70.00</span>
                                        </div>
                                        <div class="product-action">
                                            <button class="btn btn-default add-cart" title="add to cart">加入购物车</button>
                                            <a class="add-wishlist" href="#" title="add to wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="quick-view" href="#" title="quick view" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-end -->
                            </div>
                            <div class="col-md-12">
                                <!-- single-product-start -->
                                <div class="single-product">
                                    <div class="single-product-img">
                                        <a href="#"><img src="/home/bs/img/singlepro/9.jpg" alt="" /></a>
                                        <span class="discount-box">-8%</span>
                                    </div>
                                    <div class="upcoming">
                                        <span class="is-countdown"> </span>
                                        <div data-countdown="2021/09/01"></div>
                                    </div>
                                    <div class="single-product-content">
                                        <div class="product-title">
                                            <h5><a href="#">商品名称</a></h5>
                                        </div>
                                        <div class="rating">
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star"></div>
                                        </div>
                                        <div class="price-box">
                                            <span class="price">￥50.00</span>
                                            <span class="old-price">￥70.00</span>
                                        </div>
                                        <div class="product-action">
                                            <button class="btn btn-default add-cart" title="add to cart">加入购物车</button>
                                            <a class="add-wishlist" href="#" title="add to wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="quick-view" href="#" title="quick view" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-xs-12 col-sm-12 wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h3>优惠商品</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="exclusive-product">
                        <div class="exclusive-carousel">
                            <div class="col-md-12">
                                <!-- single-product-start -->
                                <div class="single-product">
                                    <div class="single-product-img">
                                        <a href="#"><img src="/home/bs/img/singlepro/3.jpg" alt="" /></a>
                                        <span class="sale-box">
                                                <span class="sale">特价</span>
                                        </span>
                                    </div>
                                    <div class="single-product-content">
                                        <div class="product-title">
                                            <h5><a href="#">商品名称</a></h5>
                                        </div>
                                        <div class="rating">
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star"></div>
                                        </div>
                                        <div class="price-box">
                                            <span class="price">￥50.00</span>
                                            <span class="old-price">￥70.00</span>
                                        </div>
                                        <div class="product-action">
                                            <button class="btn btn-default add-cart" title="add to cart">加入购物车</button>
                                            <a class="add-wishlist" href="#" title="add to wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="quick-view" href="#" title="quick view" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-end -->
                            </div>
                            <div class="col-md-12">
                                <!-- single-product-start -->
                                <div class="single-product">
                                    <div class="single-product-img">
                                        <a href="#"><img src="/home/bs/img/singlepro/7.jpg" alt="" /></a>
                                        <span class="sale-box">
                                                <span class="sale">特价商品</span>
                                        </span>
                                    </div>
                                    <div class="single-product-content">
                                        <div class="product-title">
                                            <h5><a href="#">商品名称</a></h5>
                                        </div>
                                        <div class="rating">
                                            <div class="star"></div>
                                            <div class="star"></div>
                                            <div class="star"></div>
                                            <div class="star"></div>
                                            <div class="star"></div>
                                        </div>
                                        <div class="price-box">
                                            <span class="price">￥50.00</span>
                                            <span class="old-price">￥70.00</span>
                                        </div>
                                        <div class="product-action">
                                            <button class="btn btn-default add-cart" title="add to cart">加入购物车</button>
                                            <a class="add-wishlist" href="#" title="add to wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="quick-view" href="#" title="quick view" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-end -->
                            </div>
                            <div class="col-md-12">
                                <!-- single-product-start -->
                                <div class="single-product">
                                    <div class="single-product-img">
                                        <a href="#"><img src="/home/bs/img/singlepro/11.jpg" alt="" /></a>
                                        <span class="sale-box">
                                                <span class="sale">特价</span>
                                        </span>
                                    </div>
                                    <div class="single-product-content">
                                        <div class="product-title">
                                            <h5><a href="#">商品名称</a></h5>
                                        </div>
                                        <div class="rating">
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                        </div>
                                        <div class="price-box">
                                            <span class="price">￥50.00</span>
                                            <span class="old-price">￥70.00</span>
                                        </div>
                                        <div class="product-action">
                                            <button class="btn btn-default add-cart" title="add to cart">加入购物车</button>
                                            <a class="add-wishlist" href="#" title="add to wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="quick-view" href="#" title="quick view" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-end -->
                            </div>
                            <div class="col-md-12">
                                <!-- single-product-start -->
                                <div class="single-product">
                                    <div class="single-product-img">
                                        <a href="#"><img src="/home/bs/img/singlepro/12.jpg" alt="" /></a>
                                        <span class="sale-box">
                                                <span class="sale">特价</span>
                                        </span>
                                    </div>
                                    <div class="single-product-content">
                                        <div class="product-title">
                                            <h5><a href="#">商品名称</a></h5>
                                        </div>
                                        <div class="rating">
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star star-on"></div>
                                            <div class="star"></div>
                                        </div>
                                        <div class="price-box">
                                            <span class="price">￥50.00</span>
                                            <span class="old-price">￥70.00</span>
                                        </div>
                                        <div class="product-action">
                                            <button class="btn btn-default add-cart" title="add to cart">加入购物车</button>
                                            <a class="add-wishlist" href="#" title="add to wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="quick-view" href="#" title="quick view" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-end -->
                            </div>
                            <div class="col-md-12">
                                <!-- single-product-start -->
                                <div class="single-product">
                                    <div class="single-product-img">
                                        <a href="#"><img src="/home/bs/img/singlepro/5.jpg" alt="" /></a>
                                        <span class="sale-box">
                                                <span class="sale">特价</span>
                                        </span>
                                    </div>
                                    <div class="single-product-content">
                                        <div class="product-title">
                                            <h5><a href="#">商品名称</a></h5>
                                        </div>
                                        <div class="rating">
                                            <div class="star"></div>
                                            <div class="star"></div>
                                            <div class="star"></div>
                                            <div class="star"></div>
                                            <div class="star"></div>
                                        </div>
                                        <div class="price-box">
                                            <span class="price">￥50.00</span>
                                            <span class="old-price">￥70.00</span>
                                        </div>
                                        <div class="product-action">
                                            <button class="btn btn-default add-cart" title="add to cart">加入购物车</button>
                                            <a class="add-wishlist" href="#" title="add to wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="quick-view" href="#" title="quick view" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- exclusive-area-end -->


<!-- service-area-start (服务) -->
<div class="service-area">
    <div class="container">
        <div class="row">
            <div class="service wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                <div class="col-md-3 col-xs-12 col-sm-3">
                    <div class="single-service">
                        <i class="fa fa-plane"></i>
                        <h3>免费送货</h3>
                        <p> 全世界7天送达 </p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-3">
                    <div class="single-service">
                        <i class="fa fa-taxi"></i>
                        <h3>送货上门</h3>
                        <p>全国送货上门</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-3">
                    <div class="single-service no-bor">
                        <i class="fa fa-cc-visa"></i>
                        <h3>安全支付</h3>
                        <p>安全支付方法</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-3">
                    <div class="single-service no-bor">
                        <i class="fa fa-phone"></i>
                        <h3>7天24小时客服在线</h3>
                        <p>在线联系客服</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service-area-end -->


<!-- blog-area-start (博客)-->
<div class="blog-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h3>最新博客</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blogs wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                <div class="blog-carousel">
                    <div class="col-md-12">
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="#"><img src="/home/bs/img/blog/1.jpg" alt="" /></a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="#">html</a></h3>
                                <div class="meta">
                                    <span class="post-category">in <a href="#">HTML</a>
                                        </span>
                                    <span class="meta-border">|</span>
                                    <span class="time"><i class="fa fa-clock-o"></i>July 04, 2018</span>
                                </div>
                                <p>超文本标记语言，标准通用标记语言下的一个应用。“超文本”就是指页面内可以包含图片、链接，甚至音乐、程序等非文字元素。
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="#"><img src="/home/bs/img/blog/2.jpg" alt="" /></a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="#">php</a></h3>
                                <div class="meta">
                                    <span class="post-category">in <a href="#">PHP</a></span>
                                    <span class="meta-border">|</span>
                                    <span class="time"><i class="fa fa-clock-o"></i>July 05, 2018</span>
                                </div>
                                <p>PHP（超文本预处理器）是一种通用开源脚本语言。语法吸收了C语言、Java和Perl的特点，利于学习，使用广泛，主要适用于Web开发领域。
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="#"><img src="/home/bs/img/blog/3.jpg" alt="" /></a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="#">Linux</a></h3>
                                <div class="meta">
                                    <span class="post-category">in <a href="#">linux</a></span>
                                    <span class="meta-border">|</span>
                                    <span class="time"><i class="fa fa-clock-o"></i>July 6, 2018</span>
                                </div>
                                <p>Linux是一套免费使用和自由传播的类Unix操作系统，是一个基于POSIX和UNIX的多用户、多任务、支持多线程和多CPU的操作系统。它能运行主要的UNIX工具软件、应用程序和网络协议。它支持32位和64位硬件。Linux继承了Unix以网络为核心的设计思想，是一个性能稳定的多用户网络操作系统。
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="#"><img src="/home/bs/img/blog/4.jpg" alt="" /></a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="#">javaScript</a></h3>
                                <div class="meta">
                                    <span class="post-category">in <a href="#">javaScript</a></span>
                                    <span class="meta-border">|</span>
                                    <span class="time"><i class="fa fa-clock-o"></i>July 7, 2018</span>
                                </div>
                                <p>JavaScript一种直译式脚本语言，是一种动态类型、弱类型、基于原型的语言，内置支持类型。它的解释器被称为JavaScript引擎，为浏览器的一部分，广泛用于客户端的脚本语言，最早是在HTML（标准通用标记语言下的一个应用）网页上使用，用来给HTML网页增加动态功能。
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog-area-end -->


<!-- brand-area-start (友情链接)-->
<div class="brand-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h3>友情链接</h3>
                </div>
            </div>
        </div>

        @php
        use \Illuminate\Support\Facades\DB;
        $res = DB::select('select * from shop_link ');
 
        @endphp
        <div class="row">
            <div class="brands wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                <div class="brand-carousel">
                    @foreach($res as $k=>$v)
                    <div class="col-md-12" @if($v->link_status == 1) style="display:block @else style="display:none @endif">
                        <div class="single-brand">
                           <a href="{{$v->link_url}}"><img src="{{$v->link_logo}}" alt=""  ></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand-area-end -->


<!-- news-letter-area-start (订阅我们) -->
<div class="news-letter-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="subscribe-area wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                    <div class="subscribe-title">
                        <h3><span>订阅</span>我们</h3>
                        <p>
                            订阅我们,新品上市、特别优惠和其他折扣信息的更新我们将及时通知您!
                        </p>
                        <form action="#">
                            <div class="subscribe-form">
                                <input type="text" placeholder="请输入您的邮箱..." class="form-control search-form" />
                                <button>点击立即订阅</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- news-letter-area-end -->

<!-- Modal -->
@foreach($goods as $v)
<div id="myModal{{$v->goods_id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="product-details">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-xs-12 col-sm-5">
                                <div class="picture-tab">
                                    <ul class="pic-tabs">
                                        @foreach($v->spec as $vv)
                                        <li class=" "><a data-toggle="tab" href="#pic{{$vv->goods_spec_id}}" aria-expanded="true"><img src="{{$vv->goods_pic}}" alt=""></a></li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">
                                    <div id="pic{{$v->spec[0]->goods_spec_id}}" class="tab-pane fade in active">
                                        <!-- single-product-start -->
                                        <div class="single-product">
                                            <div class="single-product-img">
                                                <a href="/goodsdetail/{{$v->goods_id}}">
                                                    <img src="{{$v->spec[0]->goods_pic}}" alt="">
                                                </a>
                                                <span class="sale-box">
                                                    <span class="sale">热销</span>
                                                </span>
                                                <span class="new-box">
                                                    <span class="new">新品上市</span>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- single-product-end -->
                                    </div>
                                    @foreach($v->spec as $vvv)
                                        <div id="pic{{$vvv->goods_spec_id}}" class="tab-pane fade">
                                            <!-- single-product-start -->
                                            <div class="single-product">
                                                <div class="single-product-img">
                                                    <a href="/goodsdetail/{{$v->goods_id}}">
                                                        <img src="{{$vvv->goods_pic}}" alt="">
                                                    </a>
                                                    <span class="sale-box">
                                                        <span class="sale">热销</span>
                                                    </span>
                                                    <span class="new-box">
                                                        <span class="new">新品上市</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- single-product-end -->
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-xs-12 col-sm-7">
                                <div class="product-details-info">
                                    <h5 class="product-title">{{$v->goods_name}}</h5>
                                    <div class="price-box">
                                        <span class="price">￥{{$v->goods_price}}</span>
                                        <span class="old-price">￥70.00</span>
                                    </div>
                                    <div class="rating">
                                        <a class="add-wishlist" href="#" title="加入我的收藏">
                                            <i class="fa fa-heart"></i>
                                            <span>收藏宝贝</span>
                                        </a>
                                    </div>
                                    <div class="short-description">
                                        <p>{{$v->goods_info}}
                                        </p>
                                    </div>
                                    @php
                                        $size = array_filter(explode('|',$v->goods_size));
                                        $color = array_filter(explode('|',$v->goods_color));
                                    @endphp
                                <form action="/home/cart" method='POST'>
                                    {{ csrf_field() }}
                                    <div class="add-cart">
                                        <span>尺码:</span>
                                        @foreach($size as $vs)
                                        <a href="javascript:void(0)">
                                            <input type="radio" name="goods_size" value="{{$vs}}">
                                            <span>{{strtoupper($vs)}}</span>
                                        </a>
                                        @endforeach
                                    </div>
                                    <div class="add-cart">
                                        <span>颜色:</span>
                                        @foreach($color as $vc)
                                        <a href="javascript:void(0)">
                                            <input type="radio" name="goods_color" value="{{$vc}}">
                                            <span>{{$vc}}</span>
                                        </a>
                                        @endforeach
                                    </div>
                                    <div class="add-cart">
                                        <p class="quantity cart-plus-minus">
                                            <label>购买数量</label>
                                            <input type="text" value="1" name="goods_number">
                                        </p>
                                        <div class="shop-add-cart">
                                            <button>加入购物车</button>
                                        </div>
                                    </div>
                                </form>
                                    <div class="widget-icon">
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </div>
                                    <div class="widget-icon">
                                    </div>
                                    <style>
                                        .add-cart a{
                                            margin-right: 10px;
                                        }
                                        .add-cart span{
                                            margin-right: 10px;
                                        }
                                    </style>
                                    <div class="add-cart">
                                        <span>承诺:</span>
                                        <a href="">
                                            <img src="/home/bs/img/detail/qitian.png" alt="" title="满足七天退货的前提下,包邮商品需买家承担退货运费!">
                                            <span>七天退货</span>
                                        </a>
                                        <a href="">
                                            <img src="/home/bs/img/detail/dingdanxian.png" alt="" title="订单险">
                                            <span>订单险</span>
                                        </a>
                                        <a href="">
                                            <img src="/home/bs/img/detail/wuyoutuihuo.png" alt="" title="无忧退货">
                                            <span>无忧退货</span>
                                        </a>
                                        <a href="">
                                            <img src="/home/bs/img/detail/yunfeixian.png" alt="" title="运费险">
                                            <span>运费险</span>
                                        </a>
                                    </div>
                                    <div class="widget-icon">
                                    </div>
                                    <div class="add-cart" style="margin-right: 20px;">
                                        <span >支付:</span>
                                        <a href="">
                                            <img src="/home/bs/img/detail/zhifubao.png" alt="" title="支付宝">
                                            <span>支付宝</span>
                                        </a>
                                        <a href="">
                                            <img src="/home/bs/img/detail/weixin.png" alt="" title="微信">
                                            <span>微信</span>
                                        </a>
                                        <a href="">
                                            <img src="/home/bs/img/detail/xinyongka.png" alt="" title="信用卡">
                                            <span>信用卡</span>
                                        </a>
                                        <a href="">
                                            <img src="/home/bs/img/detail/mayihuabei.png" alt="" title="蚂蚁花呗">
                                            <span>蚂蚁花呗</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- modal-end -->

@endsection