<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title收藏列表</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="Home/css/bootstrap.min.css" rel="stylesheet" />
<link href="Home/css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="Home/js/zepto.js"></script>

</head>
<body>
 <div class="header">
 <a href="/" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString">收藏列表</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

        
  <div class="container hotellistbg">
         <ul class="unstyled hotellist">
       @foreach($date as $v)
             <li>
              <a href="/Home_hotel?id={{$v['hotel_id']}}">
                 <img class="hotelimg fl" src="http://www.gridinn.com/images/hotel/5.jpg" /> 
              <div class="inline">
                  <h3>{{$v['hotel_name']}}</h3>
                  <p>地址：{{$v['hotel_address']}}</p>
                  <p>评分：4.6 （1200人已收藏）</p>
              </div>
              <div class="clear"></div>  
               </a> 
               <ul class="unstyled">
                   <li><a href="/Home_hotel?id={{$v['hotel_id']}}" class="order">预订</a></li>
                   <li><a href="/Home_collectdels?hotel_id={{$v['hotel_id']}}" class="gps">取消收藏</a></li>
               </ul>
             </li>
        @endforeach
            
              
           
         </ul>
  </div>


  <!--引入低部-->
    @include('home.footer')

</body>
</html>
