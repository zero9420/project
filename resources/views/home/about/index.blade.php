@extends('layout.homes')
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="百度地图,百度地图API，百度地图自定义工具，百度地图所见即所得工具" />
<meta name="description" content="百度地图API自定义地图，帮助用户在可视化操作下生成百度地图" />
<!--引用百度地图API-->
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
@section('title','关于我们')

@section('content')
<!-- heading-banner-start -->
<div class="heading-banner about-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="breadcrumb">
                    <a title="Return to Home" href="/">
                        <i class="icon-home"></i>
                    </a>
                    <span class="navigation-pipe">&gt;</span>
                    <span class="navigation-page">
                        关于我们
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- heading-banner-end -->
@if(count($data) != 0)
<!-- about-us-area-start -->
<div class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h3>公司简介</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12">
                    {!!$data->about!!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about-us-area-end -->

<!-- about-us-address-start -->
<div class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h3>公司地址</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12">
                    {{$data->address}}
                    <!--百度地图容器-->
                    <div class="col-md-12 col-sm-12 col-xs-12" style="height:500px; border:#ccc solid 1px;" id="map_canvas"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about-us-address-end -->

<!-- about-us-culture-start -->
<div class="about-team-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h3>公司文化</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="team-members wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s" style="visibility: visible; animation-duration: 0.5s; animation-delay: 0.5s; animation-name: fadeIn;">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <img src="{{$data->culture}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about-us-culture-end -->

<!-- about-us-event-end -->
<div class="brand-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h3>公司大事件</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="brands wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                <div class="brand-carousel">
                    @foreach($data->abouts as $k=>$v)
                    <div class="col-md-12">
                        {{$v->event}}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about-us-event-end -->
@else
<div class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="slider">
                        <!-- Slider Image -->
                        <div id="mainslider" class="nivoSlider slider-image">
                           <img src="/home/bs/pingjia/img/wish.jpg" alt="main slider" title="#htmlcaption1" />
                        </div>
                            <!-- Slider Caption 1 -->
                        <div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
                            <div class="slider-progress"></div>
                            <div class="slide1-text slide-1 hidden-xs">
                                <div class="middle-text">
                                    <div class="cap-dec wow bounceInLeft" data-wow-duration="0.9s" data-wow-delay="0s">
                                        <h2>关于我们正在整理中,敬请期待........</h2>
                                    </div>
                                    <div class="cap-readmore wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                                        <a href="/">去购物....</a>
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
@endif

@endsection
@section('js')
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
    }
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("map_canvas");//在百度地图容器中创建一个地图
        var point = new BMap.Point(116.395645,39.929986);//定义一个中心点坐标
        map.centerAndZoom(point,12);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
    var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
    map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
    var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
    map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
    var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
    map.addControl(ctrl_sca);
    }
    initMap();//创建和初始化地图
</script>
@endsection