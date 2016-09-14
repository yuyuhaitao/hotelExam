<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>酒店列表</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="{{asset('Home/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{asset('Home/css/NewGlobal.css')}}" rel="stylesheet" />

<script type="text/javascript" src="{{asset('Admin/js/jquery.js')}}"></script>

</head>
<body>
 <div class="header">
 <a href="/" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString">酒店列表</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

        
  <div class="container hotellistbg">
         <ul class="unstyled hotellist">
            @foreach($arr as $v)
             <li>
                 <img class="hotelimg fl" src="{{$v['hotel_id_img']}}" /> 
              <div class="inline">
                  <h3>{{$v['hotel_name']}}</h3>
                  <p>{{$v['hotel_address']}}</p>
                  <p>评分：4.6 （1200人已评)
              
                      @if(!empty($v['sc']))
                      <img src="Home/img/pjxx.png" sc="{{$v['hotel_id']}}" val="2" title="取消收藏" class="collect" width="40px" height="40px" style="float:right" alt="" />
                      @else
                      <img src="Home/img/pjw.png" sc="{{$v['hotel_id']}}" val="1" title="加入收藏" class="collect" width="40px" height="40px" style="float:right" alt="" />
                      @endif
                  
                  </p>
              </div>
              <div class="clear"></div>  
               <ul class="unstyled">
                   <li><a href="/Home_hotel?id={{$v['hotel_id']}}" class="order">预订</a></li>
                   <li><a href="/Home_hotelmap_road?id={{$v['hotel_id']}}" class="gps">导航</a></li>
                   <li><a href="/Home_hotelservice?id={{$v['hotel_id']}}" class="reality">设施</a></li>
               </ul>
             </li>
            @endforeach
  
           <input type="hidden" value="{{$u_id}}" id="u_id" />
         </ul>
  </div>


  <!--引入低部-->
    @include('home.footer')
</body>
<script>
  $('.collect').click(function(){
    var u_id=$('#u_id').val();
      if(u_id==''){
        alert("请先登录");window.location.href='Home_login';
        return;
      }
   

   var  hotel_id=$(this).attr("sc");
   var  val=$(this).attr("val");
   if (val==1) {

      $.get('Home_collectadd',{'hotel_id':hotel_id},function(msg){
          window.location.reload();
        })
   }else{
      $.get('Home_collectdel',{'hotel_id':hotel_id},function(msg){
          window.location.reload();
        })
   }
       
  })
</script>
</html>
