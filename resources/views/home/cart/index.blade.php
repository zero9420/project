@extends('layout.homes')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" type="image/x-icon" href="home/login/img/icon/favicon.ico">
<link rel="stylesheet" type="text/css" href="/home/login/css/base.css">
<link rel="stylesheet" type="text/css" href="/home/login/css/home.css">
<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
>
@section('content')
	@if(count($data) > 0)
<section id="pc-jie" class="lamp203">
	<div class="center ">
		<ul class="pc-shopping-title clearfix">
			<li><a href="#" class="cu">全部商品(10)</a></li>
			<li><a href="#">限时优惠(7)</a></li>
			<li><a href="#">库存紧张(0)</a></li>
		</ul>
	</div>
	
	<div class="pc-shopping-cart center">
		<div class="pc-shopping-tab ">
			<table>
				<thead>

					<tr class="tab-0">
						<th class="tab-1"><input type="checkbox"  name="s_all" class="s_all tr_checkmr" id="s_all_h"></th>
						<th class="tab-2">商品</th>
						<th class="tab-3">商品信息</th>
						<th class="tab-4">价格</th>
						<th class="tab-6">数量</th>
						<th class="tab-7">小计</th>
						<th class="tab-8">操作</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="7" style="padding-left:10px; background:#eee">
							<input type="checkbox" >
							<label for="">云购物自营</label>
							<a href="#" style="position:relative;padding-left:50px"><i class="icon-kefu"></i>联系客服</a>
							<ul class="clearfix fr" style="padding-right:20px">
								<li><i class="pc-shop-car-yun"></i>满109元减10</li>
								<li><i class="pc-shop-car-yun"></i>领取3种优惠券, 最高省30元</li>
							</ul>
						</td>
					</tr>
					<tr>
					<?php $total =0; ?>
						@foreach($data as $k=>$v)
						<th><input type="checkbox" checked style="margin-left:10px; float:left"></th>
						<th class="tab-th-1">
							<a href="/goodsdetail/{{$v->goods_id}}"><img src="{{$v->goods_pic}}" alt=""></a>

							<a href="/goodsdetail/{{$v->goods_id}}" class="tab-title">{{$v->goods_name}} </a>
						</th>
						<th>
							<p>颜色：{{$v->goods_color}}</p>
							<p>规格：{{$v->goods_size}}</p>
						</th>
						<th>
							<p class="price">{{$v->goods_price}}</p>
						</th>
							<th class="tab-th-2">
								<input type="button" value="-" class="minus"
								style="width:20px;height:30px;" id="<?php echo $v->id ?>"/>
								<input type="text"  name="quantity" value="{{$v->num}}" class="qty"

								 style="width:50px;height:25px; text-align:center;"/>
								<input type="button" value="+" class="plus" style="width:20px;height:30px;" id="<?php echo $v->id ?>" />
								</th>
							</div>
						<th class="xiaoji">
							{{$v->goods_price}}
						</th>
						<th><a href="javascript:void(0)" class="remove" ids="{{$v->id}}">删除</a></th>
					</tr>
					<?php  $total +=$v->num*$v->goods_price ?>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>

	<div style="height:10px"></div>
	<div class="center">
		<div class="clearfix pc-shop-go">
			<div class="fl pc-shop-fl">
				<input type="checkbox" checked placeholder="">
				<a href="javascript:void(0)" id='quanxuan'>全选
				<a href="#">删除</a>
				<a href="#">清楚失效商品</a>
			</div>

			<div class="fr pc-shop-fr">
				<p>共有 <em class="red pc-shop-shu"></em> 款商品，总计（不含运费）</p>
				<span class="total"><?php echo $total ?></span>

				<a href="/home/jsy" id="fukuan">去付款</a>
			</div>
		</div>
	</div>
</section>
	@else
<!-- slider(空购物车)-start -->
<div class="container">
    <div class="slider">
        <!-- Slider Image -->
        <div id="mainslider" class="nivoSlider slider-image">
            <img src="/home/bs/img/cart/empty-cart.png" alt="main slider" title="#htmlcaption1" />
        </div>
        <!-- Slider Caption 1 -->
        <div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
            <div class="slider-progress"></div>
            <div class="slide1-text slide-1 hidden-xs">
                <div class="middle-text">
                	<div class="cap-dec wow bounceInLeft" data-wow-duration="0.9s" data-wow-delay="0s">
                        <h2>购物车空空如也,快去选择你心仪的商品吧.....</h2>
                    </div>
                    <div class="cap-readmore wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                        <a href="/">去购物....</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider-end -->
@endif



@endsection

@section('js')

	<script type="text/javascript">
		//加法运算
	$('.plus').click(function(){

	//获取数量

	var num = $(this).prev().val();
	num++;
	//加完之后让数量发生改变
	$(this).prev().val(num);

			function accMul(arg1, arg2) {

	        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

	        try { m += s1.split(".")[1].length } catch (e) { }

	        try { m += s2.split(".")[1].length } catch (e) { }

	        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)

			}
		 // var pc = $('.price').text();



		 //获取商品数量
		 var num = $(this).prev().val();
		 // alert(num);
		 //获取商品id
		 var id = $(this).attr('id');
		 $.get('/home/cart/jiajian',{id:id,num:num},function($data){

		 })

		var pc = $(this).parents('tr').find('.price').text();
		// alert(pc);
		//加完之后让小计发生改变
		$(this).parents('tr').find('.xiaoji').text(accMul(pc,num));

		var jiashuliang=$(this).prev().val();

		// alert(jiashuliang);

		// $.get('/')


		totals();
			});


	//减法运算
	$('.minus').click(function(){

	//获取数量
	var mins = $(this).next().val();
	mins--;
		if(mins <= 1){

			mins = 1;
		}
	//减完让数量发生改变
		$(this).next().val(mins);

		//减完让小计发生改变
		//获取单价
		var pc = $(this).parents('tr').find('.price').text();
		// alert(pc);


		function accMul(arg1, arg2) {

	        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

	        try { m += s1.split(".")[1].length } catch (e) { }

	        try { m += s2.split(".")[1].length } catch (e) { }

	        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)
	        totals();
		}
		$(this).parents('tr').find('.xiaoji').text(accMul(pc,mins));
			
			var num = $(this).next().val();
			// alert(num);
			 //获取商品id
		 var id = $(this).attr('id');
		 // alert(id);
		 $.get('/home/cart/jiajian',{id:id,num:num},function($data){

		 })
			// alert(jianshuliang);

			totals();
			});

		

		function totals()
		{

		var sum = 0;
		$(':checkbox:checked').each(function(){

			var pir = $(this).parents('tr').find('.xiaoji').text();
			// alert(pir);
			// sum += pir;

			function accAdd(arg1,arg2){  
			    var r1,r2,m;  
			    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
			    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
			    m=Math.pow(10,Math.max(r1,r2))  
			    return (arg1*m+arg2*m)/m  
			}

			$('.total').text(sum = accAdd(sum, pir));
		})
		}


	// 		//全选
	// $('.ass').click(function(){
	// // alert(123);
	// 	$(':checkbox').each(function(){
	// 		alert(123);
	// 		// $(this).attr('checked','checked');
	// 		$(this).attr('checked','checked');
	// 	})

	// 	totals();
	// })

		// $(':checkbox:').each(function(){
		// 	alert(123);

		// });

		//删除
	$('.remove').click(function(){


		var rs = confirm('删除商品?');

		if(!rs) return;

		//获取id
		var idd = $(this).attr('ids');
		var id=parseInt(idd);
		// alert(id);
		var ts = $(this);
		// alert(id);
		
		//ajax删除

$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});



			$.post('/home/cart/delete',{id:id},function(data){

			if(data != '0'){

				ts.parents('tr').remove();

				$('.total').text('0.0');

				totals();
				
			} else {

				location.reload(true);
			}

		});



	});


	</script>
	<script type="text/javascript">
		

			//单击多选框让总价发生改变
	$(':checkbox').click(function(){

		totals();

	});
		//全选
	$('#quanxuan').click(function(){
		// alert(54188);
		// $(':checkbox').each(function(){

		// 	// $(this).attr('checked','checked');
		// 	$(this).attr('checked',true);
		// })

		// totals();
	});
	</script>
	
	<script type="text/javascript">
		$('#fukuan').click(function(){
			// alert(54188);
			var total = $('.total').text();
		$.get('/home/cart/total',{total:total},function($data){
			
		});

		})
		

	</script>


@endsection