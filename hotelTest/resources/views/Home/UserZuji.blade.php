<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>我的格子</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <link href="/Home/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/Home/css/NewGlobal.css" rel="stylesheet" />
        <link rel="stylesheet" href="Admin/css/ace-skins.min.css" />
        <link rel="stylesheet" href="Admin/css/ace.min.css" />
		<link rel="stylesheet" href="Admin/css/ace-rtl.min.css" />
        <link href="/Home/css/user.css" rel="stylesheet" />
        <script type="text/javascript" src="/Home/js/zepto.js"></script>

    </head>
    
    <body>
        <div class="header">
            <a href="/" class="home">
                <span class="header-icon header-icon-home"></span>
                <span class="header-name">主页</span></a>
            <div class="title" id="titleString">我的格子</div>
            <a href="javascript:history.go(-1);" class="back">
                <span class="header-icon header-icon-return"></span>
                <span class="header-name">返回</span></a>
        </div>
      							<div class="timeline-container timeline-style2">
												<span class="timeline-label">
													<b><font color="#4B0082">{{$name}}</font></b>
												</span>

												<div class="timeline-items">
												@foreach($date as $v)
													<div class="timeline-item clearfix">
														<div class="timeline-info">
															<span class="timeline-date"><font color="#008080">{{$v['end_time']}}</font></span>

															<i class="timeline-indicator btn btn-info no-hover"></i>
														</div>

														<div class="widget-box transparent">
															<div class="widget-body">
																<div class="widget-main no-padding">
																	<span class="bigger-110">
																	<font color="#8A2BE2">{{$v['city_name']}}</font>
																	</span>

																	<br />
																	<i class="icon-hand-right grey bigger-125"></i>
																	<font color="#8A2BE2">{{$v['hotel_name']}}</font>
																</div>
															</div>
														</div>
													</div>
												@endforeach
													
												</div><!-- /.timeline-items -->
        <!--引入低部-->
        @include('home.footer')
    </body>
        	
		</script>
</html>