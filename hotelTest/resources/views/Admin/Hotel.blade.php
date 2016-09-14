<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>酒店列表</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	</head>


	<body>	
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
							<li class="active">酒店管理</li>
							<li class="active">酒店列表</li>
						</ul><!-- .breadcrumb -->
					</div>
					<a href="/Admin_HotelAdd"><button class="btn btn-primary">
					<i class="icon-beaker align-top bigger-125"></i>
					<font id="OUTFOX_JTR_TRANS_NODE-116" class="OUTFOX_JTR_TRANS_NODE" rel="116">添加酒店 </font>
				
					</button>
					</a>
			<div class="table-responsive">
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							
							<th>编号</th>
							<th class="hidden-480">酒店名称</th>
							<th class="hidden-480">所在城市</th>
						
							<th>酒店套图</th>
							<th class="hidden-480">酒店户型</th>
							<th class="hidden-480">酒店详情</th>
							<th class="hidden-480">添加地图</th>
							<th class="hidden-480">删除</th>
						</tr>
					</thead>
					<tbody>
					@foreach($data as $v)
						<tr>

							<td>
								<a href="#">{{ $v['hotel_id'] }}</a>
							</td>
							<td>{{ $v['hotel_name'] }}</td>
							<td class="hidden-480">
								{{$v['city_name']}}
							</td>
							
							<td>
							<a href="/Admin_HotelPhoto?id={{ $v['hotel_id'] }}"><i class="icon-camera-retro"></i>&nbsp;图片</a>
							</td>
							<td class="hidden-480">
								<a href="/Admin_HotelHouse?id={{ $v['hotel_id'] }}"><i class="icon-home "></i>&nbsp;户型</a>
							</td>
							<td>
								<a class="blue" href="/Admin_HotelDetails?id={{ $v['hotel_id'] }}">
								<i class="icon-zoom-in bigger-130"></i>&nbsp;详情
								</a>
							</td>
							<td class="hidden-480">
								<a href="/Admin_Map?id={{ $v['hotel_id'] }}"><i class="icon-home "></i>&nbsp;点击添加地图</a><font color="red">(注意:地图添加后前台才能导航)</font>
							</td>
							<td>
								@if( $v['hotel_close']  == 0)
								<a class="red" href="/Admin_HotelCloses?id={{ $v['hotel_id'] }}">
									<i class="icon-legal"></i>&nbsp;关店
								</a>
								@else
										关店中···
								@endif
								</div>

					
							</td>
						</tr>
						@endforeach
				
					</tbody>
				</table>		<div align="center"><?php echo $data->render(); ?></div>
			</div>
		</div>
	</div>
			<!--引入低部-->
			@include('admin.di')
</body>
</html>

	
