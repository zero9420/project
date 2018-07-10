@extends('layout.admins')
@section('title',$title)

@section('content')

    <div class="container">
                <!-- Panels Start -->
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <input type="hidden" id="goods_id" value="{{$detail->goods_id}}">
                        <span><i class="icon-pictures"></i>  商品详情  </span>
                    </div>
                    <div class="mws-panel-body">
                        <!-- Statistics Button Container -->
                        <div class="mws-stat-container clearfix">
                            <!-- Statistic Item -->
                            <span class="mws-stat">
                                <!-- Statistic Icon (edit to change icon) -->
                                <span class="mws-stat-icon icol32-clock-add"></span>
                                <!-- Statistic Content -->
                                <span class="mws-stat-content">
                                    <span class="mws-stat-title">添加时间</span>
                                    <span class="mws-stat-value">{{$detail->created_at}}</span>
                                </span>
                            </span>
                            <span class="mws-stat">
                                <!-- Statistic Icon (edit to change icon) -->
                                <span class="mws-stat-icon icol32-clock-edit"></span>
                                <!-- Statistic Content -->
                                <span class="mws-stat-content">
                                    <span class="mws-stat-title">修改时间</span>
                                    <span class="mws-stat-value">{{$detail->updated_at}}</span>
                                </span>
                            </span>
                        </div>
                        <!-- Statistics Button Container -->
                        <div class="mws-stat-container clearfix thumbnails mws-gallery">
                            <!-- Statistic Item -->
                            <span class="mws-stat">
                                <!-- Statistic Icon (edit to change icon) -->
                                <span class="mws-stat-icon icol32-dice"></span>
                                <!-- Statistic Content -->
                                <span class="mws-stat-content">
                                    <span class="mws-stat-title">商品规格</span>
                                    <span class="mws-stat-value" id="goods_size">{{strtoupper($detail->goods_size)}}</span>
                                    <span class="mws-gallery-overlay">
                                    <a href="javascript:void(0)" id="size" class="mws-gallery-btn"><i class="icol-pencil"></i></a>
                                    </span>
                                </span>
                            </span>
                            <span class="mws-stat">
                                <!-- Statistic Icon (edit to change icon) -->
                                <span class="mws-stat-icon icol32-color-wheel"></span>
                                <!-- Statistic Content -->
                                <span class="mws-stat-content">
                                    <span class="mws-stat-title">商品颜色</span>
                                    <span class="mws-stat-value" id="goods_color">{{$detail->goods_color}}</span>
                                    <span class="mws-gallery-overlay">
                                        <a href="javascript:void(0)" id="color" class="mws-gallery-btn"><i class="icol-pencil"></i></a>
                                    </span>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Panels End -->

                <!-- Panels Start -->
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-file-word"></i>  商品简介   </span>
                    </div>
                    <div class="mws-panel-body">
                        <textarea class="medium" name="goods_name" id="goodsinfo" rows="3" cols="120" maxlength="120" disabled>{{$detail->goods_info}}</textarea>
                        <p><span id="info-count">120</span>/120</p>
                    </div>
                </div>
                <!-- Panels End -->

                <!-- Panels Start -->
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-pictures"></i>  商品详情   </span>
                    </div>
                    <div class="mws-panel-body">
                        <ul class="thumbnails mws-gallery">
                            @foreach($detail->spec as $k=>$v)
                                <li>
                                    <span class="thumbnail"><img src="{{$v->goods_pic}}" alt=""></span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Panels End -->
                <!-- Panels Start -->
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-file-css"></i>  商品详情   </span>
                    </div>
                    <div class="mws-panel-body">
                        <ul style="list-style: none;">
                            <li>
                                <span class="" id="content">{!!$detail->goods_desc!!}</span>
                            </li>
                        </ul>
                    </div>
				</div>
                <!-- Panels End -->

@endsection
@section('js')
    <script>
        $('#info-count').text($('#goodsinfo').val().length);
    </script>
@endsection