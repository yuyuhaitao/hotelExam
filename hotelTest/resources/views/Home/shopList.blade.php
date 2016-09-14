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

</head>
<body id="content">
<div class="header">
    <a href="index.html" class="home">
        <span class="header-icon header-icon-home"></span>
        <span class="header-name">主页</span>
    </a>
    <div class="title" id="titleString">礼品商城</div>
    <a href="javascript:history.go(-1);" class="back">
        <span class="header-icon header-icon-return"></span>
        <span class="header-name">返回</span>
    </a>
</div>


<div class="container">
    <ul class="giftlist unstyled" >
      
            <?php
                foreach($arr as $v){
            ?>
            <li>
                <div class="imgbox">
                    <a href="#"><img src="{{ $v['gift_img'] }}"  width="70px;" height="70px;" ></a>
                </div>
                <div class="desc">
                    <a href="#">{{ $v['gift_name'] }}</a> <br/>
                    <a href="#"><em>{{ $v['gift_price'] }}</em></a>
                    <input type="button" value="兑换"  class="getid" id="{{ $v['gift_id'] }}"/>
                    {{--<input type="button" value="收藏"  class="souid" id="{{ $v['gift_id'] }}"/>--}}
                </div>
                </li>
            <?php
                }
            ?>
        
    </ul>
</div>
{{--<script type="text/javascript">--}}
    {{--$(document).ready(function () {--}}
        {{--$('.giftlist li img').each(function () {--}}

            {{--var width = $(this).width(); // 图片实际宽度--}}
            {{--var height = $(this).height(); // 图片实际高度--}}

            {{--// 检查图片是否超宽--}}
            {{--if (width != height) {--}}

                {{--$(this).css("height", width); // 设定等比例缩放后的高度--}}
            {{--}--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}


<div class="footer">
    <div class="gezifooter">
        <div style="width: 500px;"><p align="center"> {!! $arr->render() !!}<input type="button" onclick="historyGift();" value="历史兑换"/></p></div>

        <a href="login.aspx" class="ui-link">立即登陆</a> <font color="#878787">|</font>
        <a href="reg.aspx" class="ui-link">免费注册</a> <font color="#878787">|</font>


        <a href="http://www.gridinn.com/@display=pc" class="ui-link">电脑版</a>
    </div>
    <div class="gezifooter">
        <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p>
    </div>
    <center>
        <div style="width: 500px;"><p align="center"> {!! $arr->render() !!}</p></div>
        <!--引入低部-->
    @include('home.footer')
    </center>
</div>

>>>>>>> origin/b
</body>
</html>
<script>
    $(function(){
        $('.getid').click(function(){
            var ids = $(this).attr('id');
            var url = '{{ URL("Home_giftOrder") }}';
            $.get(url,{"ids":ids},function(data){
                if(data==0){
                    alert("积分不足");
                }else{
                     $('#content').html(data);
                }
               
            })
        })
    })
</script>
<script>
    function historyGift(){
        location.href = '{{ URL('Home_giftHistory') }}';
    }
</script>
