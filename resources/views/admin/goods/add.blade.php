@extends('layout.admins')

@section('title',$title)

@section('content')

    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            {{$title}}
        </span>
    </div>
    <div class="mws-panel-body no-padding">
    	@if (count($errors) > 0)
		    <div class="mws-form-message error">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li style='font-size:16px;list-style:none'>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
        <form class="mws-form" action="/admin/goods" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        商品名称
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="medium" name="goods_name" class="error large">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        商品分类
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <select class="medium" name="cate_pid">
                            <option value="0">顶级分类</option>
                            @foreach($cates as $k=>$v)
	                            <?php
	                            	$n = substr_count($v->cate_path,',')-1;
	                            ?>
								<option value="{{$v->cate_id}}">{{str_repeat('&nbsp;',$n*5)}}|--{{$v->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        商品价格
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="medium" name="goods_price" class="error large">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        商品库存
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="medium" name="goods_stock" class="error large">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        商品颜色
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <select class="large" name="goods_color[]" multiple>
                            <option value="0">红色</option>
                            <option value="1">橙色</option>
                            <option value="2">黄色</option>
                            <option value="3">绿色</option>
                            <option value="4">青色</option>
                            <option value="5">蓝色</option>
                            <option value="6">紫色</option>
                        </select>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        商品大小
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <select class="large" name="goods_size[]" multiple>
                            <option value="0">均码</option>
                            <option value="1">S</option>
                            <option value="2">M</option>
                            <option value="3">L</option>
                            <option value="4">XS</option>
                            <option value="5">XL</option>
                            <option value="6">XXL</option>
                            <option value="6">XXXL</option>
                            <option value="6">XXXXL</option>
                        </select>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        热卖商品
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li>
                                <input type="radio" name="goods_hot" value="1" checked='checked'>
                                <label>普通</label>
                            </li>
                            <li>
                                <input type="radio" name="goods_hot" value="2">
                                <label>热卖</label>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        商品图片
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <input type="file" name='goods_pic' class="fileinput-preview" style="width: 100%; padding-right: 84px;" readonly="readonly" placeholder="No file selected...">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        商品描述
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <textarea name="goods_desc" class="required large">请输入商品描述
                        </textarea>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        商品状态
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name='goods_status' value='0' checked='checked'> <label>新品</label></li>
                            <li><input type="radio" name='goods_status' value='1'> <label>上架</label></li>
                            <li><input type="radio" name='goods_status' value='2'> <label>下架</label></li>
                            <li><input type="radio" name='goods_status' value='3'> <label>特殊</label></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mws-button-row" style="text-align:center;">
            	{{csrf_field()}}
                <input type="submit" value="提交" class="btn btn-success" style="width:100px">
                <a href="/admin/goods" class="btn btn-primary" style="width:100px">返回浏览类别</a>
            </div>
        </form>
    </div>
</div>

@endsection