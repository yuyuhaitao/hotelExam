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
							<li class="active">酒店管理</li>
							<li class="active">酒店配置</li>
							<li class="active">户型管理</li>
						</ul><!-- .breadcrumb -->
					</div>
					<button class="btn btn-lg btn-success" onclick="window.location.href='Admin_house'">
						<i class="icon-ok"></i>
						户型列表
					</button>
					<div class="page-content">
							<div class="row">


									<div class="col-xs-12">

									<form class="form-horizontal" action='Admin_houseInsert' method="post" role="form" >
									<div class="form-group" style="margin-top:30px;">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 户型 </label>

										<div class="col-sm-9">
											<input type="text" name="house_name" id="form-field-1" placeholder="户型名称" class="col-xs-10 col-sm-5" /><span><?php echo $errors->first('house_name'); ?></span>
										</div>
									</div>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9" style="margin-left:35%;">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												增加
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
										</div>
									</div>

									<div class="hr hr-24"></div>



								</form>
									</div><!-- /span -->
								</div><!-- /row -->

					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

			<!--引入低部-->
			@include('admin.di')

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

			<script src="Admin/js/jquery-2.0.3.min.js"></script>
		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='Admin/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='Admin/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='Admin/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="Admin/js/bootstrap.min.js"></script>
		<script src="Admin/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="Admin/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="Admin/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="Admin/js/jquery.ui.touch-punch.min.js"></script>
		<script src="Admin/js/chosen.jquery.min.js"></script>
		<script src="Admin/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="Admin/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="Admin/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="Admin/js/date-time/moment.min.js"></script>
		<script src="Admin/js/date-time/daterangepicker.min.js"></script>
		<script src="Admin/js/bootstrap-colorpicker.min.js"></script>
		<script src="Admin/js/jquery.knob.min.js"></script>
		<script src="Admin/js/jquery.autosize.min.js"></script>
		<script src="Admin/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="Admin/js/jquery.maskedinput.min.js"></script>
		<script src="Admin/js/bootstrap-tag.min.js"></script>
		<script src="Admin/js/markdown/markdown.min.js"></script>
		<script src="Admin/js/markdown/bootstrap-markdown.min.js"></script>

		<!-- ace scripts -->

		<script src="Admin/js/ace-elements.min.js"></script>

		<!-- inline scripts related to this page -->

		
</body>
</html>

