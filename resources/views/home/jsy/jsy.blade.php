@extends('layout.homes')

@section('content')
<div class="center" style="background:#fff">

	<link rel="shortcut icon" type="image/x-icon" href="/homes/img/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/homes/css/base.css">
	<link rel="stylesheet" type="text/css" href="/homes/css/home.css">
	<link rel="stylesheet" type="text/css" href="/homes/css/car/base.css">
	<link rel="stylesheet" type="text/css" href="/homes/css/car/home.css">
	<!--收货地址body部分开始-->
	<div class="border_top_cart">
	
		</script>
		<div class="container">
			<div class="checkout-box">
				<form action="/home/jsy" method="post" enctype="multipart/form-data">
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
											<strong class="itemConsignee">{{$info->info_name}}</strong>
											<input type="hidden" name="order_name" value="{{$info->info_name}}">
											<span class="itemTag tag">家</span>
										</dt>
										<dd>
											<p class="tel itemTel" > {{$info->info_telphone}} </p>
											<input type="hidden" name="order_phone" value="{{$info->info_telphone}}">
											<p class="itemRegion">{{$info->info_address}}</p>
											<input type="hidden" name="order_addr" value="{{$info->info_address}}">
											
										</dd>
										
									</dl>
									
								</div>
			
							</div>                
						</div>
						<!-- 收货地址 END-->
						<div id="checkoutPayment">
							
							<div class="xm-box">
								<div class="box-hd ">
									<h2 class="title">配送方式</h2>
								</div>
								<div class="box-bd">
									<ul id="checkoutShipmentList" class="checkout-option-list clearfix J_optionList">
										<li class="item selected">
											
											<p>
												快递配送（免运费）                                <span></span>
											</p>
										</li>
									</ul>
								</div>
							</div>
							<!-- 配送方式 END-->                    <!-- 配送方式 END-->
						</div>
					
						
					</div>
					<div class="checkout-box-ft">
						<!-- 商品清单 -->
						<div id="checkoutGoodsList" class="checkout-goods-box">
							<div class="xm-box">
								<div class="box-hd">
									<h2 class="title">确认订单信息</h2>
								</div>
								<div class="box-bd">
									<dl class="checkout-goods-list">
										<dt class="clearfix">
											<span class="col col-1">商品名称</span>

											<span class="col col-2">购买价格</span>
											<span class="col col-3">购买数量</span>
											<span class="col col-4">小计（元）</span>
										</dt>
										@php
											$to = 0;
										@endphp
										@foreach($cart as $k => $v)
										@php

											$to += $v->goods_price * $v->num;
										@endphp
										<dd class="item clearfix">
											<div class="item-row">
												<div class="col col-1">
													<div class="g-pic">
														<img src="{{$v->goods_pic}}"  width="40" height="40" />

													</div>
													<div class="g-info">
														<a href="#" target="_blank">
															{{$v->goods_name}}
														</a>
													</div>
												</div>

												<div class="col col-2"> {{$v->goods_price}} </div>
												
												<div class="col col-3">{{$v->num}}</div>
	
												<div class="col col-4">{{$v->goods_price * $v->num}}</div>
												<input type="hidden" name="order_payment" value="{{$v->goods_price * $v->num}}">
													
											</div>
										</dd>
										@endforeach
									</dl>
									<div class="checkout-count clearfix">
										<div class="checkout-count-extend xm-add-buy">
											<h3 class="title">会员留言</h2></br>
												<input type="text"  name='order_umsg'/>

										</div>
										<!-- checkout-count-extend -->
										<div class="checkout-price">
											<ul>

												<li>
													订单总额：<span>{{$to}}</span>
												</li>
												<li>
													活动优惠：<span>-0元</span>
													<script type="text/javascript">
                                                        checkoutConfig.activityDiscountMoney=0;
                                                        checkoutConfig.totalPrice=244.00;
													</script>
												</li>
												<li>
													优惠券抵扣：<span id="couponDesc">-0元</span>
												</li>
												<li>
													运费：<span id="postageDesc">0元</span>
												</li>
											</ul>
											<p class="checkout-total">应付总额：<span><strong id="totalPrice">{{$to}}</strong>元</span></p>
											<input type="hidden" name="order_payment" value="{{$to}}">
										</div>
										<!--  -->
									</div>
								</div>
							</div>

							
						</div>
						<!-- 商品清单 END -->
						<input type="hidden"  id="couponType" name="Checkout[couponsType]">
						<input type="hidden" id="couponValue" name="Checkout[couponsValue]">
						<div class="checkout-confirm">
							{{csrf_field()}}
							<a href="#" class="btn btn-lineDakeLight btn-back-cart">返回购物车</a>
							<input type='submit' value="提交" class='btn'>
						</div>
					</div>
				</div>

			</form>

		</div>
		

		
	</div>
	<!--收货地址body部分结束-->
</div>
@endsection