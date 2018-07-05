@extends('layout.admins')

@section('title',$title)

@section('content')

    <div class="container">
                <!-- Panels Start -->
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
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
                                    <span class="mws-stat-value" id="goods_size">{{$detail->goods_size}}</span>
                                    <span class="mws-gallery-overlay">
                                    <a href="#" class="mws-gallery-btn"><i class="icol-pencil"></i></a>
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
                                        <a href="#" class="mws-gallery-btn"><i class="icol-pencil"></i></a>
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
                    	<span><i class="icon-pictures"></i>  商品图片&nbsp;&nbsp;&nbsp; <a href="#" class="mws-gallery-btn"><i class="icon-tools"></i></a>  </span>
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
                        <span><i class="icon-file-word"></i>  商品详情&nbsp;&nbsp;&nbsp; <a href="#" class="mws-gallery-btn"><i class="icon-tools"></i></a> </span>
                        <span></span>
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
            </div>

@endsection