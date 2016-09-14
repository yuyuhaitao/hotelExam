<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>微测评</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
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
								<a href="#">首页</a>
							</li>
							<li class="active">订单管理</li>
							<li class="active">订单列表</li>
						</ul><!-- .breadcrumb -->
					</div>
			<div class="table-responsive">
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>订单号</th>
							<th>所属酒店</th>
							<th>户型</th>
							<th>订单状态</th>
							<th>开始时间</th>
							<th>结束时间</th>
							<th>下单时间</th>
						
							<th>价格</th>
							<th>客户联系方式</th>
						</tr>
					</thead>
					<tbody id="tbody">
						@foreach($arr as $v)
						<tr>
							<td>{{$v['order_num']}}</td>
							<td>{{$v['hotel_name']}}</td>
							<td>{{$v['house_name']}}</td>
							<td>{{$v['order_status']}}</td>
							<td>{{$v['start_time']}}</td>
							<td>{{$v['end_time']}}</td>	
							<td>{{$v['pay_time']}}</td>	
					
							<td>{{$v['price']}}</td>	
							<td>{{$v['phone']}}</td>	
						</tr>
						@endforeach
					</tbody>
		
				</table>
				<center>{!! $arr->render() !!}</center>
			</div>
		</div>
	</div>
			<!--引入低部-->
			@include('admin.di')
</body>




</html>

	
