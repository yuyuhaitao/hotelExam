
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>最新活动</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" /><link href="home/css/bootstrap.min.css" rel="stylesheet" />
<link href="home/css/NewGlobal.css" rel="stylesheet" />
<script type="text/javascript" src="home/js/zepto.js"></script>
<script type="text/javascript" src="home/js/jquery.js"></script>
</head>
<body>
    <div class="container width90 pt20">
<ul class="search-group unstyled"> 
    <style>
        .tds{
            width: 80px;
            height: 50px;
        }
        .hr{
            color:#000000;
        }
    </style>
 <div class="header">
 <a href="{{url('/')}}" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString">订单评价</div>
<a href="javascript:window.history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

        
        <div id="slideBox" class="slideBox">
        @if($content!=1)
            @foreach($content as $k => $v)
                <div class="coupon-nav coupon-nav-style">
                    <span class="search-icon time-icon"></span>&nbsp;
                    <span><font color="gray">评论时间：{{ $v['content_time'] }}</font></span>
                    <br />&nbsp;
                    @for($i=1;$i<=$v['is_good'];$i++)
                        <img src="home/img/sth.gif"/>
                    @endfor
                    <br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span><font color="gray">评论内容：{{ $v['content_info'] }}</font><hr /></span>
                </div> 
            @endforeach
        @endif
        <form action="Home_ContentAdd" method="post">
            <table align="center" id="tab" style="margin-top:35px;">
            <tr>
                <td class="tds">酒店:</td>
                <td><h4>{{ $arr['hotel_name'] }}</h4></td>
            </tr>
            <tr>
                <td class="tds">评分:</td>
                <td>
                    @for($i=1;$i<=5;$i++)
                        <img src="home/img/nst.gif" class="star" sort='{{ $i }}' alt="" />
                    @endfor
                    <?php echo $errors->first('is_good'); ?>
                </td>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id='point' name="is_good" />
                <input type="hidden" name="hotel_id" value="{{ $arr['hotel_id'] }}" />
                <input type="hidden" name="order_id" value="{{ $arr['order_id'] }}" />
                <input type="hidden" name="u_id" value="{{ $u_id }}" />
            </tr>
            <tr>
                <td class="tds">评论:</td>
                <td>
                    <textarea name="content_info" id="" cols="6" rows="4"></textarea><?php echo $errors->first('content_info'); ?>
                </td>
            </tr>
            </table>
            <br />
            <div class="control-group tc">
                <input type="submit" value="评价" style="width:350px;" class="btn-large green button width80"/>
            </div>
        </form>
        </div>

        <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
        <a class="prev" href="javascript:void(0)"></a>
        <a class="next" href="javascript:void(0)"></a>

    </div>
    <br />
    <br />

    <!--引入低部-->
    @include('home.footer')
</body>
</html>
<script type="text/javascript">
    $('.star').click(function(){
        //alert();
        var sort = $(this).attr('sort');
        for(var i=1;i<=5;i++){
            $('.star[sort='+i+']').attr('src','home/img/nst.gif');
        }
        for(var i=1;i<=sort;i++){
            $('.star[sort='+i+']').attr('src','home/img/sth.gif');
        }
        $('#point').val(sort);
    })
</script>

