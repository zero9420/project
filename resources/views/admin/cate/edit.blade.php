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
        <form class="mws-form" action="/admin/cate/{{$info->cate_id}}" method="post">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        分类
                    </label>
                    <div class="mws-form-item">
                        <select class="medium" name="cate_pid" disabled>
                            <option value="0">顶级分类</option>
                                <!-- 判断pid == 接受id 显示父类 -->
                            @foreach($res as $k=>$v)
                                <option value="{{$v->cate_id}}" @if($info->cate_pid == $v->cate_id) selected @endif>{{$v->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        类名
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="medium" name="cate_name" value="{{$info->cate_name}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <div class="mws-form-item clearfix">
                    </div>
                </div>
            </div>
            <div class="mws-button-row" style="text-align:center;">
            	{{method_field('PUT')}}

		        {{csrf_field()}}
                <input type="submit" value="提交" class="btn btn-success" style="width:100px">
                <a href="/admin/cate" class="btn btn-primary" style="width:100px">返回浏览类别</a>
            </div>
        </form>
    </div>
</div>

@endsection