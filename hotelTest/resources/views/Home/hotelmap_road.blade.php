<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />

<link href="{{asset('Home/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{asset('Home/css/NewGlobal.css')}}" rel="stylesheet" />
<style type="text/css">
    body, html {width: 100%;height: 100%;margin:0 auto;font-family:"微软雅黑";}
    #allmap{width:100%;height:500px;}
    p{margin-left:5px; font-size:14px;}

  #result {width:100%;font-size:12px;}
  dl,dt,dd,ul,li{
    margin:0;
    padding:0;
    list-style:none;
  }
  dt{
    font-size:14px;
    font-family:"微软雅黑";
    font-weight:bold;
    border-bottom:1px dotted #000;
    padding:5px 0 5px 5px;
    margin:5px 0;
  }
  dd{
    padding:5px 0 0 5px;
  }
  li{
    line-height:28px;
  }
  </style>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=01OZhroLNa4cugllo3BgM8l2s15Guwsq"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />
  <title>带检索功能的信息窗口</title>
</head>
<body>
 <div class="header">
     <a href="/" class="home">
                <span class="header-icon header-icon-home"></span>
                <span class="header-name">主页</span>
     </a>
     <div class="title" id="titleString">地图导航</div>
     <a href="javascript:history.go(-1);" class="back">
                <span class="header-icon header-icon-return"></span>
                <span class="header-name">返回</span>
     </a>
 </div>
   
  <div class="container hotellistbg">
      
     
      <ul class="unstyled hotellist">
         <div id="allmap"></div>  
         <div id="result">
            <input type="button" value="点击查询" onclick="searchInfoWindow.open(marker);"/>
         </div>
      </ul>
  </div>

  <!--引入低部-->
    @include('home.footer')

</body>
<script type="text/javascript">
  // 百度地图API功能
    var map = new BMap.Map('allmap');
    var poi = new BMap.Point({{$arr['PLN']}},{{$arr['PLA']}});
    map.centerAndZoom(poi, 16);
    map.enableScrollWheelZoom();

    var content = '<div style="margin:0;line-height:20px;padding:2px;">' +
                    '<img src="../img/baidu.jpg" alt="" style="float:right;zoom:1;overflow:hidden;width:100px;height:100px;margin-left:3px;"/>' +
                    '地址：{{$arr['hotel_address']}}<br/>电话：{{$arr['hotel_phone']}}<br/>简介：{{$arr['hotel_info']}}' +
                  '</div>';

    //创建检索信息窗口对象
    var searchInfoWindow = null;
    searchInfoWindow = new BMapLib.SearchInfoWindow(map, content, {
        title  : "{{$arr['hotel_address']}}",      //标题
        width  : 290,             //宽度
        height : 105,              //高度
        panel  : "panel",         //检索结果面板
        enableAutoPan : true,     //自动平移
        searchTypes   :[
          BMAPLIB_TAB_SEARCH,   //周边检索
          BMAPLIB_TAB_TO_HERE,  //到这里去
          BMAPLIB_TAB_FROM_HERE //从这里出发
        ]
      });
      var marker = new BMap.Marker(poi); //创建marker对象
      marker.enableDragging(); //marker可拖拽
      marker.addEventListener("click", function(e){
        searchInfoWindow.open(marker);
      })
      map.addOverlay(marker); //在地图中添加marker
   
    function openInfoWindow3() {
      searchInfoWindow3.open(new BMap.Point(116.328852,40.057031)); 
    }
</script>

</html>
