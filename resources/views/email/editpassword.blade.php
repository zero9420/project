@extends('layout.homes')
@section('content')
    <content>
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="style-msg2 successmsg">
                    <div class="msgtitle" style='font-size:20px'><h2>账号修改密码提醒:</h2></div>
                    <div class="sb-msg">
                        <ul>
                            <li style='font-size:17px;list-style:none'>您的账号为:{{$res->username}}        平台默认密码：123456,请登入个人中心及时修改您的密码</li>
                            <h3><a href="/home/logins">点击：立即登入</a></h3>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </content>
@endsection