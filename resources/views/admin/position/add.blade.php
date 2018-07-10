@extends('layout.admins')

@section('title',$title)


@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            广告添加页
        </span>
    </div>
    <div class="mws-panel-body no-padding">

        @if (count($errors) > 0)
            <div class="mws-form-message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/admin/position"  method='post' enctype='multipart/form-data' class="mws-form">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        广告名称
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="position_name">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                       广告价格
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="medium" name="position_price" style="width:55%">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                       广告链接
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="large" name="position_url" style="width:55%">
                    </div>
                </div>
                <div class="mws-form-row">
    				<label class="mws-form-label">广告图片</label>
    				<div class="mws-form-item">
    					<!-- <input type="file" class="small" name='profile'> -->

    					<input type="file" name='position_image' class="fileinput-preview" style="width: 100%; padding-right: 84px;" readonly="readonly" placeholder="No file selected..." width="200px" height="100px">
    				</div>
    			</div>
				<div class="mws-form-row">
				    <label class="mws-form-label">
				        广告描述
				    </label>
				    <div class="mws-form-item">
				        <textarea class="large" cols="" rows="" name="position_desc">
				        </textarea>
				    </div>
				</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name='position_status' value='1' checked='checked'> <label>启动</label></li>
                            <li><input type="radio" name='position_status' value='0'> <label>禁止</label></li>
                        </ul>
                    </div>
                </div>
               
            </div>
            {{csrf_field()}}
              
            <div class="mws-button-row">
                <input type="submit" class="btn btn-danger" value="提交">
                <!-- <input type="reset" class="btn " value="排序"> -->
            </div>
        </form>
    </div>
</div>

@endsection





