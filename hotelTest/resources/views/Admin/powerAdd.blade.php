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
							<li class="active">用户添加</li>
						</ul><!-- .breadcrumb -->
					</div>
				<div><a href="{{url('Admin_powerlist')}}" class="btn test">权限列表</a></div>
					<div class="page-content">

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" action="Admin_poweradd" method="post">
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">权限名称 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" name="pri_name" placeholder="Username" class="col-xs-10 col-sm-5" />
											<font color="red"><?php echo $errors->first('pri_name'); ?></font>
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">父级权限 </label>

										<div class="col-sm-9">
											<select name="f_id" id="">
												<option value="0">顶级权限</option>
												@foreach ($arr as $key => $v)
												<option value="{{$v['pri_id']}}">{{$v['pri_name']}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="space-4">
									<input type="hidden" name="_token" value="{{csrf_token()}}"/>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 控制器名称 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" name="pri_controller" placeholder="Controller" class="col-xs-10 col-sm-5" />
											<font color="red"><?php echo $errors->first('pri_controller'); ?></font>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 路由名称 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" name="pri_action" placeholder="Route" class="col-xs-10 col-sm-5" />
											<font color="red"><?php echo $errors->first('pri_action'); ?></font>
										</div>
									</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												添加
											</button>
											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
										</div>
									</div>
											</div>
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
			<!--引入低部-->
			@include('admin.di')
					
				
			



</body>
</html>

