@extends('layout.admins')

@section('title','后台的首页')

@section('content')

    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            Link Form
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
        <form action="/admin/link/{{$res->link_id}}"  method='post' class="mws-form">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        链接名称
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="link_name" value="{{$res->link_name}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        网址
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="medium" name="link_url" value="{{$res->link_url}}" style="width:55%">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                           
                            <li><input type="radio" name='link_status' value='1' @if($res->link_status == 1) return checked @endif> <label>启动</label></li>
                            <li><input type="radio" name='link_status' value='0' @if($res->link_status == 0) return checked @endif> <label>禁止</label></li>
                        </ul>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
              
            {{ method_field('PUT') }}
            <div class="mws-button-row">
                <input type="submit" class="btn btn-danger" value="提交">
                <!-- <input type="reset" class="btn " value="排序"> -->
            </div>
        </form>
    </div>
</div>

@endsection





