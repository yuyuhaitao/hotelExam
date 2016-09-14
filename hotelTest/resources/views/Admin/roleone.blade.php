<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>微测评</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
	</head>


	<body id="tab">	
	<!--引入顶部-->
	@include('admin.main');

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
				<li class="active">角色添加</li>
			</ul><!-- .breadcrumb -->
		</div>
				
		<div class="col-xs-12">
			<div><h1></h1></div>
			<form class="form-horizontal" action="/Admin_RoleSave" method="post" role="form" >
				@foreach($arr as $k=>$v)
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色名称 </label>

					<div class="col-sm-9">
						<input type="hidden" name="role_id" value="{{$v['role_id']}}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="text"  value="{{$v['role_name']}}" class="col-xs-10 col-sm-5" name="role_name"/>
						
					</div>
				</div>
				@endforeach
				<div class="space-4"></div>

				

				<div class="space-4"></div>

				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="submit" class="btn btn-info" value="增加">
					</div>
				</div>
				<div class="hr hr-24"></div>
			</form>
		</div>		
	</div>	

	<!--引入低部-->
	@include('admin.di');
</body>
</html>
