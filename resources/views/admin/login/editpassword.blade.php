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

    	<form action="/admin/editpasswords" method='post' class="mws-form" enctype='multipart/form-data'>
    <div class="mws-form-inline">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="mws-form-row">
                    <label class="mws-form-label">用户名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='auth_name' value="{{$res->auth_name}}" readonly="">
                    </div>
                

                </div>
                    <div class="mws-form-row">
                    <label class="mws-form-label">原密码</label>
                    <div class="mws-form-item">
                        <input type="passwords" class="small" name='passwords'>
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

                

    		</div>
    		<div class="mws-button-row">

    			<input type="submit" class="btn btn-success" value="修改">
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