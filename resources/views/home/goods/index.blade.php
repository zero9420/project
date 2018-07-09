@extends('layout.homes')
@section('title',$title)

@section('content')
<!-- heading-banner-start -->
<div class="heading-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="breadcrumb">
                    <a title="返回首页" href="/">
                        <i class="icon-home"></i>
                    </a>
                    <span class="navigation-page">
                        <span class="navigation-pipe">></span>
                        <a href="/goodslist">商品页</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- heading-banner-end -->


<!-- shop-area-start -->
<div class="shop-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="shop-left-col wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                    <div class="content-box">
                        <h2>分类</h2>
                        <ul>
                            @php
                                $cates = App\Http\Controllers\admin\CateController::getsubcate(0);
                            @endphp
                            @foreach($cates as $k=>$v)
                            <li>
                                <label class="check-label">
                                    <a @if($id == $v->cate_id) class="bg-danger" @endif href="/goodslist/{{$v->cate_pid}}">{{$v->cate_name}}</a>
                                </label>
                                @if($v->sub)
                                @foreach($v->sub as $kk => $vv)
                                    <li>
                                        <label class="check-label">
                                            &nbsp;&nbsp;&nbsp;<a @if($id == $vv->cate_id) class="bg-danger" @endif href="/goodslist/{{$vv->cate_id}}">{{$vv->cate_name}}</a>
                                        </label>
                                        @if($vv->sub)
                                        @foreach($vv->sub as $kkk => $vvv)
                                            <li>
                                                <label class="check-label">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a @if($id == $vvv->cate_id) class="bg-danger" @endif href="/goodslist/{{$vvv->cate_id}}">{{$vvv->cate_name}}</a>
                                                </label>
                                            </li>
                                        @endforeach
                                        @endif
                                    </li>
                                @endforeach
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- 
                    <div class="content-box">
                        <h2>按价格进行搜索</h2>
                        <div class="info_widget">
                        <form action="/goodslist" method="get">
                            <div class="price_filter">
                                <style>
                                    input[type="number"]{
                                        border: medium none;
                                        font-weight: bold;
                                        letter-spacing: 3px;
                                        margin-left: -15px;
                                        text-align: center;
                                        width: 130px;
                                    }
                                </style>
                                <div class="price_slider_amount">
                                    <input type="number" name="price_min" value="300" placeholder="Add Your Price" />-
                                    <input type="number" name="price_max" value="3000" placeholder="Add Your Price" />
                                </div>
                                <button class="price-filter" id="search">
                                    搜索
                                </button>
                            </div>
                        </form>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="shop-right-col wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                    <div class="category-products">
                        <div class="topbar-category">
                            <div class="pager-area">
                                <div>
                                    <!-- Nav tabs -->
                                    <ul class="shop-tab">
                                        <li role="presentation" class="active"><a href="#gried_view" role="tab" data-toggle="tab">
                                                <i class="fa fa-th-large"></i></a>
                                        </li>
                                        <li role="presentation"><a href="#list_view" role="tab" data-toggle="tab">
                                                <i class="fa fa-th-list"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="shop-category-product">
                            <div class="row">
                                <div class="category-product">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active fade in" id="gried_view">
                                        @foreach($goods as $k => $v)
                                            @php
                                                $pic = $v->spec;
                                            @endphp
                                            <div class="col-md-4 col-sm-6 col-xs-12 mar-bot">
                                                <!-- single-product-start -->
                                                <div class="single-product">
                                                    <div class="single-product-img">
                                                        <a href="/goodsdetail/{{$v->goods_id}}">
                                                            <img src="{{$pic[0]->goods_pic}}" alt="" />
                                                        </a>
                                                        <span class="sale-box">
                                                            <span class="sale">Sale</span>
                                                        </span>
                                                        <span class="new-box">
                                                            <span class="new">New</span>
                                                        </span>
                                                    </div>
                                                    <div class="single-product-content">
                                                        <div class="product-title">
                                                            <h5>
                                                                <a href="/goodsdetail/{{$v->goods_id}}">{{$v->goods_name}}</a>
                                                            </h5>
                                                        </div>
                                                        <div class="rating">
                                                            <div class="star star-on"></div>
                                                            <div class="star star-on"></div>
                                                            <div class="star star-on"></div>
                                                            <div class="star star-on"></div>
                                                            <div class="star"></div>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="price">￥{{$v->goods_price}}</span>
                                                            <span class="old-price">￥70.00</span>
                                                        </div>
                                                        <div class="product-action">
                                                            <button class="button btn btn-default add-cart" title="add to cart">加入购物车</button><!-- 
                                                            <a class="add-wishlist" href="#" title="add to wishlist">
                                                                <i class="fa fa-heart"></i>
                                                            </a>
                                                            <a class="quick-view" href="#" title="quick view"  data-toggle="modal" data-target="#myModal">
                                                                <i class="fa fa-search"></i>
                                                            </a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-end -->
                                            </div>
                                        @endforeach
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="list_view">
                                            <div class="list-view">
                                                <div class="row">
                                                    @foreach($goods as $k => $v)
                                                        @php
                                                            $pic = $v->spec;
                                                        @endphp
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-img">
                                                                    <a href="/goodsdetail/{{$v->goods_id}}">
                                                                        <img src="{{$pic[0]->goods_pic}}" alt="" />
                                                                    </a>
                                                                    <span class="sale-box">
                                                                        <span class="sale">Sale</span>
                                                                    </span>
                                                                    <span class="new-box">
                                                                        <span class="new">New</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <!-- single-product-start -->
                                                            <div class="single-product">
                                                                <div class="single-product-content">
                                                                    <div class="product-title">
                                                                        <h5>
                                                                            <a href="/goodsdetail/{{$v->goods_id}}">{{$v->goods_name}}</a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                        <div class="star star-on"></div>
                                                                    </div>
                                                                    <div class="price-box">
                                                                        <span class="price">￥{{$v->goods_price}}</span>
                                                                        <span class="old-price">￥70.00</span>
                                                                    </div>
                                                                    <p class="product-desc">{{$v->goods_info}}
                                                                    </p>
                                                                    <div class="product-action">
                                                                        <button class="button btn btn-default add-cart" title="add to cart">加入购物车</button>
                                                                        <!-- <a class="add-wishlist" href="#" title="add to wishlist">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <a class="quick-view" href="#" title="quick view"  data-toggle="modal" data-target="#myModal">
                                                                            <i class="fa fa-search"></i>
                                                                        </a> -->
                                                                    </div>
                                                                    <div class="availability">
                                                                        <span>有货</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-end -->
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="float:right;">
                                {{$goods->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shop-area-end -->


@endsection
