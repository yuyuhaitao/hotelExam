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
							<li class="active">角色管理</li>
							<li class="active">角色列表</li>
						</ul><!-- .breadcrumb -->
					</div>
			<div><a href="{{url('Admin_RoleAdd')}}" class="btn test">添加角色</a></div>
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
							<th>序号</th>
							<th>角色名称</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody id="tbody">
					
						@foreach($arr as $v)
						<tr>
							<td class="center">
								<label>
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</td>
							<td>{{$v['role_id']}}</td>
							<td>{{$v['role_name']}}</td>

							<td>
								<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
									<a class="red" href="#" >
										<i class="icon-zoom-in bigger-130"></i>
									</a>


									<a href="/Admin_RoleDefault?id={{$v['role_id']}}" class="green" >
										<i class="icon-pencil bigger-130"></i>
									</a>
									
									<a href="javascript:void(0)" class="del" pid="{{$v['role_id']}}">
										<i class="icon-trash bigger-130"></i>
									</a>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>

				</table>
			</div>
		</div>
	</div>
			<!--引入低部-->
			@include('admin.di')
</body>
<script>
//alert($);
	$('.del').click(function(){
		var role_id = $(this).attr('pid');
		//alert(role_id);
		$.get('Admin_RoleDel',{'role_id':role_id},function(msg){
			if(msg){
				window.location.href='/Admin_RoleList';
			}else{
				alert('该角色下存在用户,请先清理该角色下所有用户');
			}
		});
	});
</script>



</html>

	
