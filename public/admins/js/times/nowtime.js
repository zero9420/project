var nowsTime = document.getElementById("nowsTime");
function play(){
    var time = new Date();
    // 获取年份
    //获取年份
    var time_y = time.getFullYear();
    // 获取月份,获取到是(0-11)
    var time_m = time.getMonth()+1;
    if(time_m<10){
        time_m = '0' + time_m;
    }
    // 获取天数
    var time_day = time.getDate();
    if(time_day < 10){
        time_day = '0' + time_day;
    }
    // 获取小时
    var time_h = time.getHours();
    if(time_h < 10){
        time_h = '0' + time_h;
    }
    // 获取分钟
    var time_ms = time.getMinutes();
            if(time_ms < 10){
                time_ms = '0' + time_ms;
            }
    // 获取秒数
    var time_s = time.getSeconds();
            if(time_s < 10){
                time_s = '0' + time_s;
            }
    // 获取星期
    var time_w = time.getDay();
            switch(time_w){
                case 0:
                    time_w = '星期日';
                break;
                case 1:
                    time_w = '星期一';
                break;
                case 2:
                    time_w = '星期二';
                break;
                case 3:
                    time_w = '星期三';
                break;
                case 4:
                    time_w = '星期四';
                break;
                case 5:
                    time_w = '星期五';
                break;
                case 6:
                    time_w = '星期六';
                break;

            }
    nowTime = time_y+"-"+time_m+"-"+time_day+" "+time_h+":"+time_ms+":"+time_s+" "+time_w;
    nowsTime.innerHTML = nowTime;
}
setInterval(play,1000);
