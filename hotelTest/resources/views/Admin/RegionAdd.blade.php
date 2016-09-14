<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>地区添加</title>
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
												<li class="active">地区管理</li>
												<li class="active">地区添加</li>
											</ul><!-- .breadcrumb -->
										</div>
										<br><br>
								<form class="form-horizontal" role="form" method="post" action="Admin_RegionAdds">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">		
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 添加地区</label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="地区" name="city_name" class="col-xs-10 col-sm-5" />
										<?php echo $errors->first('city_name'); ?>
										</div>
									<div class="form-group">
									</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												添加地区
											</button>
											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
											</div>
											</div>
									</form>
										
			<!--引入低部-->
			@include('admin.di')
					
				
			



</body>
	
</html>

