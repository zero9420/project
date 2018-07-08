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


      <form action="/admin/order/{{$res->order_id}}" method='post' class="mws-form" enctype='multipart/form-data'>
        <div class="mws-form-inline">
          <div class="mws-form-row">
            <label class="mws-form-label">订单号</label>
            <div class="mws-form-item">
              <input type="text" class="small" name='order_id' value="{{$res->order_id}}" disabled>
            </div>
          </div>

          <div class="mws-form-row">
            <label class="mws-form-label">购买数量</label>
            <div class="mws-form-item">
              <input type="text" class="small" name='order_cat'  value="{{$res->order_cat}}" disabled>
            </div>
          </div>

          <div class="mws-form-row">
            <label class="mws-form-label">付款金额</label>
            <div class="mws-form-item">
              <input type="text" class="small" name='order_payment'  value="{{$res->order_payment}}" disabled>
            </div>
          </div>

          <div class="mws-form-row">
            <label class="mws-form-label">用户昵称</label>
            <div class="mws-form-item">
              <input type="text" class="small" name='order_name'  value="{{$res->order_name}}" >
            </div>
          </div>

          <div class="mws-form-row">
            <label class="mws-form-label">用户手机</label>
            <div class="mws-form-item">
              <input type="text" class="small" name='order_phone'  value="{{$res->order_phone}}">
            </div>
          </div>
            <div class="mws-form-row">
            <label class="mws-form-label">用户地址</label>
            <div class="mws-form-item">
              <input type="text" class="small" name='order_addr'  value="{{$res->order_addr}}">
            </div>
          </div>
           <div class="mws-form-row">
            <label class="mws-form-label">买家留言</label>
            <div class="mws-form-item">
              <input type="text" class="small" name='order_umsg'  value="{{$res->order_umsg}}" >
            </div>
          </div>
          
       

       

           <div class="mws-form-row">
            <label class="mws-form-label">创建时间</label>
            <div class="mws-form-item">
              <input type="text" class="small" name='order_create_time'  value="{{$res->order_create_time}}" disabled>
            </div>
          </div>

           <div class="mws-form-row">
            <label class="mws-form-label">修改时间</label>
            <div class="mws-form-item">
              <input type="text" class="small" name='order_update_time'  value="{{date('Y-m-d H:i:s',time())}}" disabled>
            </div>
          </div>

        

             <div class="mws-form-row">
            <label class="mws-form-label">状态</label>
            <div class="mws-form-item clearfix">
              <ul class="mws-form-list inline">
                <li><input type="radio" name='order_status' value='0' @if($res->order_status == 0) checked @endif> <label>未发货</label></li>
                <li><input type="radio" name='order_status' value='1'  @if($res->order_status == 1) checked @endif> <label>发货</label></li>
                <li><input type="radio" name='order_status' value='2'  @if($res->order_status == 2) checked @endif> <label>交易完成</label></li>
               
              </ul>
            </div>
          </div>



        </div>
        <div class="mws-form-row">

                                {{csrf_field()}}

                                {{method_field('PUT')}}
                             <input type="submit" class="btn btn-success" value="修改">

                             
         </div>
   
      </form>
    </div>      
</div>


@endsection

@section('js')
<script type="text/javascript">
  
  /*setTimeout(function(){

    $('.mws-form-message').remove();

  },3000)*/

  $('.mws-form-message').fadeOut(5000);

</script>
@endsection