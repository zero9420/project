@extends('layout.homes')

@section('title',$title)

@section('content')

     <div class="center" style="background:#fff">

	<link rel="shortcut icon" type="image/x-icon" href="/homes/img/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/homes/css/base.css">
	<link rel="stylesheet" type="text/css" href="/homes/css/home.css">
	<link rel="stylesheet" type="text/css" href="/homes/css/car/base.css">
	<link rel="stylesheet" type="text/css" href="/homes/css/car/home.css">
	<!--收货地址body部分开始-->
	<div class="border_top_cart">
		<script type="text/javascript">
            var checkoutConfig={
                addressMatch:'common',
                addressMatchVarName:'data',
                hasPresales:false,
                hasBigTv:false,
                hasAir:false,
                hasScales:false,
                hasGiftcard:false,
                totalPrice:244.00,
                postage:10,//运费
                postFree:true,//活动是否免邮了
                bcPrice:150,//计算界值
                activityDiscountMoney:0.00,//活动优惠
                showCouponBox:0,
                invoice:{
                    NA:"0",
                    personal:"1",
                    company:"2",
                    electronic:"4"
                }
            };
            var miniCartDisable=true;
		</script>
		<div class="container">
			<div class="checkout-box">
				<form  id="checkoutForm" action="#" method="post">
					<div class="checkout-box-bd">
						<!-- 地址状态 0：默认选择；1：新增地址；2：修改地址 -->
						<input type="hidden" name="Checkout[addressState]" id="addrState"   value="0">
						<!-- 收货地址 -->
						<div class="xm-box">
							<div class="box-hd ">
								<h2 class="title">收货地址</h2>
								<!---->
							</div>
							<div class="box-bd">
								<div class="clearfix xm-address-list" id="checkoutAddrList">
									<dl class="item" >
										<dt>
											<strong class="itemConsignee"> {{$res->order_name}} </strong>
											<span class="itemTag tag">家</span>
										</dt>
										<dd>
											<p class="tel itemTel">{{$res->order_phone}}</p>
											<p class="itemStreet"> {{$res->order_addr}} </p>
											<p class="itemStreet"><strong>买家留言:</strong> <p>{{$res->order_umsg}} </p>
											<span class="edit-btn J_editAddr"></span>
										</dd>
										<dd style="display:none">
											<input type="radio" name="Checkout[address]" class="addressId"  value="10140916720030323">
										</dd>
									</dl>
									
								</div>
								
								
							</div>                
						</div>
						<!-- 收货地址 END-->
						<div id="checkoutPayment">
							<!-- 支付方式 -->
							<div class="xm-box">
								<div class="box-hd ">
									<h2 class="title">支付方式</h2>
								</div>
								<div class="box-bd">
									<ul id="checkoutPaymentList" class="checkout-option-list clearfix J_optionList">
										<li class="item selected">
											<input type="radio" name="Checkout[pay_id]" checked="checked" value="1">
											<p>
												在线支付                                <span></span>
											</p>
										</li>
									</ul>
								</div>
							</div>
							<!-- 支付方式 END-->
							
							
						</div>
					
						
					</div>
					<div class="checkout-box-ft">
						<!-- 商品清单 -->
							<div class="member-sheet clearfix">

							
						<div class="bs-example" data-example-id="hoverable-table">
									    <table class="table table-hover">
									      <thead>
									        <tr>
									          <th>商品图片</th>
									          <th>商品名称</th>
									          <th>商品单价</th>
									          <th>购买数量</th>
									          <th>订单状态</th>
									          <th>订单操作</th>
									        </tr>
									      </thead>
									      <tbody>
									        <tr>
									          <td>
									          	<img src=" {{$data->goods_pic}} " alt="..." class="img-circle" width="100px" height="100">
									          </td>
									          <td> {{$data->goods_name}} </td>
									          <td> {{$data->goods_price}} </td>
									          <td> {{$data->num}} </td>
									          <td>@if($data->goods_status==0)未发货@elseif($data->goods_status==1)已发货@else交易完成@endif</td>
										        <td>
										          	@if($data->goods_status==2)
										          		@if(empty($comments))
										          		<a href="/home/eval/{{$data->goods_id}}">评价商品</a>
										          		@else
										          		<a href="/home/myeval">查看评价</a>
										          		@endif
										          	@endif
										        </td>
									        </tr>
									      </tbody>

									    </table>
									  </div>
						</div>
					</div>
						<!-- 商品清单 END -->
						<input type="hidden"  id="couponType" name="Checkout[couponsType]">
						<input type="hidden" id="couponValue" name="Checkout[couponsValue]">
						<div class="checkout-confirm">

							<a href="/home/userinfo" class="btn btn-lineDakeLight btn-back-cart">返回个人中心</a>
							

						</div>
					</div>
			</div>

			</form>

		</div>
		



	
	<!--收货地址body部分结束-->
</div>
@endsection