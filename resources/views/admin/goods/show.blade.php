@extends('layout.admins')

@section('title',$title)

@section('content')

    <div class="container">
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
                <!-- Panels Start -->
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-pictures"></i>  商品详情  </span>
                    </div>
                    <div class="mws-panel-body">
                		<ul class="thumbnails mws-gallery">
                			<li>
                				<span class="mws-stat-icon icol32-color-wheel"></span>
                            	<h4>商品颜色</h4>
                            	<span>{{$detail->spec->goods_color}}</span>
                                <span class="mws-gallery-overlay">
                                    <a href="#" class="mws-gallery-btn"><i class="icon-pencil"></i></a>
                                </span>
                			</li>
                			<li>
                				<span class="mws-stat-icon icol32-dice"></span>
                            	<h4>商品型号</h4>
                            	<span>{{$detail->spec->goods_size}}</span>
                                <span class="mws-gallery-overlay">
                                    <a href="#" class="mws-gallery-btn"><i class="icon-pencil"></i></a>
                                </span>
                			</li>
                			<li>
                				<span class="mws-stat-icon icol32-comment"></span>
                            	<h4>商品描述</h4>
                            	<span>{{$detail->goods_desc}}</span>
                                <span class="mws-gallery-overlay">
                                    <a href="#" class="mws-gallery-btn"><i class="icon-pencil"></i></a>
                                </span>
                			</li><br>
                			<li>
                            	<span class="thumbnail"><img src="{{$detail->spec->goods_pic1}}" alt=""></span>
                                <span class="mws-gallery-overlay">
                                    <a href="#" class="mws-gallery-btn"><i class="icon-pencil"></i></a>
                                </span>
                			</li>
                			<li>
                            	<span class="thumbnail"><img src="{{$detail->spec->goods_pic2}}" alt=""></span>
                                <span class="mws-gallery-overlay">
                                    <a href="#" class="mws-gallery-btn"><i class="icon-pencil"></i></a>
                                </span>
                			</li>
                			<li>
                            	<span class="thumbnail"><img src="{{$detail->spec->goods_pic3}}" alt=""></span>
                                <span class="mws-gallery-overlay">
                                    <a href="#" class="mws-gallery-btn"><i class="icon-pencil"></i></a>
                                </span>
                			</li>
                			<li>
                            	<span class="thumbnail"><img src="{{$detail->spec->goods_pic4}}" alt=""></span>
                                <span class="mws-gallery-overlay">
                                    <a href="#" class="mws-gallery-btn"><i class="icon-pencil"></i></a>
                                </span>
                			</li>
                			<li>
                            	<span class="thumbnail"><img src="{{$detail->spec->goods_pic5}}" alt=""></span>
                                <span class="mws-gallery-overlay">
                                    <a href="#" class="mws-gallery-btn"><i class="icon-pencil"></i></a>
                                </span>
                			</li>
                		</ul>
                    </div>
				</div>
                <!-- Panels End -->
            </div>

@endsection