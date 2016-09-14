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
    <h4>确认信息</h4>
    <form action="{{ URL('Home_giftAdd') }}" method="post" onsubmit="return fun_all();">
        <table>
                    <tr>
                        <td>兑换人:</td>
                        <td>
                            <input type="hidden" value="{{ $arr[1]['u_id'] }}" name="u_id"/>
                            {{ $arr[1]['u_name'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>礼品名称:</td>
                        <td>
                            <input type="hidden" value="{{ $arr[0]['gift_id'] }}" name="gift_id"/>
                            {{ $arr[0]['gift_name'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>礼品图片:</td>
                        <td><img src="{{ $arr[0]['gift_img'] }}" width="50px" height="50px" alt=""/></td>
                    </tr>
                    <tr>
                        <td>需要积分:</td>
                        <td>
                            <input type="hidden" value="{{ $arr[0]['gift_price'] }}" name="gift_price"/>
                            {{ $arr[0]['gift_price'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>地址：</td>
                        <td>
                            <input type="text" name="address" onblur="fun();" id="i_address"/>
                            <span id="s_address"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>收货电话：</td>
                        <td> {{ $arr[1]['u_phone'] }} </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="确认"/><input type="reset" value="取消"/></td>
                    </tr>
        </table>
    </form>
</center>
</body>
</html>
<script>
    function fun(){
        var address = document.getElementById('i_address').value;
        var s_address = document.getElementById('s_address');
        if(address != '' && address!=0){
            s_address.innerHTML = "正确";
            return true;
        }else{
            s_address.innerHTML = "不能为空";
            return false;
        }
    }
//    alert(fun());
    function fun_all(){
        if(fun() == true){
            return true;
        }else{
            return false;
        }
    }
</script>