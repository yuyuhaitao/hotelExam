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
							<li class="active">用户管理</li>
							<li class="active">用户列表</li>
						</ul><!-- .breadcrumb -->
					</div>
			<div><a href="{{url('Admin_poweradd')}}" class="btn test">添加权限</a></div>
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
							<th>权限名称</th>
							<th>权限等级</th>
							<th>所属控制器</th>
							<th>路由</th>
							<th>操作</th>
						</tr>
					</thead>
					@foreach($arr as $key=>$v)
					<tbody>
						<tr>
							<td class="center">
								<label>
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</td>
							<td>{{$v['pri_id']}}</td>
							<td>{{$v['pri_name']}}</td>
							<td>
							@if($v['f_id']==0)
								一级权限
							@else
								二级权限
							@endif
							</td>
							<td>{{$v['pri_controller']}}</td>
							<td>{{$v['pri_action']}}</td>
							<td>
								<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
									<a class="red" href="Admin_powerdel?id={{$v['pri_id']}}">
										<i class="icon-trash bigger-130"></i>
									</a>
								</div>
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
				<div class="center"><?php echo $arr->render(); ?></div>
			</div>
		</div>
	</div>
			<!--引入低部-->
			@include('admin.di')
</body>
</html>

	