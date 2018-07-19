@extends('layout.admins')

@section('title','后台的首页')

@section('content')
<div class="container">
    @if(count($sales) != '0')
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span><i class="icon-pictures"></i> 销量前五</span>
            </div>
            <div class="mws-panel-body">
                <ul class="thumbnails mws-gallery">
                    @foreach($sales as $v)
                    <li>
                        <span class="thumbnail" title="商品ID:{{$v->goods_id}}; 商品名:{{$v->goods_name}};"><img src="{{$v->spec[0]->goods_pic}}" alt=""></span>
                        <span class="mws-gallery-overlay">
                            <a href="/admin/goods?gname={{$v->goods_name}}" class="mws-gallery-btn" title="点击查看详情"><i class="icon-search"></i></a>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if(count($prompt) != '0')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-pictures"></i> 库存不足最新消息</span>
        </div>
        <div class="mws-panel-body">
            <ul class="thumbnails mws-gallery">
                @foreach($prompt as $v)
                <li>
                    <span class="thumbnail" title="商品ID:{{$v->goods_id}}; 商品名:{{$v->goods_name}} 库存不足;"><img src="{{$v->spec[0]->goods_pic}}" alt=""></span>
                    <span class="mws-gallery-overlay">
                        <a href="/admin/goods?gname={{$v->goods_name}}" class="mws-gallery-btn" title="点击去补货"><i class="icon-search"></i></a>
                    </span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-book"></i> 系统基本信息 </span>
        </div>
        <div class="mws-panel-body no-padding">
            <ul class="mws-summary clearfix">
                <li>
                    <span class="key"><i class="icon-windows"></i> 操作系统 </span>
                    <span class="val">
                        <span class="text-nowrap">Microsoft Windows NT</span>
                    </span>
                </li>
                <li>
                    <span class="key"><i class="icon-globe"></i> PHP运行方式</span>
                    <span class="val">
                        <span class="text-nowrap">Apache 2.0 Handler PHP Version 7.0.6 </span>
                    </span>
                </li>
                <li>
                    <span class="key"><i class="icon-install"></i>项目</span>
                    <span class="val">
                        <span class="text-nowrap">云商城</span>
                    </span>
                </li>
                <li>
                    <span class="key"><i class="icon-wordpress-2"></i>项目网址</span>
                    <span class="val">
                        <span class="text-nowrap"><a href="/">http://yunsc.vip</a></span>
                    </span>
                </li>
                <li>
                    <span class="key"><i class="icon-android"></i>开发人员</span>
                    <span class="val">
                        <span class="text-nowrap">常志|张学强|孟世奇|段宾古</span>
                    </span>
                </li>
                <li>
                    <span class="key"><i class="icon-attachment"></i>上传附件限制</span>
                    <span class="val">
                        <span class="text-nowrap">2M</span>
                    </span>
                </li>
                <li>
                    <span class="key"><i class="icon-history"></i>北京时间</span>
                    <span class="val">
                        <span class="text-nowrap" id="nowsTime"><script src="/admins/js/times/nowtime.js"></script></span>
                    </span>
                </li>
                <li>
                    <span class="key"><i class="icon-wordpress"></i>服务器域名/IP</span>
                    <span class="val">
                        <span class="text-nowrap" id="nowsTime">localhost [ 127.0.0.1 ]</span>
                    </span>
                </li>
                <li>
                    <span class="key"><i class="icon-yinyang"></i>Host</span>
                    <span class="val">
                        <span class="text-nowrap" id="nowsTime">127.0.0.1</span>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection