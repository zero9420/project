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
        <form class="mws-form" action="/admin/about/{{$data->id}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}
        	{{method_field('PUT')}}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        关于标记
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="medium" name="sign" maxlength="10" value="{{$data->sign}}" placeholder="请输入10字以内的标记">
                    </div>
                </div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">
    				企业文化
                    <span class="required">
                        *
                    </span>
    				</label>
    				<div class="mws-form-item">
    					<img src="{{$data->culture}}" alt="" style="width: 200px;">
    					<input name="culture"  type="file" class="large" data-show-caption="true" placeholder="....."  accept="image/*">
    				</div>
    			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        企业地址
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                    	<textarea class="medium" name="address" id="goodsinfo" maxlength="120">{{$data->address}}</textarea>
                        <p><span id="info-count">120</span>/120</p>
                    </div>
                </div>
                <script>
                    //实例化编辑器
                    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                    var ue = UE.getEditor('editor');
                </script>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        企业简介
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <script id="editor" name='about' type="text/plain" style="width:800px;height:300px;">{!!$data->about!!}</script>
                    </div>
                </div>

            </div>
            <div class="mws-button-row" style="text-align:center;">
                <input type="submit" value="提交" class="btn btn-success" style="width:100px">
                <a href="/admin/about" class="btn btn-primary" style="width:100px">返回查看关于</a>
            </div>
        </form>
    </div>
</div>

@endsection