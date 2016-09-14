<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>酒店正文</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="Home/css/bootstrap.min.css" rel="stylesheet" />
<link href="Home/css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="Home/js/zepto.js"></script>

    <style>
    	.tds{
    		width: 80px;
    		height: 50px;
    	}
    	.hr{
    		color:#000000;
    	}
    </style>
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

 <div class="container">
 <form action="Home_orders" method="post">
	<h4>订单详情&nbsp;&nbsp;<font size="2" color="blue">{{ $arr['order_status'] }}</font></h4><hr class="hr" />
		<table align="center">
			<tr>
				<td class="tds">酒店:</td>
				<td>{{ $arr['hotel_name'] }}</td>
			</tr>
			<tr>
				<td class="tds">房型:</td>
				<td>{{ $arr['house_name'] }}</td>
			</tr>
			<tr>
				<td class="tds">入住时间:</td>
				<td>{{ $arr['start_time'] }}至{{ $arr['end_time'] }}</td>
			</tr>
			<tr>
				<td class="tds">房间数:</td>
				<td>{{ $arr['order_num'] }}</td>
			</tr>
			<tr>
				<td class="tds">金额:</td>
				<td>{{ $arr['prices'] }}</td>
			</tr>
			<tr>
				<td class="tds">入住人姓名:</td>
				<td>{{ $arr['guest'] }}</td>
			</tr>
			<tr>
				<td class="tds">联系电话:</td>
				<td>{{ $arr['phone'] }}</td>
			</tr>
			<tr>
				<td class="tds">下单时间:</td>
				<td>{{ $arr['pay_time'] }}</td>
			</tr>
		</table>
		<br />	
		<!--引入低部-->
    	@include('home.footer')
  </form>
</div>

</body>
</html>
