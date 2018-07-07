@extends('layout.admins')

@section('title',$title)
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
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
@foreach($data as $k => $v)
    	<form action="/admin/users/{{$v->id}}" method='post' class="mws-form" enctype='multipart/form-data'>
        {{ method_field('PUT') }}
            <input type="hidden" name="tupian" value="{{$v->profile}}">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='username' value="{{$v->username}}">
    				</div>
    			</div>


    			<div class="mws-form-row">
    				<label class="mws-form-label">邮箱</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='email' value="{{$v->email}}">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">手机号</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='phone' value="{{$v->phone}}">
    				</div>
    			</div>


                <div class="mws-form-row">
                    <label class="mws-form-label">新密码</label>
                    <div class="mws-form-item">
                        <input type="password" class="small" name='password'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">确认新密码</label>
                    <div class="mws-form-item">
                        <input type="password" class="small" name='repass'>
                    </div>
                </div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">状态</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><input type="radio" name='status' value='1'@if($v->status==1) checked='checked'@endif > 
                            <label>正常</label></li>
    						<li><input type="radio" name='status' value='0'
                            @if($v->status==0) checked='checked'@endif 
                            > <label>封号</label></li>
    					</ul>
    				</div>
    			</div>
    		</div>
            @endforeach
    		<div class="mws-button-row">

    			{{csrf_field()}}
    			<input type="submit" class="btn btn-success" value="提交">
    		</div>
    	</form>
    </div>    	
</div>
@endsection

@section('content')

@endsection
@section('js')
<script type="text/javascript">
	
	setTimeout(function(){

		$('.mws-form-message').remove();

	},10000)

	// $('.mws-form-message').fadeOut(5000);

</script>
@endsection