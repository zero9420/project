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

            <form action="/admin/eavl/{{$Evaluas->eid}}" method='post' class="mws-form" enctype='multipart/form-data'>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">用户名</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" value="{{$Users->username}}" readonly="readonly" style="width:200px" name='auth_name'>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">回帖内容</label>
                        <div class="mws-form-item" style="width:300px">
                           <textarea rows="3" style="width:500px" cols="20" name="huitie">

                        </textarea>
                        </div>
                    </div>

                </div>
                <div class="mws-button-row">
                    {{method_field('PUT')}}
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