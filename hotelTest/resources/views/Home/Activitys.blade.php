
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>最新活动</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" /><link href="home/css/bootstrap.min.css" rel="stylesheet" />
<link href="home/css/NewGlobal.css" rel="stylesheet" />
<script type="text/javascript" src="home/js/zepto.js"></script>
<script type="text/javascript" src="home/js/jquery1.42.min.js"></script>
<script type="text/javascript" src="home/js/jquery.SuperSlide.2.1.1.js"></script>
</head>
<body>
    <style type="text/css">
        /* css 重置 */
        *{margin:0; padding:0; list-style:none; }
        body{ background:#fff; font:normal 12px/22px 宋体;  }
        img{ border:0;  }

        /* 本例子css */
        .slideBox{ width:100%; height:380px; overflow:hidden; position:relative;}
        .slideBox .hd{ height:15px; overflow:hidden; position:absolute; right:5px; bottom:5px; z-index:1; margin-right:23px;}
        .slideBox .hd ul{ overflow:hidden; zoom:1; float:left;  }
        .slideBox .hd ul li{ float:left; margin-right:2px;  width:15px; height:15px; line-height:14px; text-align:center; background:#fff; cursor:pointer; }
        .slideBox .hd ul li.on{ background:#f00; color:#fff; }
        .slideBox .bd{ position:relative; height:100%; z-index:0; }
        .slideBox .bd ul{ margin: 0; }
        .slideBox .bd li{ zoom:1; vertical-align:middle; }
        .slideBox .bd img{ width:100%; height:380px; display:block;  }

        /* 下面是前/后按钮代码，如果不需要删除即可 */
        .slideBox .prev,
        .slideBox .next{ position:absolute; left:3%; top:50%; margin-top:-25px; display:block; width:32px; height:40px; background:url(home/img/slider-arrow.png) -110px 5px no-repeat; filter:alpha(opacity=50);opacity:0.5; }
        .slideBox .next{ left:auto; right:3%; background-position:8px 5px; }
        .slideBox .prev:hover,
        .slideBox .next:hover{ filter:alpha(opacity=100);opacity:1;  }
        .slideBox .prevStop{ display:none;  }
        .slideBox .nextStop{ display:none;  }

    </style>
 <div class="header">
 <a href="{{url('/')}}" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString">最新活动</div>
<a href="javascript:window.history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

        
    <div id="slideBox" class="slideBox">
        <div class="hd">
            <ul>
                @foreach($arr as $k => $v)
                    <li>{{ $k+1 }}</li>
                @endforeach
            </ul>
        </div>
        <div class="bd">  
            <ul>
                @foreach($arr as $k => $v)
                <li>
                    <br />
                    <center><a href="Home_ActInfo?id={{ $v['article_id'] }}"><font size="4">{{ $v['article_title'] }}</font></a></center>
                    <br />
                    <a href="Home_ActInfo?id={{ $v['article_id'] }}"><img src="{{ $v['article_img'] }}" /></a>
                </li>
                @endforeach
            </ul>

        </div>

        <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
        <a class="prev" href="javascript:void(0)"></a>
        <a class="next" href="javascript:void(0)"></a>

    </div>
    <br />
    <br />

    <!--引入低部-->
    @include('home.footer')

  <script type="text/javascript">
    jQuery(".slideBox").slide({mainCell:".bd ul",autoPlay:true});
  </script>

</body>
</html>
