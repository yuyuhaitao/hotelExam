<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>酒店列表</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="{{asset('Home/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{asset('Home/css/NewGlobal.css')}}" rel="stylesheet" />

<script type="text/javascript" src="{{asset('Home/js/zepto.js')}}"></script>

</head>
<body>
 <div class="header">
 <a href="/" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString">酒店设施</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

        
  <div class="container hotellistbg">
         <ul class="unstyled hotellist">
             <li>
                 <img class="hotelimg fl" src="{{$arr['hotel_id_img']}}" /> 
                 <div class="inline">
                     <h3>{{$arr['hotel_name']}}</h3>
                     <p>尊敬的客人您好,我店为您提供以下该服务:</p>
                 </div>
               
                 <div class="clear">
                    <center>
                      <p>@if($arr['is_wifi'])
                           <img src="Admin/hotel_details/p1.jpg" alt="" />
                         @endif  &nbsp;&nbsp;&nbsp;&nbsp;                      
                         @if($arr['is_elec'])
                           <img src="Admin/hotel_details/p2.jpg" alt="" />
                         @endif  &nbsp;&nbsp;&nbsp;&nbsp;
                      @if($arr['is_heat'])
                           <img src="Admin/hotel_details/p3.jpg" alt="" />
                         @endif  &nbsp;&nbsp;&nbsp;&nbsp;
                      @if($arr['is_bed'])
                           <img src="Admin/hotel_details/p4.jpg" alt="" />
                         @endif  &nbsp;&nbsp;&nbsp;&nbsp; 
                      @if($arr['is_air'])
                           <img src="Admin/hotel_details/p5.jpg" alt="" />
                         @endif  &nbsp;&nbsp;&nbsp;&nbsp;
                      @if($arr['is_card']==1)
                           <img src="Admin/hotel_details/p6.jpg" alt="" />
                         @endif</p>    
                    </center> 
                 </div>  
             </li>
           
           
         </ul>
  </div>


  <!--引入低部-->
    @include('home.footer')

</body>
</html>
