<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>仿格子微酒店触屏版html5手机wap旅游网站模板下载帮助咨询</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="home/css/bootstrap.min.css" rel="stylesheet" />
<link href="home/css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="home/js/zepto.js"></script>
<script type="text/javascript" src="home/js/jquery.js"></script>

</head>
<body>

 <div class="header">
 <a href="{{url('/')}}" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString">帮助咨询</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

        
    <div class="container width90 pt20">
        <div class="control-group">

            @if(!empty($arr))
                <a href="Home_Help">常见问题列表</a>
                <p style="float:right"><a href="Home_Uquestion">我的历史问题</a></p>
                <br />
                <br />
            @else
                <p><a href="Home_Help">常见问题列表</a></p>
                <br />
            @endif
            
            <span><a href="javascript:void(0)"><font size="3">向客服提问：</font></a></span>
            <input name="question" type="text" id="question" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入你的问题" />
            <span id='sp'></span>
        </div>
        <div class="control-group">
            <button onClick="submits()" id="ctl00_ContentPlaceHolder1_btnOK" class="btn-large green button width100">提交</button>
        </div>
        
    </div>



    <!--引入低部-->
    @include('home.footer')

</body>
</html>
<script>
    function submits(){
        var question = $('input[name="question"]').val();
        if(question==''){
            $('#sp').html("<font color='red'>请输入你的问题</font>");
        }else{
            $.get("Home_Question",{'question':question},function(msg){
                if(msg==0){
                    alert('请先登陆');window.location.href='Home_login';
                }else if(msg==1){
                    alert('提问成功，将在一至两天给您答复');
                    window.location.reload();
                }else if(msg==3){
                    alert('一天内最多提问3次');
                }
            })
        }
    }
</script>
