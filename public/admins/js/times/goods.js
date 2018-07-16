// 商品名字字数限制
$("#goodsname").on("input propertychange", function () {
    var $this = $(this),
            name_val = $this.val(),
            count = "";
    if (name_val.length > 30) {
        $this.val(name_val.substring(0, 30));
    }
    counts = 30 - $this.val().length;
    $("#name-count").text(counts);
});

// 商品简介字数限制
$("#goodsinfo").on("input propertychange", function () {
    var $this = $(this),
            info_val = $this.val(),
            count = "";
    if (info_val.length > 120) {
        $this.val(info_val.substring(0, 120));
    }
    count = 120 - $this.val().length;
    $("#info-count").text(count);
});

// 商品规格修改
$('#size').click(function() {
    var size = $('#goods_size').text().trim();
    var inp = $('<input type="text" />');
    $('#goods_size').empty();
    //插入input
    $('#goods_size').append(inp);
    inp.val(size);
    inp.focus();
    inp.select();

    inp.blur(function(){

        var spec = $(this).val();

        var ids = $('#goods_id').val();

        $.get('/admin/ajaxsize',{spec:spec,ids:ids},function(data){
            if(data == '1'){
                $('#goods_size').text(spec);
                alert('修改成功');
            } else {

                $('#goods_size').text(size);

                alert('修改失败');
            }
        });
    });
});

// 商品颜色修改
$('#color').click(function() {
    var color = $('#goods_color').text().trim();
    var input = $('<input type="text" />');
    $('#goods_color').empty();
    //插入input
    $('#goods_color').append(input);
    input.val(color);
    input.focus();
    input.select();

    input.blur(function(){

        var colour = $(this).val();

        var id = $('#goods_id').val();

        $.get('/admin/ajaxcolor',{colour:colour,id:id},function(data){
            if(data == '1'){
                $('#goods_color').text(colour);
                alert('修改成功');
            } else {

                $('#goods_color').text(color);

                alert('修改失败');
            }
        });
    });
});

// 库存加
$('#stock').click(function(event) {
    /* Act on the event */
    var stock = 100;
    $.get('/admin/ajaxadd',{stock:stock},function(data){
        if(data == '01'){
            alert('添加成功');
            location.reload(true);
        } else {
            alert('添加失败');
        }
    })

});