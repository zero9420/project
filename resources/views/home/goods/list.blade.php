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
                            <li  class="bg-info">
                                <label class="check-label">
                                    <a href="/goodslist">所有商品</a>
                                </label>
                            </li>
                            @foreach($cates as $k=>$v)
                            <li>
                                <label class="check-label">
                                    <a @if($id == $v->cate_id) class="bg-danger" @endif href="/goodslist?id={{$v->cate_id}}">{{$v->cate_name}}</a>
                                </label>
                                @if($v->sub)
                                @foreach($v->sub as $kk => $vv)
                                    <li>
                                        <label class="check-label">
                                            &nbsp;&nbsp;&nbsp;<a @if($id == $vv->cate_id) class="bg-danger" @endif href="/goodslist?id={{$vv->cate_id}}">{{$vv->cate_name}}</a>
                                        </label>
                                        @if($vv->sub)
                                        @foreach($vv->sub as $kkk => $vvv)
                                            <li>
                                                <label class="check-label">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a @if($id == $vvv->cate_id) class="bg-danger" @endif href="/goodslist?id={{$vvv->cate_id}}">{{$vvv->cate_name}}</a>
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
                                        @if(count($goods) != 0)
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
                                                        @if($v->goods_hot == '2')
                                                        <span class="sale-box">
                                                            <span class="sale">热销</span>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="single-product-content">
                                                        <div class="product-title">
                                                            <h5>
                                                                <a href="/goodsdetail/{{$v->goods_id}}">{{$v->goods_name}}</a>
                                                            </h5>
                                                        </div>
                                                        <div class="rating">
                                                        </div>
                                                        <div class="price-box">
                                                            @if($v->goods_preferential != $v->goods_price)
                                                            <span class="price">
                                                                ￥{{$v->goods_preferential}}
                                                            </span>
                                                            <span class="old-price">
                                                                ￥{{$v->goods_price}}
                                                            </span>
                                                            @else
                                                            <span class="price">
                                                                ￥{{$v->goods_price}}
                                                            </span>
                                                            @endif
                                                        </div>
                                                        <div class="product-action">
                                                            <!-- <button class="button btn btn-default add-cart" title="加入购物车" >加入购物车</button> -->
                                                            <a class="add-wishlist" href="/goodsdetail/{{$v->goods_id}}" title="加入我的收藏">
                                                                <i class="fa fa-heart"></i>
                                                            </a>
                                                            <a class="quick-view" href="#" title="快速浏览商品"  data-toggle="modal" data-target="#myModal{{$v->goods_id}}">
                                                                <i class="fa fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-end -->
                                            </div>
                                        @endforeach
                                        </div>
                                        @else
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <b>该分类下暂无商品,敬请期待!</b>
                                                </div>
                                            </div>
                                        @endif
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
                                                                    @if($v->goods_hot == '2')
                                                                    <span class="sale-box">
                                                                        <span class="sale">热销</span>
                                                                    </span>
                                                                    @endif
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
                                                                    <div class="product-action">
                                                                    </div>
                                                                    <div class="price-box">
                                                                        @if($v->goods_preferential != $v->goods_price)
                                                                        <span class="price">
                                                                        ￥{{$v->goods_preferential}}
                                                                        </span>
                                                                        <span class="old-price">
                                                                            ￥{{$v->goods_price}}
                                                                        </span>
                                                                        @else
                                                                        <span class="price">
                                                                            ￥{{$v->goods_price}}
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                    <p class="product-desc">{{$v->goods_info}}
                                                                    </p>
                                                                    <div class="product-action">
                                                                        <!-- <button class="button btn btn-default add-cart" title="add to cart">加入购物车</button> -->
                                                                        <a class="add-wishlist" href="#" title="加入我的收藏">
                                                                            <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <a class="quick-view" href="javascript:void(0)" title="快速查看商品详情"  data-toggle="modal" data-target="#myModal{{$v->goods_id}}">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    </div><!--
                                                                    <div class="availability">
                                                                        <span>有货</span>
                                                                    </div> -->
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
                                                <a href="#">
                                                    <img src="{{$v->spec[0]->goods_pic}}" alt="">
                                                </a>
                                                <span class="sale-box">
                                                    <span class="sale">热销</span>
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
                                    <form action="/home/cart/{{$v->goods_id}}" method='POST'>
                                        {{ csrf_field() }}
                                        <h5 class="product-title">{{$v->goods_name}}</h5>
                                        <div class="price-box">
                                            @if($v->goods_preferential != $v->goods_price)
                                                <span class="price">
                                                    ￥{{$v->goods_preferential}}
                                                    <input type="hidden" name="new_price" value="{{$v->preferential}}">
                                                </span>
                                                <span class="old-price">
                                                    ￥{{$v->goods_price}}
                                                    <input type="hidden" name="old_price" value="{{$v->price}}">
                                                </span>
                                            @else
                                                <span class="price">
                                                    ￥{{$v->goods_price}}
                                                    <input type="hidden" name="old_price" value="{{$v->price}}">
                                                    <input type="hidden" name="new_price" value="{{$v->price}}">
                                                </span>
                                            @endif
                                        </div>
                                        <div class="rating">
                                            <a class="add-wishlist" href="/goodsdetail/{{$v->goods_id}}" title="加入我的收藏">
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
                                                <input type="text" value="1" name="num">
                                            </p>
                                            <div class="shop-add-cart">
                                                <button class="addCart">加入购物车</button>
                                                <button class="addCart" style="background: #ff6464;" title="点击按钮,到下一步确定购买信息!">立即购买</button>
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
                                        <a href="javascript:void(0)">
                                            <img src="/home/bs/img/detail/qitian.png" alt="" title="满足七天退货的前提下,包邮商品需买家承担退货运费!">
                                            <span>七天退货</span>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <img src="/home/bs/img/detail/dingdanxian.png" alt="" title="订单险">
                                            <span>订单险</span>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <img src="/home/bs/img/detail/wuyoutuihuo.png" alt="" title="无忧退货">
                                            <span>无忧退货</span>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <img src="/home/bs/img/detail/yunfeixian.png" alt="" title="运费险">
                                            <span>运费险</span>
                                        </a>
                                    </div>
                                    <div class="widget-icon">
                                    </div>
                                    <div class="add-cart" style="margin-right: 20px;">
                                        <span >支付:</span>
                                        <a href="javascript:void(0)">
                                            <img src="/home/bs/img/detail/zhifubao.png" alt="" title="支付宝">
                                            <span>支付宝</span>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <img src="/home/bs/img/detail/weixin.png" alt="" title="微信">
                                            <span>微信</span>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <img src="/home/bs/img/detail/xinyongka.png" alt="" title="信用卡">
                                            <span>信用卡</span>
                                        </a>
                                        <a href="javascript:void(0)">
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
