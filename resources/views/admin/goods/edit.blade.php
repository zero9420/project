@extends('layout.admins')

@section('title',$title)
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

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
        <form class="mws-form" action="/admin/goods/{{$goods->goods_id}}" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        商品名称
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="medium" name="goods_name" placeholder="请输入最长100字符的商品名" value="{{$goods->goods_name}}">
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
                        <select class="medium" name="cate_id">
                            @foreach($cate as $k=>$v)
								<option value="{{$v->cate_id}}" @if($v->cate_id == $goods->cate_id) selected @endif >{{$v->cate_name}}</option>
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
                        <input type="text" class="medium" name="goods_price" value="{{$goods->goods_price}}" class="error large">
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
                                <input type="radio" name="goods_hot" value="1" @if($goods->goods_hot == 1) checked @endif>
                                <label>普通</label>
                            </li>
                            <li>
                                <input type="radio" name="goods_hot" value="2" @if($goods->goods_hot == 2) checked @endif>
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
                        @foreach($spec as $k => $v) 
                            <img src="{{$v->goods_pic}}" alt="" width='200'>
                        @endforeach
                        <input type="file" name='goods_pic[]' class="fileinput-preview" style="width: 100%; padding-right: 84px;" multiple="multiple"  readonly="readonly" placeholder="No file selected...">
                    </div>
                </div>
                <script>
                    //实例化编辑器
                    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                    var ue = UE.getEditor('editor');

                </script>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        商品描述
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <script id="editor" name='goods_desc' type="text/plain" style="width:800px;height:300px;">{!!$goods->goods_desc!!}</script>
                    </div>
                </div>
            </div>
            <div class="mws-button-row" style="text-align:center;">
                {{method_field('PUT')}}
            	{{csrf_field()}}
                <input type="submit" value="提交" class="btn btn-success" style="width:100px">
                <a href="/admin/goods" class="btn btn-primary" style="width:100px">返回浏览类别</a>
            </div>
        </form>
    </div>
</div>

@endsection