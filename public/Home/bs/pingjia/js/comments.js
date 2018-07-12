// 评价字数名字字数限制
$("#comments").on("input propertychange", function () {
    var $this = $(this),
            _val = $this.val(),
            count = "";
    if (_val.length > 120) {
        $this.val(_val.substring(0, 120));
    }
    counts = 120 - $this.val().length;
    $("#count").text(counts);
});

// 星星评分
$(function () {
    //评分
    var starRating = 0;
    $('.photo span').on('mouseenter',function () {
        var index = $(this).index()+1;
        $(this).prevAll().find('.high').css('z-index',1)
        $(this).find('.high').css('z-index',1)
        $(this).nextAll().find('.high').css('z-index',0)
        $('.starNum').html((index*2).toFixed(1)+'分')
        $('#grade').val((index*2).toFixed(1))
    })
    $('.photo').on('mouseleave',function () {
        $(this).find('.high').css('z-index',0)
        var count = starRating / 2
        if(count == 5) {
            $('.photo span').find('.high').css('z-index',1);
        } else {
            $('.photo span').eq(count).prevAll().find('.high').css('z-index',1);
        }
        $('.starNum').html(starRating.toFixed(1)+'分')
    })
    $('.photo span').on('click',function () {
        var index = $(this).index()+1;
        $(this).prevAll().find('.high').css('z-index',1)
        $(this).find('.high').css('z-index',1)
        starRating = index*2;
        $('.starNum').html(starRating.toFixed(1)+'分');
        alert('评分：'+(starRating.toFixed(1)+'分'))
    })
    //确定评分
    $('.sureStar').on('click',function () {
        if(starRating===0) {
            alert('最低一颗星！');
            return false;
        }
    })
})