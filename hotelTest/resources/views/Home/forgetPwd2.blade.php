<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>忘记密码</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="Home/css/bootstrap.min.css" rel="stylesheet" />
<link href="Home/css/NewGlobal.css" rel="stylesheet" />
<link type="text/css" href="Home/css/css.css" rel="stylesheet" />
<script type="text/javascript" src="Home/js/zepto.js"></script>

</head>
<body>
 <div class="header">
 <a href="{{url('/')}}" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString">忘记密码</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>  
    <div class="container width80 pt20">
     <div class="for-liucheng">
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liulist"></div>
      <div class="liulist "></div>
      <div class="liutextbox">
        <div class="liutext for-cur"><em>1</em><br /><strong>填写账户名</strong></div>
       <div class="liutext for-cur"><em>2</em><br /><strong>验证身份</strong></div>
       <div class="liutext"><em>3</em><br /><strong>设置新密码</strong></div>
       <div class="liutext"><em>4</em><br /><strong>完成</strong></div>
      </div>
     </div><!--for-liucheng/-->
      <div class="forget-pwd">
       <dl>
        <dt>邮箱验证：</dt>
        <dd><input type="email" id="email" /><button id="butt">发送</button></dd>
        <div class="clears"></div>
       </dl>
       <dl class="sel-yzyx">
        <dt>验证码：</dt>
        <dd><input type="text" id="codes" /></dd>
        <div class="clears"></div>
       </dl>
       <div class="subtijiao"><input type="button" id="sub" value="提交" /></div> 
      </div>
  </div>
</body>
</html>
<script type="text/javascript" src="Admin/js/jquery.js"></script>
<script>
  $('#butt').click(function(){
    var email=$('#email').val();
    $.get('Home_forgetpwdeml',{'email':email},function(msg){
      if (msg) {
        alert(msg);
      };
    })
  })
  $('#sub').click(function(){
   var codes=$('#codes').val();
   $.get('Home_forgetpwdone',{'codes':codes},function(ms){
      if (ms==1) {
       location.href='Home_forgetpwdtwo';
      }else{
        alert(ms); 
      }
    })
  })
</script>