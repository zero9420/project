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


<!-- feature-area-start (特价商品)-->
<div class="feature-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h3>
                        特价商品
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
                                <div class="col-md-12">
                                    <!-- single-product-start -->
                                    <div class="single-product">
                                        <div class="single-product-img">
                                            <a href="#">
                                                <img src="/home/bs/img/singlepro/8.jpg" alt="" />
                                            </a>
                                            <span class="sale-box">
                                                <span class="sale">
                                                    特价
                                                </span>
                                            </span>
                                        </div>
                                        <div class="single-product-content">
                                            <div class="product-title">
                                                <h5>
                                                    <a href="#">
                                                        商品名字
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
                                                    ￥50.00
                                                </span>
                                                <span class="old-price">
                                                    ￥70.00
                                                </span>
                                            </div>
                                            <div class="product-action">
                                                <button class="btn btn-default add-cart" title="add to cart">
                                                    加入购物车
                                                </button>
                                                <a class="add-wishlist" href="#" title="add to wishlist">
                                                    <i class="fa fa-heart">
                                                    </i>
                                                </a>
                                                <a class="quick-view" href="#" title="quick view" data-toggle="modal"
                                                data-target="#myModal">
                                                    <i class="fa fa-search">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-end -->
                                </div>
                                <div class="col-md-12">
                                    <!-- single-product-start -->
                                    <div class="single-product">
                                        <div class="single-product-img">
                                            <a href="#">
                                                <img src="/home/bs/img/singlepro/1.jpg" alt="" />
                                            </a>
                                            <span class="sale-box">
                                                <span class="sale">
                                                    特价
                                                </span>
                                            </span>
                                        </div>
                                        <div class="single-product-content">
                                            <div class="product-title">
                                                <h5>
                                                    <a href="#">
                                                        商品名字
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="rating">
                                                <div class="star">
                                                </div>
                                                <div class="star">
                                                </div>
                                                <div class="star">
                                                </div>
                                                <div class="star">
                                                </div>
                                                <div class="star">
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="price">
                                                    ￥50.00
                                                </span>
                                                <span class="old-price">
                                                    ￥70.00
                                                </span>
                                            </div>
                                            <div class="product-action">
                                                <button class="btn btn-default add-cart" title="add to cart">
                                                    加入购物车
                                                </button>
                                                <a class="add-wishlist" href="#" title="add to wishlist">
                                                    <i class="fa fa-heart">
                                                    </i>
                                                </a>
                                                <a class="quick-view" href="#" title="quick view" data-toggle="modal"
                                                data-target="#myModal">
                                                    <i class="fa fa-search">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-end -->
                                </div>
                                <div class="col-md-12">
                                    <!-- single-product-start -->
                                    <div class="single-product">
                                        <div class="single-product-img">
                                            <a href="#">
                                                <img src="/home/bs/img/singlepro/43.jpg" alt="" />
                                            </a>
                                            <span class="sale-box">
                                                <span class="sale">
                                                    特价
                                                </span>
                                            </span>
                                        </div>
                                        <div class="single-product-content">
                                            <div class="product-title">
                                                <h5>
                                                    <a href="#">
                                                        加入购物车
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
                                                <div class="star star-on">
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="price">
                                                    ￥50.00
                                                </span>
                                                <span class="old-price">
                                                    ￥70.00
                                                </span>
                                            </div>
                                            <div class="product-action">
                                                <button class="btn btn-default add-cart" title="add to cart">
                                                    加入购物车
                                                </button>
                                                <a class="add-wishlist" href="#" title="add to wishlist">
                                                    <i class="fa fa-heart">
                                                    </i>
                                                </a>
                                                <a class="quick-view" href="#" title="quick view" data-toggle="modal"
                                                data-target="#myModal">
                                                    <i class="fa fa-search">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-end -->
                                </div>
                                <div class="col-md-12">
                                    <!-- single-product-start -->
                                    <div class="single-product">
                                        <div class="single-product-img">
                                            <a href="#">
                                                <img src="/home/bs/img/singlepro/2.jpg" alt="" />
                                            </a>
                                            <span class="sale-box">
                                                <span class="sale">
                                                    特价
                                                </span>
                                            </span>
                                        </div>
                                        <div class="single-product-content">
                                            <div class="product-title">
                                                <h5>
                                                    <a href="#">
                                                        商品名称
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
                                                    ￥50.00
                                                </span>
                                                <span class="old-price">
                                                    ￥70.00
                                                </span>
                                            </div>
                                            <div class="product-action">
                                                <button class="btn btn-default add-cart" title="add to cart">
                                                    加入购物车
                                                </button>
                                                <a class="add-wishlist" href="#" title="add to wishlist">
                                                    <i class="fa fa-heart">
                                                    </i>
                                                </a>
                                                <a class="quick-view" href="#" title="quick view" data-toggle="modal"
                                                data-target="#myModal">
                                                    <i class="fa fa-search">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-end -->
                                </div>
                                <div class="col-md-12">
                                    <!-- single-product-start -->
                                    <div class="single-product">
                                        <div class="single-product-img">
                                            <a href="#">
                                                <img src="/home/bs/img/singlepro/7.jpg" alt="" />
                                            </a>
                                            <span class="sale-box">
                                                <span class="sale">
                                                    特价
                                                </span>
                                            </span>
                                        </div>
                                        <div class="single-product-content">
                                            <div class="product-title">
                                                <h5>
                                                    <a href="#">
                                                        商品名字
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="rating">
                                                <div class="star">
                                                </div>
                                                <div class="star">
                                                </div>
                                                <div class="star">
                                                </div>
                                                <div class="star">
                                                </div>
                                                <div class="star">
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="price">
                                                    ￥50.00
                                                </span>
                                                <span class="old-price">
                                                    ￥70.00
                                                </span>
                                            </div>
                                            <div class="product-action">
                                                <button class="btn btn-default add-cart" title="add to cart">
                                                    加入购物车
                                                </button>
                                                <a class="add-wishlist" href="#" title="add to wishlist">
                                                    <i class="fa fa-heart">
                                                    </i>
                                                </a>
                                                <a class="quick-view" href="#" title="quick view" data-toggle="modal"
                                                data-target="#myModal">
                                                    <i class="fa fa-search">
                                                    </i>
                                                </a>
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
</div>
<!-- feature-area-end -->


<!-- new-product-area-start (新品上市) -->
<div class="new-product-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h3>新品上市</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="new-product wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                <div class="new-carousel">
                    <div class="col-md-12">
                        <!-- single-product-start -->
                        <div class="single-product">
                            <div class="single-product-img">
                                <a href="#"><img src="/home/bs/img/singlepro/9.jpg" alt="" /></a>
                                <span class="new-box">
                                        <span class="new">新品上市</span>
                                </span>
                            </div>
                            <div class="single-product-content">
                                <div class="product-title">
                                    <h5><a href="#">商品名字</a></h5>
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
                                    <button class="btn btn-default add-cart" title="add to cart">Add to cart</button>
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
                                <span class="new-box">
                                        <span class="new">新品上市</span>
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
                                <a href="#"><img src="/home/bs/img/singlepro/10.jpg" alt="" /></a>
                                <span class="new-box">
                                        <span class="new">新品上市</span>
                                </span>
                            </div>
                            <div class="single-product-content">
                                <div class="product-title">
                                    <h5><a href="#">商品名字</a></h5>
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
                                <a href="#"><img src="/home/bs/img/singlepro/44.jpg" alt="" /></a>
                                <span class="new-box">
                                        <span class="new">新品上市</span>
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
                                <a href="#"><img src="/home/bs/img/singlepro/12.jpg" alt="" /></a>
                                <span class="new-box">
                                        <span class="new">新品上市</span>
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
<!-- new-product-area-end -->


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

@endsection