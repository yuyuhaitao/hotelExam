<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>酒店点评</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="home/css/bootstrap.min.css" rel="stylesheet" />
<link href="home/css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="home/js/zepto.js"></script>
	
</head>
<body>
 <div class="header">
 <a href="/" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString"></div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

        
    <form name="aspnetForm" method="post" action="HotelReview.aspx?id=5" id="aspnetForm">
<div>

</div>

<div class="container">
<ul class="unstyled hotel-bar">
	<li class="first">
    	<a href="Home_hotel?id={{$id}}">房型</a>
	</li>
	<li><a href="Home_hotelinfo?id={{$id}}">简介</a></li>
	<li><a href="Home_hotelmap?id={{$id}}">地图</a></li>
	<li><a href="Home_HotelContent?id={{$id}}" class="active">评论</a></li>
</ul>
<script type="text/javascript">
    $('#titleString').text($(document)[0].title);
</script>

<div class="hotel-comment-list">
	@foreach($arr as $k => $v)
      <div class="hotel-user-comment">
				<span class="hotel-user"><img width="32" height="32" src="{{$v['u_img']}}">上帝{{ $names[$k] }}:</span>
				<div class="hotel-user-comment-cotent">
					<p>{{ $v['content_info'] }}</p>
					<span>{{ $v['content_time'] }}</span>
				</div>
			</div>                
    @endforeach 	

		</div>
            <div class="page">
    
<!-- AspNetPager V7.2 for VS2005 & VS2008  Copyright:2003-2008 Webdiyer (www.webdiyer.com) -->
<div id="ctl00_ContentPlaceHolder1_AspNetPager1" style="width:100%;text-align:center;">
@if($pagesum!=1)
    <a href="Home_HotelContent?id={{$id}}&page=1">首页</a>
    <a href="Home_HotelContent?id={{$id}}&page={{ $prev }}">上一页</a>
    <a href="Home_HotelContent?id={{$id}}&page={{ $next }}">下一页</a>
    <a href="Home_HotelContent?id={{$id}}&page={{ $pagesum }}">尾页</a>
@endif
</div>
<!-- AspNetPager V7.2 for VS2005 & VS2008 End -->

  
    </div>	
</div>
</form>


  <!--引入低部-->
    @include('home.footer')

</body>
</html>
