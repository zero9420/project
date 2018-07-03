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
                        <input type="text" class="medium" name="goods_name" placeholder="请输入最长120字符的商品名">
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
                        <select class="medium" name="goods_cate">
                            @foreach($cates as $k=>$v)
	                            <?php
	                            	$n = substr_count($v->cate_path,',')-1;
	                            ?>
								<option value="{{$v->cate_name}}">{{str_repeat('&nbsp;',$n*5)}}|--{{$v->cate_name}}</option>
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
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li>
                                <input type="checkbox" name="goods_color[]" value="红色">
                                <label>
                                    红色
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" name="goods_color[]" value="蓝色">
                                <label>
                                    蓝色
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" name="goods_color[]" value="黄色">
                                <label>
                                    黄色
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" name="goods_color[]" value="白色" checked="checked">
                                <label>
                                    白色
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" name="goods_color[]" value="黑色">
                                <label>
                                    黑色
                                </label>
                            </li>
                            <input type="text" name="goods_color[]" placeholder="其他颜色请输入,用'|'隔开!">
                        </ul>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        商品大小
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li>
                                <input type="checkbox" name="goods_size[]" value="均码" checked="checked">
                                <label>
                                    均码
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" name="goods_size[]" value="S">
                                <label>
                                    S
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" name="goods_size[]" value="M">
                                <label>
                                    M
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" name="goods_size[]" value="L">
                                <label>
                                    L
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" name="goods_size[]" value="XS">
                                <label>
                                    XS
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" name="goods_size[]" value="XL">
                                <label>
                                    XL
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" name="goods_size[]" value="XXL">
                                <label>
                                    XXL
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" name="goods_size[]" value="XXXL">
                                <label>
                                    XXXL
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" name="goods_size[]" value="XXXXL">
                                <label>
                                    XXXXL
                                </label>
                            </li>
                        </ul>
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
                        <textarea name="goods_desc" class="required large">请输入最多255个字符的商品描述
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