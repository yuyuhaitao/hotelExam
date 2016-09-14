<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>仿格子微酒店触屏版html5手机wap旅游网站模板下载帮助咨询</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="home/css/bootstrap.min.css" rel="stylesheet" />
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
        .js{width:90%; margin:10px auto 0 auto; }
        .js p{ padding:5px 0; font-weight:bold; overflow:hidden;  }
        .js p span{ float:right; }
        .js p span a{ color:#f00; text-decoration:underline;   }
        .js textarea{ height:50px;  width:98%; padding:5px; border:1px solid #ccc; border-top:2px solid #aaa;  border-left:2px solid #aaa;  }


        /* 本例子css */
        .sideMenu h3{ height:32px; line-height:32px; padding-left:10px;  border-top:1px solid #e3e3e3; background:#f4f4f4; cursor:pointer;
          font:normal 14px/32px "Microsoft YaHei";
        }
        .sideMenu h3 em{ float:right; display:block; width:40px; height:32px;   background:url(images/icoAdd.png) 16px 12px no-repeat; cursor:pointer; }
        .sideMenu h3.on em{ background-position:16px -57px; }
        .feng { padding:8px 25px; color:#999; display:none; /* 默认都隐藏 */ }
    </style>

 <div class="header">
 <a href="{{url('/')}}" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString">帮助咨询</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

    <div class="sideMenu" style="margin:0 auto">
    <span style="margin-left:15px"><a href="javascript:void(0)"><font size="3">常见问题列表</font></a></span>
    @foreach($arr as $k => $v)
      <h3><em></em>{{ $v['help_title'] }}</h3>
      <div class="feng">
          <?php echo $v['help_content']?> 
      </div>
    @endforeach
    <a href="Home_Helpman">不能解决您的问题？联系客服</a>
    </div>

    
    <!--引入低部-->
    @include('home.footer')

</body>
</html>
<script type="text/javascript">
    jQuery(".sideMenu").slide({
        titCell:"h3", //鼠标触发对象
        targetCell:".feng", //与titCell一一对应，第n个titCell控制第n个targetCell的显示隐藏
        effect:"slideDown", //targetCell下拉效果
        trigger:"click",//点击效果
        delayTime:300 , //效果时间
        triggerTime:150, //鼠标延迟触发时间（默认150）
        defaultPlay:true,//默认是否执行效果（默认true）
        
    });
</script>

