<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>酒店简介</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="{{asset('Home/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{asset('Home/css/NewGlobal.css')}}" rel="stylesheet" />

<script type="text/javascript" src="{{asset('Home/js/zepto.js')}}"></script>

</head>
<body>
<style type="text/css">
    /* css 重置 */
    *{margin:0; padding:0; list-style:none; }
    body{ background:#fff; font:normal 12px/22px 宋体;  }
    img{ border:0;  }
    a{ text-decoration:none; color:#333;  }

    /* 本例子css */
    .slideBox{ width:470px; height:230px; overflow:hidden; position:relative; border:1px solid #ddd;  }
    .slideBox .hd{ height:15px; overflow:hidden; position:absolute; right:5px; bottom:5px; z-index:1; }
    .slideBox .hd ul{ overflow:hidden; zoom:1; float:left;  }
    .slideBox .hd ul li{ float:left; margin-right:2px;  width:15px; height:15px; line-height:14px; text-align:center; background:#fff; cursor:pointer; }
    .slideBox .hd ul li.on{ background:#f00; color:#fff; }
    .slideBox .bd{ position:relative; height:100%; z-index:0;   }
    .slideBox .bd li{ zoom:1; vertical-align:middle; }
    .slideBox .bd img{ width:470px; height:230px; display:block;  }

    /* 下面是前/后按钮代码，如果不需要删除即可 */
    .slideBox .prev,
    .slideBox .next{ position:absolute; left:3%; top:50%; margin-top:-25px; display:block; width:32px; height:40px; background:url(images/slider-arrow.png) -110px 5px no-repeat; filter:alpha(opacity=50);opacity:0.5;   }
    .slideBox .next{ left:auto; right:3%; background-position:8px 5px; }
    .slideBox .prev:hover,
    .slideBox .next:hover{ filter:alpha(opacity=100);opacity:1;  }
    .slideBox .prevStop{ display:none;  }
    .slideBox .nextStop{ display:none;  }

    </style>
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

        
     <script type="text/javascript" src="{{asset('Home/js/jquery1.42.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Home/js/jquery.SuperSlide.2.1.1.js')}}"></script>
    
<div class="container">
<ul class="unstyled hotel-bar">
  <li class="first">
    <a href="Home_hotel?id={{$row['hotel_id']}}">房型</a>
  </li>
  <li><a href="Home_hotelinfo?id={{$row['hotel_id']}}"  class="active">简介</a></li>
  <li><a href="Home_hotelmap?id={{$row['hotel_id']}}">地图</a></li>
  <li><a href="Home_HotelContent?id={{$row['hotel_id']}}">评论</a></li>
</ul>
<script type="text/javascript">
    $('#titleString').text($(document)[0].title);
</script>
  <div class="hotel-prompt ">
      <span class="hotel-prompt-title">酒店图片</span>
     
          <div id="slideBox" class="slideBox">
              <div class="hd">
                <ul><li>1</li><li>2</li><li>3</li></ul>
              </div>
              <div class="bd">
                <ul>
                @foreach($arr as $v)
                  <li><img src="{{$v['hotel_img']}}" /></li>
                @endforeach
                </ul>
              </div>
              <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
              <a class="prev" href="javascript:void(0)"></a>
              <a class="next" href="javascript:void(0)"></a>
          </div>  
          <script type="text/javascript">
              jQuery(".slideBox").slide({mainCell:".bd ul",effect:"left",autoPlay:true,trigger:"click",delayTime:700});
          </script>                   
      
  </div>
    <div id="hotelinfo" class="hotel-prompt ">
      <span class="hotel-prompt-title">酒店简介</span>
      <p>{{$row['hotel_info']}}</p>
            <p>地址：{{$row['hotel_address']}}</p>
            <p>电话：{{$row['hotel_phone']}}</p>
    </div>
</div>

<script>
    //创建slider组件
    $('#slider').slider({ imgZoom: true });
</script>


  <!--引入低部-->
    @include('home.footer')

</body>
</html>
