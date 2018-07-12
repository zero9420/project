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
											<span class="edit-btn J_editAddr">编辑</span>
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
						<div id="checkoutGoodsList" class="checkout-goods-box">
							<div class="xm-box">
								<div class="box-hd">
									<h2 class="title">订单信息</h2>
								</div>
								<div class="box-bd">
									<dl class="checkout-goods-list">
										<dt class="clearfix">
											<span class="col col-1">商品名称</span>
											<span class="col col-2">购买价格</span>
											<span class="col col-3">购买数量</span>
											<span class="col col-4">小计（元）</span>
										</dt>
										<dd class="item clearfix">
											<div class="item-row">
												<div class="col col-1">
													<div class="g-pic">
														<img src="{{$res->order_shop_img}}" width="40" height="40" />
													</div>
													<div class="g-info">
														<a href="#" target="_blank">
														{{$res->order_shop_title}}
														</a>
													</div>
												</div>

												<div class="col col-2">39元</div>
												<div class="col col-3">1</div>
												<div class="col col-4">39元</div>
											</div>
										</dd>
										
									</dl>
									<div class="checkout-count clearfix">
										<div class="checkout-count-extend xm-add-buy">
											

										</div>
										<!-- checkout-count-extend -->
										<div class="checkout-price">
											<ul>

												<li>
													订单总额：<span>244元</span>
												</li>
												<li>
													活动优惠：<span>-0元</span>
													<script type="text/javascript">
                                                        checkoutConfig.activityDiscountMoney=0;
                                                        checkoutConfig.totalPrice=244.00;
													</script>
												</li>
												
												<li>
													运费：<span id="postageDesc">0元</span>
												</li>
											</ul>
											<p class="checkout-total">应付总额：<span><strong id="totalPrice">244</strong>元</span></p>
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

							<a href="#" class="btn btn-lineDakeLight btn-back-cart">返回购物车</a>
							

						</div>
					</div>
			</div>

			</form>

		</div>
		



	
	<!--收货地址body部分结束-->
</div>
@endsection