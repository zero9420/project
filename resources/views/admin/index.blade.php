@extends('layout.admins')

@section('title','后台的首页')

@section('content')
<div class="container">
    <div class="mws-panel grid_6">
        <div class="mws-panel-header">
            <span><i class="icon-book"></i> 销售信息</span>
        </div>
        <div class="mws-panel-body no-padding">
            <ul class="mws-summary">
                <li>
                    <span class="key"><i class="icon-shopping-cart"></i> 销售冠军</span>
                    <span class="val">
                        <span class="text-nowrap"><i class="icol-crown"></i> <a href="/admin/goods?gname={{$arr['gname']}}">{{$arr['gname']}} </a> <i class="icol-arrow-right"></i> 共售出 : {{$arr['gsales']}} pcs</span>
                    </span>
                </li>
                <li>
                    <span class="key"><i class="icon-support"></i> 最受欢迎的颜色</span>
                    <span class="val">
                        <span class="text-nowrap"><i class="icol-control-wheel"></i> {{$arr['gcolor']}} </span>
                    </span>
                </li>
                <li>
                    <span class="key"><i class="icon-scissor"></i> 购买最多的尺码</span>
                    <span class="val">
                        <span class="text-nowrap"><i class="icol-ruler-triangle"></i> {{strtoupper($arr['gsize'])}}</span>
                    </span>
                </li>
                <li>
                    <span class="key"><i class="icon-heart"></i> 好评最多的</span>
                    <span class="val">
                        <span class="text-nowrap"><i class="icol-star-2"></i> <a href="/admin/goods?gname={{$arr['gname']}}"> {{$arr['pname']}} </a> <i class="icol-arrow-right"></i> 好评数 : {{$arr['pnum']}}</span>
                    </span>
                </li>
            </ul>
        </div>
    </div>
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-pictures"></i> 库存不足最新消息</span>
        </div>
        <div class="mws-panel-body">
            <ul class="thumbnails mws-gallery">
            @if(count($prompt) != '0')
                @foreach($prompt as $v)
                <li>
                    <span class="thumbnail" title="商品ID:{{$v->goods_id}}; 商品名:{{$v->goods_name}} 库存不足;"><img src="{{$v->spec[0]->goods_pic}}" alt=""></span>
                    <span class="mws-gallery-overlay">
                        <a href="/admin/goods?gname={{$v->goods_name}}" class="mws-gallery-btn" title="点击去补货"><i class="icon-search"></i></a>
                    </span>
                </li>
                @endforeach
            @else
                <li>
                    <span class="thumbnail" title="库存充足!"><img src="/admins/example/cyan_hawk.jpg" alt=""></span>
                </li>
                <li>
                    <span class="thumbnail" title="库存充足!"><img src="/admins/example/cyan_kangaroo.jpg" alt=""></span>
                </li>
                <li>
                    <span class="thumbnail" title="库存充足!"><img src="/admins/example/cyan_kookaburra.jpg" alt=""></span>
                </li>
                <li>
                    <span class="thumbnail" title="库存充足!"><img src="/admins/example/scottwills_penguin.jpg" alt=""></span>
                </li>
                <li>
                    <span class="thumbnail" title="库存充足!"><img src="/admins/example/scottwills_underwater2.jpg" alt=""></span>
                </li>
            @endif
            </ul>
        </div>
    </div>
</div>
@endsection