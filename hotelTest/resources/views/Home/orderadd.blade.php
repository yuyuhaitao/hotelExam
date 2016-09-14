<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单添加</title>
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
	<h4>订单详情</h4><hr class="hr" />
		<table align="center">
			<tr>
				<td class="tds">房型:</td>
				<td>{{$data['house_name']}}</td>
			</tr>
			<tr>
				<td class="tds">入住时间:</td>
				<td>{{$data['checkInDate']}}至{{$data['checkOutDate']}}</td>
			</tr>
			<tr>
				<td class="tds">房间数:</td>
				<td>
				<!--{循环房间数剩余库存}-->
				<select name="order_num" id="sel">
					@for ($i=1; $i <=$data['house_num'] ; $i++)
						@if($i<=5)
					<option value="{{$i}}">{{$i}}</option>
						@endif	
					@endfor
				</select>
				</td>
			</tr>
			<tr>
				<td class="tds">金额:</td>
				<td><input type="text" style="width:50px" readonly='readonly' name="prices" id='zj' value="{{$data['price']}}" />￥</td>
				<input type="hidden" id="dj" value="{{$data['price']}}" />
			</tr>
		</table>
		<br />
		<h4>入住信息</h4><hr class="hr" />
		<table align="center" id="tab">
			<tr>
				<td class="tds">房间1</td>
				<td><input type="text" name="guest[]" placeholder="入住人姓名" /></td>
			</tr>
			<tr>
				<td>联系电话</td>
				<td><input type="text" name="phone" placeholder="联系电话" /></td>
			</tr>
		</table>
		<br />
			<div class="control-group tc">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<input type="hidden" name="hotel_house_id" value="{{$data['hotel_house_id']}}" />
			<input type="hidden" name="hotel_id" value="{{$data['hotel_id']}}" />
			<input type="hidden" name="house_id" value="{{$data['house_id']}}" />
			<input type="hidden" name="start_time" value="{{$data['checkInDate']}}" />
			<input type="hidden" name="end_time" value="{{$data['checkOutDate']}}" />
			<input type="submit" class="btn-large green" value="提交" />
  </div>
  </form>
</div>
 
<script type="text/javascript">
	$("#sel").change(function(){
		var th=$(this)
		var zhi=th.val();
		var je=$('#dj').val();

		var zje=je*zhi
		var zj=$('#zj')
		zj.val(zje)
		var tab=$('#tab')

		var tb='';
			for(i=1;i<=zhi;i++){
				tb+="<tr>";
				tb+="<td class='tds'>房间"+i+"</td>";
				tb+="<td><input type='text' name='guest[]' placeholder='入住人姓名' /></td>";
				tb+="</tr>";
			}
			tb+="<tr>";
				tb+="<td class='tds'>联系电话</td>";
				tb+="<td><input type='text' name='phone' placeholder='联系电话' /></td>";
				tb+="</tr>";
			tab.html(tb)

	})
   </script>

</body>
</html>
