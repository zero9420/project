@extends('layout.admins')

@section('title','后台的首页')

@section('content')

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
                    <span class="text-nowrap"><a href="http://shop203.vip">http://shop203.vip</a></span>
                </span>
            </li>
            <li>
                <span class="key"><i class="icon-android"></i>开发人员</span>
                <span class="val">
                    <span class="text-nowrap"><a href="http://yunsc.vip">常志</a>|<a href="http://www.laravel.com">张学强</a>| <a href="http://www.shop203.com">孟世奇</a>|<a href="http://203o2o.com">段宾古</a></span>
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
@endsection