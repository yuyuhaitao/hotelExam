<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>微测评</title>
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
							<li class="active">地区管理</li>
							<li class="active">地区列表</li>
						</ul><!-- .breadcrumb -->
					</div>
					<a href="/Admin_RegionAdd"><button class="btn btn-primary">
					<i class="icon-beaker align-top bigger-125"></i>
					<font id="OUTFOX_JTR_TRANS_NODE-116" class="OUTFOX_JTR_TRANS_NODE" rel="116">添加地区 </font>
				
					</button>
					</a>
			<div class="table-responsive">
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th class="center">
								<label>
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</th>
							<th>编号</th>
							<th class="hidden-480">地区</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
					@foreach($data as $v)
						<tr>
							<td class="center">
								<label>
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</td>

							<td>
								<a href="#">{{ $v['city_id'] }}</a>
							</td>
							<td>{{ $v['city_name'] }}</td>
							<td>


									<a class="red" href="/Admin_RegionDel?id={{ $v['city_id'] }}">
										<i class="icon-trash bigger-130"></i>
									</a>
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

	
