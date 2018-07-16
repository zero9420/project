@extends('layout.homes')

@section('content')
<style>	
		#goods{
   		 width: 250px;
   		 padding-left: 20px;
   		 display: block;
   		}
   	#addr{
    float: left;
    width: 500px;
    height: 100px;
    position: relative;
    cursor: pointer;
    padding: 15px 18px;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(223, 223, 223);
    border-image: initial;
    margin: 0px 0px 10px 10px;
    background: rgb(250, 250, 250);
	}
	#dd{
		width: 1200px;
	}
	#name{
		width: 300px;
	}
   		
		
</style>
<div class="center" style="background:#fff">

	<link rel="shortcut icon" type="image/x-icon" href="/homes/img/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/homes/css/base.css">
	<link rel="stylesheet" type="text/css" href="/homes/css/home.css">
	<link rel="stylesheet" type="text/css" href="/homes/css/car/base.css">
	<link rel="stylesheet" type="text/css" href="/homes/css/car/home.css">
	<script type="text/javascript" src="/homes/js/jquery.js"></script>
	<!--收货地址body部分开始-->
	<div class="border_top_cart">
		
		<img src="/images/session.jpg"  class="img-thumbnail" width="1200" height="400">
		<div class="container">
			<div class="checkout-box">

				<form action="/home/jsy" method="post" enctype="multipart/form-data">
					<div class="checkout-box-bd">
						<!-- 地址状态 0：默认选择；1：新增地址；2：修改地址 -->
						<input type="hidden" name="Checkout[addressState]" id="addrState"   value="0">
						<!-- 收货地址 -->
						<div class="xm-box">
							<div class="box-hd ">
								<h2 class="title">订单收货地址</h2>
								
							</div>
							<div class="box-bd">
								<div class="clearfix xm-address-list" id="checkoutAddrList">
									<dl class="item" id="addr" >
										<dt>
											<strong class="itemConsignee">{{$ord -> order_name}} </strong>
											<span class="itemTag tag">家</span>
										</dt>
										<dd>
											<p class="tel itemTel" > {{$ord -> order_phone}} </p>
											<p class="itemRegion"> {{$ord -> order_addr}}</p>
											
										</dd>
										
									</dl>
									
								</div>
			
							</div>                
						</div>
						<!-- 收货地址 END-->
					
					
						
					</div>
					<div class="checkout-box-ft">
					<div class="bs-example" data-example-id="simple-table">
						    <table class="table">
						      <caption>Optional table caption.</caption>
						      <thead>
						        <tr>
						          <th>订单号</th>
						          <th>商品图片</th>
						          <th>商品名称</th>
						          <th>商品留言</th>
						          <th>商品单价</th>
						          <th>购买数量</th>
						          <th>小计</th>
						        </tr>
						      </thead>
						      <tbody>
						      	@foreach($der as $k => $v)
						        <tr>
						          <th scope="row">{{$v->order_id}}</th>
						          <td><img src="{{$v->goods_pic}}"  class="img-thumbnail" width="70" height="70"></td>
						          <td>{{$v->goods_name}}</td>
						          <td>{{$ord->order_umsg}}</td>
						          <td>{{$v->goods_price}}</td>
						          <td>{{$v->num}}</td>
						          <td>{{$v->num * $v->goods_price}}</td>
						          
						        </tr>
						        @endforeach
						      </tbody>
						    </table>
						  </div>
						
						<div class="checkout-confirm">
							{{csrf_field()}}
							<a href="/home/cart" class="btn btn-lineDakeLight btn-back-cart">返回购物车</a>
							<a href="/" class="btn">返回首页</a>
							
						</div>
					</div>
				</div>

			</form>

		</div>
		

		
	</div>
	<!--收货地址body部分结束-->
</div>

<script type="text/javascript">
//3秒钟之后跳转到指定的页面
setInterval(function(){
	location.href='/'
},2000);
</script>

@endsection

