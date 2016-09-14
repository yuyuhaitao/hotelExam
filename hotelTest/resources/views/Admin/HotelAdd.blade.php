<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>酒店添加</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	</head>
		<link rel="stylesheet" href="Admin/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="Admin/css/chosen.css" />
		<link rel="stylesheet" href="Admin/css/datepicker.css" />
		<link rel="stylesheet" href="Admin/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="Admin/css/daterangepicker.css" />
		<link rel="stylesheet" href="Admin/css/colorpicker.css" />


	<body>	
	<!--引入顶部-->
			@include('admin.main')

									
						

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

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

							<li>
								<a href="#">酒店管理</a>
							</li>
							<li class="active">酒店添加</li>
						</ul><!-- .breadcrumb -->


					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								酒店
								<small>
									<i class="icon-double-angle-right"></i>
									添加你的酒店
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" role="form" method="post" action="/Admin_HotelAdds" enctype="multipart/form-data" >
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 酒店名称 </label>

										<div class="col-sm-9">
										<span class="input-icon">
												<input type="text" id="form-field-icon-1" name="hotel_name" placeholder="酒店名称"/>
												<i class="icon-leaf blue"></i>
											</span><?php echo $errors->first('hotel_name');?>
											
										</div>
									</div>

									<div class="space-4"></div>
									
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> 所在城市 </label>
										<span class="help-inline col-xs-12 col-sm-7">
											<select name="city_id" id="form-field-select-1">
												<option value="">请选择...</option>
												@foreach($data as $v)
												<option value="{{$v['city_id']}}">{{$v['city_name']}}</option>
												@endforeach
															
											</select><?php echo $errors->first('city_id');?>
										</span>
								</div>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">		
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> 联系方式 </label>

										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-addon">
												<i class="icon-phone"></i>
													</span>
												<input type="tel" id="phone" name="hotel_phone" placeholder="联系方式"/>
											</div><?php echo $errors->first('hotel_phone');?>
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">详细地址</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="酒店地址" name="hotel_address" class="col-xs-10 col-sm-5" />
										<?php echo $errors->first('hotel_address');?></div>
									</div>
									<div class="space-4"></div>
										<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">添加封面</label>
										<div class="col-sm-9">
														<input type="file" name="hotel_feng" /><?php echo $errors->first('hotel_feng');?>
									</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">酒店描述</label>

										<div class="col-sm-9">
										<textarea placeholder="酒店描述" rows='5' cols="55" name="hotel_info"></textarea><?php echo $errors->first('hotel_info');?>
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

									<div class="hr hr-24"></div>
										
			<!--引入低部-->
			@include('admin.di')
					
				
			



</body>
	
</html>

