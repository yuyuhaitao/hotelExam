<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>我的格子</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <link href="home/css/bootstrap.min.css" rel="stylesheet" />
        <link href="home/css/NewGlobal.css" rel="stylesheet" />
        <link href="home/css/user.css" rel="stylesheet" />
        <script type="text/javascript" src="home/js/zepto.js"></script>
        <script type="text/javascript" src="home/js/jquery.js"></script>
    </head>
    
    <body>
        <div class="header">
            <a href="/" class="home">
                <span class="header-icon header-icon-home"></span>
                <span class="header-name">主页</span></a>
            <div class="title" id="titleString">我的订单</div>
            <a href="javascript:history.go(-1);" class="back">
                <span class="header-icon header-icon-return"></span>
                <span class="header-name">返回</span></a>
        </div>
        <div class="container width80 pt20">
            <div class="order-nav">
                <a class="selected" href="Home_Orderlist">全部</a>
                <a href="javascript:void(0)" id='unfinish' onclick="Unfinish()">未完成</a>
                <a class="last-a" href="javascript:void(0)" id='finish'  onclick="Finish()">已完成</a>
            </div>

            <div class="order-list">
                <ul>
                @if(!empty($arr))
                    @foreach($arr as $k => $v)
                        <li>
                            <span class="order-hotel-name"><a href="Home_Oinfo?order_id={{ $v['order_id'] }}" title="查看详情">{{ $v['hotel_name'] }}</a></span>
                            @if($v['order_status']=='待支付')
                                <span class="order-time">{{ $v['pay_time'] }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            @else
                                <span class="order-time">{{ $v['pay_time'] }}&nbsp;&nbsp;<a href="Home_Content?order_id={{ $v['order_id'] }}" title='立即评价'><font color="black">评价</font></a></span>
                            @endif
                        </li>
                    @endforeach
                    </ul>
                    <input type="hidden" id='tiaojian' value="{{ $if }}" />
                    @if($pagesum!=1)
                        <div id="ctl00_ContentPlaceHolder1_AspNetPager1" style="width:100%;text-align:center;">
                            <a href="javascript:void(0)" onclick="Opage(1)">首页</a>
                            <a href="javascript:void(0)" onclick="Opage({{ $prev }})">上一页</a>
                            <a href="javascript:void(0)" onclick="Opage({{ $next }})">下一页</a>
                            <a href="javascript:void(0)" onclick="Opage({{ $pagesum }})">尾页</a>
                        </div>
                    @endif
                @else
                    <div align="center">空</div>
                @endif
            </div>
        </div>
        <!--引入低部-->
        @include('home.footer')
    </body>

</html>
<script>
    //列表分页
    function Opage(page){
        var ifvalue = $('#tiaojian').val();
        $.get('Home_Opage',{'page':page,'if':ifvalue},function(msg){
            $('.order-list').html(msg);
        })
    }
    
    //未完成定单
    function Unfinish(){
        $('.selected').attr('class','');
        $('#unfinish').attr("class","selected");
        $.get('Home_Unfinish',function(msg){
            $('.order-list').html(msg);
        })
    }
    //未完成定单
    function Finish(){
        $('.selected').attr('class','');
        $('#finish').attr("class","selected");
        $.get('Home_Finish',function(msg){
            $('.order-list').html(msg);
        })
    }
</script>