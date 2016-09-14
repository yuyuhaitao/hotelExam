<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>仿格子微酒店触屏版html5手机wap旅游网站模板下载帮助咨询</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="home/css/bootstrap.min.css" rel="stylesheet" />
<link href="home/css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="js/zepto.js"></script>

</head>
<body>

 <div class="header">
 <a href="{{url('/')}}" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString">最新活动</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

        
    <div class="container width90 pt20">
        <center>
            <h4><a href="javascript:void(0)">{{ $arr['article_title'] }}</a></h4>
            <h5>活动截止日期：{{ $arr['end_date'] }}</h5>
           <img width="350" src="{{ $arr['article_img'] }}"><br/>

           <div style="margin-top:25px;width:100%;"><font size="3"><?php echo $arr['article_content'];?></font></div>
        </center>
    </div>
    <br />

    <!--引入低部-->
    @include('home.footer')

</body>
</html>
