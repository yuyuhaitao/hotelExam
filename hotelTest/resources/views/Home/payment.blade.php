<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>支付页面</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="Home/css/bootstrap.min.css" rel="stylesheet" />
<link href="Home/css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="Admin/js/jquery.js"></script>

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
	<h4>订单详情</h4><hr class="hr" />
		<table align="center">
			<tr>
				<td class="tds">入住酒店:</td>
				<td>{{$data['hotel_name']}}</td>
			</tr>
			<tr>
				<td class="tds">酒店户型:</td>
				<td>{{$data['house_name']}}</td>
				<input type="hidden" id="dj" value="100" />
			</tr>
			<tr>
				<td class="tds">金额:</td>
				<td><span id='zj'><font color="red">{{$data['prices']}}￥</font></span></td>

			</tr>
		</table>
		<br />
		<h4>支付方式</h4><hr class="hr" />

		<table align="center" id="tab">
			<tr>
				<td class="tds">支付方式</td>
				<td>
				@if($data['u_money']<$data['prices'])
					<input type="radio" value='1' name="pay" disabled="disabled" />余额支付&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="red">可用余额：{{$data['u_money']}}￥</font></span><br />
				@else
					<input type="radio" name="pay" value='1'/>余额支付&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="green">可用余额：{{$data['u_money']}}￥</font></span><br />
				@endif
					<input type="radio" name="pay" value="2" checked="checked" />支付宝支付
				</td>
			</tr>
		</table>
		<br />
			<div class="control-group tc">
			<input type="hidden" id="hotel_house_id" value="{{$data['hotel_house_id']}}" />
			<input type="hidden" id="prices" value="{{$data['prices']}}" />
			<input type="hidden" id="order_num" value="{{$data['order_num']}}" />
			<input type="hidden" id="order_id" value="{{$data['order_id']}}" />
			<button style="padding-left:0px;padding-right: 0px;"  class="btn-large green button width80">提交</button>

  </div>
</div>
 <script>
 	$(':button').click(function(){
 		pay=$('input:radio:checked').val();
 		hotel_house_id=$('#hotel_house_id').val();
 		order_num=$('#order_num').val();
 		prices=$('#prices').val();
 		order_id=$('#order_id').val();
 		if (pay==1) {
 			if(window.confirm('是否支付')) {
 			$.get('Home_balance',{'prices':prices,'hotel_house_id':hotel_house_id,'order_num':order_num,'order_id':order_id},function(msg){
 				if (msg) {
 					alert('付款成功');window.location.href='Home_Orderlist';
 				}
 			})
	 		}
 		}else{
 			if(window.confirm('是否支付')) {
 			window.location.href='Home_Alipay?prices='+prices+'&hotel_house_id='+hotel_house_id+'&order_num='+order_num+'&order_id='+order_id;
	 		}
 		}
 	})
 </script>

</body>
</html>
