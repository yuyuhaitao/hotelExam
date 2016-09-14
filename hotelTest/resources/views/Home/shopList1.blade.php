<?php
session()->regenerate();
$name = Session::get('u_name');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>礼品商城</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="{{ asset('/Home/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('/Home/css/NewGlobal.css') }}" rel="stylesheet" />
<script src="{{ asset('Admin/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/Home/js/zepto.js') }}"></script>
    <style>
        li{
            line-height: 50px;
        }
    </style>
</head>
<body id="content">
    <div style="float: left;width: 200px;height: auto;margin-top: 50px;">
        <ul style="list-style: none;text-align: center;">
            <li><div><img src="{{ asset('/Home/img/memberbg.png') }}" alt="<?php echo  $name;?>"/></div></li>
            <li><a href="">积分</a></li>
            <li><a href="">我的兑换</a></li>
            <li><a href="">我的收藏</a></li>
            <li><a href="">帮助</a></li>
        </ul>
    </div>
    <div class="container" style="width: 1000px;;float: right;">
                <?php
                    foreach($arr as $v){
                ?>
                    <div style="float: left;margin-right: 20px;height: 200px;margin-top: 50px;">
                        <div class="imgbox">
                            <a href="#"><img src="{{ $v['gift_img'] }}"  width="100px;" height="100px;" > </a>
                        </div>
                        <div class="desc">
                            <a href="#" style="line-height: 35px;">{{ $v['gift_name'] }}</a> <br/>
                            <a href="#" style="line-height: 35px;"><em>{{ $v['gift_price'] }}</em></a>
                            <input type="button" value="兑换"  class="getid" id="{{ $v['gift_id'] }}"/>
                            <input type="button" value="收藏"  class="souid" id="{{ $v['gift_id'] }}"/>
                        </div>
                    </div>
                <?php
                    }
                ?>
    </div>
    <center>
        <div style="width: 500px;"><p align="center"> {!! $arr->render() !!}</p></div>
        <div class="footer" style="width: 500px;margin-top: 100px;" >
            <p>
                <a href="#" class="ui-link">立即登陆</a> <font color="#878787">|</font>
                <a href="#" class="ui-link">免费注册</a> <font color="#878787">|</font>
                <a href="http://www.gridinn.com/@display=pc" class="ui-link">电脑版</a>
            </p>
            <p>
            <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p>
            </p>
        </div>
    </center>
</body>
</html>
<script>
    $(function(){
        $('.getid').click(function(){
            var ids = $(this).attr('id');
            var url = '{{ URL("Home_giftOrder") }}';
            $.get(url,{"ids":ids},function(data){
                $('#content').html(data);
            })
        })
    })
</script>
