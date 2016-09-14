<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>微酒店</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    </head>

    <body id="tab"> 
    <!--引入顶部-->
            @include('admin.main')
<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">首页</a>
            </li>
            <li class="active">网站配置</li>
            <li class="active">文章详情</li>
        </ul><!-- .breadcrumb -->
    </div>
    <button class="btn btn-lg btn-success" onclick="window.location.href='Admin_article'">
        <i class="icon-ok"></i>
        活动文章列表
    </button>
    <div class="page-content">
        <div id="l_content" style="margin-bottom: 20px;">
            <center>
                <h2><a href="javascript:void(0)">{{ $arr['article_title'] }}</a></h2>
                <h5>发表时间：{{ $arr['article_time'] }}</h5>
               <img width="350" src="{{ $arr['article_img'] }}"><br/>

               <div style="margin-top:25px;width:580px;"><font size="3"><?php echo $arr['article_content'];?></font></div>
            </center>
            
        </div >
        <!--引入低部-->
        @include('admin.di')             
</body>
</html>

