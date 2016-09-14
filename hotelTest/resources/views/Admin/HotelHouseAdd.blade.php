<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>户型添加</title>
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
							<li class="active">户型添加</li>
						</ul><!-- .breadcrumb -->


					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								酒店
								<small>
									<i class="icon-double-angle-right"></i>
									添加你的户型
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" role="form" method="post" action="/Admin_HotelHousAdds" enctype="multipart/form-data" >
							
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> 户型 </label>
										<span class="help-inline col-xs-12 col-sm-7">
											<select name="house_id" id="form-field-select-1">
												<option value="">请选择...</option>
												@foreach($data as $v)
												<option value="{{$v['house_id']}}">{{$v['house_name']}}</option>
												@endforeach
															
											</select><?php echo $errors->first('house_id');?>
										</span>
										</div>

								<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 户型价格 </label>

											<div class="col-sm-9">
											<span class="input-icon">
													<input type="number" id="form-field-icon-1" name="price" placeholder="户型价格"/>
													<i class="icon-leaf blue"></i>
												</span><?php echo $errors->first('price');?>
										</div>
										</div>
								

									<div class="space-4"></div>
									
							
								<input type="hidden" name="_token" value="{{ csrf_token() }}">	
											<div class="space-4"></div>	
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 房间数 </label>

										<div class="col-sm-9">
										<span class="input-icon">
												<input type="number" id="form-field-icon-1" name="house_num" placeholder="房间数"/>
												<i class="icon-leaf blue"></i>
											</span><?php echo $errors->first('house_num');?>
									</div>
								</div>
								<div class="space-4"></div>
								<div class="space-4"></div>	
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">户型图片</label>

											<div class="col-sm-4">
						

												<input type="file" name="house_img">
												<span></span><?php echo $errors->first('house_img');?></span>
											</div>
										</div>
								</div>
										<input type="hidden" name="hotel_id" value="{{$id}}"><?php echo $errors->first('hotel_id');?>
									<div class="clearfix">
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
									</form>
								</div>
									
									<div class="hr hr-24"></div>
										
			<!--引入低部-->
			@include('admin.di')
					
				
			



</body>

</html>

