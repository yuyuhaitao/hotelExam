<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>礼品商城</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <link href="{{ asset('/Home/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/Home/css/NewGlobal.css') }}" rel="stylesheet" />
    <script src="{{ asset('Admin/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/Home/js/zepto.js') }}"></script>

</head>
<body id="content">
<div class="header">
    <a href="index.html" class="home">
        <span class="header-icon header-icon-home"></span>
        <span class="header-name">主页</span>
    </a>
    <div class="title" id="titleString">礼品商城</div>
    <a href="javascript:history.go(-1);" class="back">
        <span class="header-icon header-icon-return"></span>
        <span class="header-name">返回</span>
    </a>
</div>
<center>
        <h4>历史兑换</h4>
        <hr />
        <table border="1">
            <th>礼品名称</th>
            <th>是否支付</th>
            <th>收货地址</th>
            <th>兑换时间</th>
            <th>操作</th>
            <?php
                foreach($arr as $v){
            ?>
                <tr>
                    <td>{{ $v['gift_name'] }}</td>
                    <td><?php  if($v['is_pay'] == 1){ echo "已支付";}else{ echo "未支付";}?></td>
                    <td>{{ $v['address'] }}</td>
                    <td>{{ $v['pay_time'] }}</td>
                    <td><a href="0">删除</a></td>
                </tr>
            <?php
                }
            ?>
            <tr>
            </tr>
        </table>
</center>
</body>
</html>