<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>注册</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <link href="Home/css/bootstrap.min.css" rel="stylesheet" />
        <link href="Home/css/NewGlobal.css" rel="stylesheet" />
        <script type="text/javascript" src="Home/js/zepto.js"></script>
    </head>
    
    <body>
        <div class="header">
            <a href="{{url('/')}}" class="home">
                <span class="header-icon header-icon-home"></span>
                <span class="header-name">主页</span></a>
            <div class="title" id="titleString">注册</div>
            <a href="javascript:history.go(-1);" class="back">
                <span class="header-icon header-icon-return"></span>
                <span class="header-name">返回</span></a>
        </div>
        <div class="container width80 pt20">
            <form name="aspnetForm" method="post" action="Home_register" id="aspnetForm" class="form-horizontal">
                <div class="control-group">
                    <input name="u_name" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入用户名" />
                    <font color="red"><?php echo $errors->first('u_name'); ?></font>
                </div>
                <div class="control-group">
                    <input name="u_pwd" type="password" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入密码" />
                    <font color="red"><?php echo $errors->first('u_pwd'); ?></font>
                </div>
                <div class="control-group">
                    <input name="u_phone" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入手机号" />
                    <font color="red"><?php echo $errors->first('u_phone'); ?></font>
                </div>
                 <div class="control-group">
                    <input name="u_email" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入邮箱" />
                    <font color="red"><?php echo $errors->first('u_email'); ?></font>
                </div>
                <div class="control-group">
                    <input name="u_card" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入身份证号码" />
                    <font color="red"><?php echo $errors->first('u_card'); ?></font>
                </div>
                <div class="control-group">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <button type="submit" class="btn-large green button width100">立即注册</button>
                    </div>
                <div class="control-group">已有账号？
                    <a href="{{url('Home_login')}}" id="ctl00_ContentPlaceHolder1_RegBtn">立即登录</a></div>
            </form>
        </div>
        <!--引入低部-->
    @include('home.footer')
    </body>

</html>