@extends('layout.admins')

@section('title','云商城后台管理')
@section('content')
<script src="/admins/js/libs/jquery-1.8.3.min.js"></script>
<div id="applyFor" style="text-align: center; width: 500px; margin:200px;auto;font-size: 20px;">
    {{$message}},将在
    <span class="loginTime" style="color: red">
        {{$jumpTime}}
    </span>
    秒后
    <a href="{{$url}}" style="color: red">
	    返回
    </a>
</div>
<script type="text/javascript">
    $(function() {
        var url = "{{$url}}"
        var loginTime = parseInt($('.loginTime').text());
        var time = setInterval(function() {
            loginTime = loginTime - 1;
            $('.loginTime').text(loginTime);
            if (loginTime == 0) {
                clearInterval(time);
                window.location.replace(url);
            }
        },1000);
    })
</script>

@endsection