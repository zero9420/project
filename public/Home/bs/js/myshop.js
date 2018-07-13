setTimeout(function(){

    $('#form-error').fadeOut("slow");;

},1800);

// 确定加入购物车时有没有选择颜色
$('.addCart').on('click',function () {
    // 获取颜色有木有选中
    var msgc = false;
    for (var i = 0; i < $('input[name=goods_color]').length; i++) {
    	if($('input[name=goods_color]')[i].checked){
    		msgc = true;
    		break;
    	}
    }
    // 获取尺码有木有选中
    var msgs = false;
    for (var i = 0; i < $('input[name=goods_size]').length; i++) {
    	if($('input[name=goods_size]')[i].checked){
    		msgs = true;
    		break;
    	}
    }
    if(msgc == false || msgs == false){
    	alert('请选择颜色和尺码.....');
    	return false;
    }
})