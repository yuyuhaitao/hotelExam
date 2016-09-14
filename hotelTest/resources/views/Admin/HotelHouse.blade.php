<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>{{$name}}户型</title>
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
							<li class="active">酒店列表</li>
							<li class="active">户型列表</li>
						</ul><!-- .breadcrumb -->
					</div>
					<a href="/Admin_HotelHouseAdd?hotel_id={{$id}}"><button class="btn btn-primary">
					<i class="icon-beaker align-top bigger-125"></i>
					<font id="OUTFOX_JTR_TRANS_NODE-116" class="OUTFOX_JTR_TRANS_NODE" rel="116">添加户型 </font>
				
					</button>
					</a>
			<div class="table-responsive">
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							
							<th>编号</th>
							<th class="hidden-480">户型名称</th>
							<th class="hidden-480">户型价格</th>						
							<th>户型图片</th>
							<th class="hidden-480">删除</th>
						</tr>
					</thead>
					<tbody>
					@foreach($data as $v)
						<tr>

							<td>
								<a href="#">{{ $v['hotel_house_id'] }}</a>
							</td>
							<td>{{ $v['house_name'] }}</td>
							<td class="hidden-480">
								<FONT color='red'>{{$v['price']}}元</FONT>
							</td>
							
							<td>
								<img src="{{$v['house_img']}}" height="80" width="80" alt="{{$name}}{{$v['house_name']}}">
							</td>
							<td>

								<a class="red" href="javascript:sj()">
									<i class="icon-trash bigger-130"></i>&nbsp;删除
								</a>

								</div>

					
							</td>
						</tr>
						@endforeach
				
					</tbody>
				</table>		<div align="center"><?php echo $data->appends(['id'=>$id])->render(); ?></div>
			</div>
		</div>
	</div>
			<!--引入低部-->
			@include('admin.di')
</body>
<script>
		function sj(){
			alert("户型下有订单不能删除")
		}

</script>
</html>

	
