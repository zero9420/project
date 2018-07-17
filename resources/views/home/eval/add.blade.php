@extends('layout.homes')

@section('title',$title)
<link rel="stylesheet" href="/home/bs/pingjia/css/css.css">
<script src="/home/bs/pingjia/js/jquery.js"></script>
@section('content')
<div class="fade in" role="dialog">
    <div class="dialog">
        <div class="content">
            <div class="body">
                <div class="product-details">
                    <div class="container">
                        <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-2 col-md-offset-2">
                                        <h4>商品信息:</h4>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-2 col-md-offset-2">
                                        <a href="/goodsdetail/2">
                                            <img src="{{$goods->goods_pic}}" alt="..." class="img-thumbnail">
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <p><span class="label label-success">商品名称</span>&nbsp;:&nbsp;{{$goods->goods_name}}</p>
                                        <p><span class="label label-danger">商品价格</span>&nbsp;:&nbsp;￥{{$goods->goods_price}}</p>
                                        <p><span class="label label-info">商品颜色</span>&nbsp;:&nbsp;{{$goods->goods_color}}</p>
                                        <p><span class="label label-primary">商品尺码</span>&nbsp;:&nbsp;{{$goods->goods_size}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-default btn-lg" href="/goodsdetail/3">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> 再次购买
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-8 col-md-offset-2">
                                        <hr>
                                    </div>
                                </div>
                            <form action="/home/eval" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="gid" value="{{$goods->goods_id}}">
                                <input type="hidden" name="oid" value="{{$goods->id}}">
                                <div class="col-md-12">
                                    <div class="col-md-6 col-md-offset-3">
                                        @if (count($errors) > 0)
                                            <div id="form-error" class="alert alert-danger" role="alert">
                                                @foreach ($errors->all() as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        @endif
                                        @if(session('success'))
                                            <div id="form-error" class="alert alert-danger" role="alert">
                                                {{session('success')}}
                                            </div>
                                        @endif

                                        @if(session('error'))
                                            <div id="form-error" class="alert alert-danger" role="alert">
                                                {{session('error')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            	<div class="col-md-12 col-sm-12 col-xs-12">
    	                        	<div class="col-md-8 col-md-offset-2">
    		                        	<div id="starRating">
    		                        		<h4>点击星星进行评分:</h4>
    									    <p class="photo">
    									        <span><i class="high"></i><i class="nohigh"></i></span>
    									        <span><i class="high"></i><i class="nohigh"></i></span>
    									        <span><i class="high"></i><i class="nohigh"></i></span>
    									        <span><i class="high"></i><i class="nohigh"></i></span>
    									        <span><i class="high"></i><i class="nohigh"></i></span>
    									    </p>
    									    <p class="starNum">0.0分</p>
    									    <input type="hidden" name="goods_grade" id="grade" value=" ">
    			                        	<hr>
    									</div>
    	                        	</div>
    	                        </div>
                            	<div class="col-md-12 col-sm-12 col-xs-12">
    	                        	<div class="col-md-5 col-md-offset-2">
    	                        		<h4>请输入文本评价:</h4>
    	                        		<textarea class="form-control" id="comments" name="comments" maxlength="200" style="resize:none;" rows="5" value="{{old('comments')}}">请输入120以内的商品评论</textarea>
    	                        		<p><span id="count">120</span>/120</p>
    	                        	</div>
                            	</div>
                            	<div class="col-md-12 col-sm-12 col-xs-12">
    	                        	<div class="col-md-8 col-md-offset-2">
    	                        		<hr>
    	                        	</div>
                            	</div>
                            	<div class="col-md-12 col-sm-12 col-xs-12">
    	                        	<div class="col-md-5 col-md-offset-2">
    	                        		<h4>请上传图片评价:</h4>
    	                        		<input type="file" name='eval_pic[]' multiple="multiple">
    	                        	</div>
                                    <div class="col-md-1 col-md-offset-1">
                                        <button class="btn btn-success sureStar">提交</button>
                                    </div>
                            	</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/home/bs/pingjia/js/comments.js"></script>
@endsection