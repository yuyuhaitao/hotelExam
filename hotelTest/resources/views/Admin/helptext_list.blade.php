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
							<li class="active">帮助咨询</li>
							<li class="active">图文咨询</li>
						</ul><!-- .breadcrumb -->
					</div>
			<button class="btn btn-lg btn-success" onclick="window.location.href='Admin_helptextAdd'">
				<i class="icon-ok"></i>
				添加咨询
			</button>
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
							<th>常见问题</th>
							<th>解决方法</th>
							<th class="hidden-480"><i class="icon-time bigger-110 hidden-480"></i>发表时间</th>

							<th>操作</th>
						</tr>
					</thead>

					<tbody>
					@foreach($arr as $k => $v)
						<tr>
							<td class="center">
								<label>
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</td>

							<td>
								{{ $v['help_id'] }}</a>
							</td>
							<td><a href="javascript:void(0)">{{ $v['help_title'] }}</a></td>
							<td><?php echo $v['help_content']; ?></td>
							<td class="hidden-480">
								{{ $v['help_time'] }}
							</td>

							<td>
								<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
									<a class="green" href="{{ url('Admin_helptextEdit') }}?help_id={{ $v['help_id'] }}">
										<i class="icon-pencil bigger-130" title='编辑'></i>
									</a>

									<a class="red" href="{{ url('Admin_helptextDel') }}?help_id={{ $v['help_id'] }}">
										<i class="icon-trash bigger-130" title='删除'></i>
									</a>
								</div>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div align="center"><?php echo $arr->render(); ?></div>
			</div>
		</div>
	</div>
			<!--引入低部-->
			@include('admin.di')
</body>
</html>