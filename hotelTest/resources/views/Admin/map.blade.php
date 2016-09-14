<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>微测评</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<style type="text/css">
			body, html{width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
			#l-map{height:300px;width:100%;}
			#r-result{width:100%; font-size:14px;line-height:20px;}
		</style>
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=01OZhroLNa4cugllo3BgM8l2s15Guwsq"></script>
		<script src="{{asset('Admin/js/jquery.js')}}"></script>
		</head>
<style>
	.btn {
	 BORDER-RIGHT: #7EBF4F 1px solid; PADDING-RIGHT: 2px; BORDER-TOP:
	#7EBF4F 1px solid; PADDING-LEFT: 2px; FONT-SIZE: 12px; FILTER:
	progid:DXImageTransform.Microsoft.Gradient(GradientType=0,
	StartColorStr=#ffffff, EndColorStr=#B3D997); BORDER-LEFT: #7EBF4F
	1px solid; CURSOR: hand; COLOR: black; PADDING-TOP: 2px;
	BORDER-BOTTOM: #7EBF4F 1px solid
}
</style>

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
								<a href="/Admin_index">首页</a>
							</li>
							<li class="active">酒店管理</li>
							<li class="active">地图添加</li>
						</ul><!-- .breadcrumb -->
					</div>
				
					<div class="page-content">

						<div class="row">
							<div class="col-xs-12">
								<div id="l-map"></div>
								<div id="r-result">
									<input type="hidden" name="id" value="{{$arr['hotel_id']}}">
									<input type="button" value="点击添加地图坐标" onclick="bdGEO()" />
									<div id="result"></div>
								</div>		
							</div>
						</div>
					</div>
				</div>
						
			<!--引入低部-->
			@include('admin.di')
					
				
			



</body>
<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("l-map");
	map.centerAndZoom(new BMap.Point(116.250201,39.903697), 13);
	map.enableScrollWheelZoom(true);
	var index = 0;
	var myGeo = new BMap.Geocoder();
	var adds = [
		"{{$arr['hotel_address']}}"
	];
	function bdGEO(){
		var add = adds[index];
		geocodeSearch(add);
		index++;
	}
	function geocodeSearch(add){
		if(index < adds.length){
			setTimeout(window.bdGEO,400);
		} 
		myGeo.getPoint(add, function(point){
			if (point) {
				//alert(point.lng);
				var PLN = point.lng;
				var PLA = point.lat;
				var id = $('input[name="id"]').val();
				//alert(PLA); 
				$.get('/Admin_Mapadd',{'PLN':PLN,'PLA':PLA,'id':id},function(msg){
					//alert(msg);
					if(msg){
						alert('添加成功');
						window.location.href = "/Admin_Hotel";
					}
				});				
			}
		}, "{{$arr['city_name']}}");
	}
	// 编写自定义函数,创建标注
	function addMarker(point,label){
		var marker = new BMap.Marker(point);
		//alert(point);
		map.addOverlay(marker);
		marker.setLabel(label);
	}
</script>

</html>

