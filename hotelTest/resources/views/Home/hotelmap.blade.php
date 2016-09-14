<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>百度地图</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="{{asset('Home/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{asset('Home/css/NewGlobal.css')}}" rel="stylesheet" />

<style type="text/css">
    body, html {width: 100%;height: 100%;margin:0 auto;font-family:"微软雅黑";}
    #allmap{width:100%;height:500px;}
    p{margin-left:5px; font-size:14px;}
  </style>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=01OZhroLNa4cugllo3BgM8l2s15Guwsq"></script>

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
   
  <div class="container hotellistbg">
      <ul class="unstyled hotel-bar">
        <li class="first">
          <a href="Home_hotel?id={{$arr['hotel_id']}}">房型</a>
        </li>
        <li><a href="Home_hotelinfo?id={{$arr['hotel_id']}}"  >简介</a></li>
        <li><a href="Home_hotelmap?id={{$arr['hotel_id']}}" class="active">地图</a></li>
        <li><a href="Home_HotelContent?id={{$arr['hotel_id']}}">评论</a></li>
      </ul>

      <ul class="unstyled hotellist">
         <div id="allmap"></div>     
      </ul>
  </div>

  <!--引入低部-->
    @include('home.footer')

</body>
<script type="text/javascript">
  // 百度地图API功能
  var map = new BMap.Map("allmap");
  var point = new BMap.Point(116.331398,39.897445);
  map.centerAndZoom(point,12);
  // 创建地址解析器实例
  var myGeo = new BMap.Geocoder();
  // 将地址解析结果显示在地图上,并调整地图视野
  myGeo.getPoint("{{$arr['hotel_address']}}", function(point){
    //alert(map.centerAndZoom(point, 17));
    if (point) {
      map.centerAndZoom(point, 17);
      map.addOverlay(new BMap.Marker(point));
    }else{
      alert("您选择地址没有解析到结果!");
    }
  }, "{{$arr['city_name']}}");
</script>

</html>
