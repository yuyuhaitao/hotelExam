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
	
		<h2>进行充值</h2><hr class="hr" />

		<table align="center" id="tab">
          <tr>
                <td></td>
                <td><h3 color="red">充值送积分</h3></td>
            </tr>
			<tr>
				<td class="tds">充值金额</td>
				<td><input type="text" id="je" /></td>
			</tr>

			<tr>
				<td class="tds">支付方式</td>
				<td><input type="radio" value="2" checked />支付宝支付</td>
			</tr>
		</table>
		<br />
			<div class="control-group tc">
         <a href="javascript:void(0)" id="button" style="padding-left:0px;padding-right: 0px;"  class="btn-large green button width80">提交</a>

  </div>
</div>
</body>
<script>
        $('#button').click(function(){
            var je=$('#je').val()
            if(je==''){
                alert("请填写金额")
                return;
            }
                window.location.href="Home_UserMoney?je="+je; 
        })


</script>
</html>
