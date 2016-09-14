<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>微酒店</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="Admin/css/font-awesome.min.css" />
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
							<li class="active">文章添加</li>
						</ul><!-- .breadcrumb -->
					</div>
					<button class="btn btn-lg btn-success" onclick="window.location.href='Admin_article'">
						<i class="icon-ok"></i>
						活动文章列表
					</button>
					<div class="page-content">
							<div class="row">


									
								<div class="col-xs-12">
									<form class="form-horizontal" method="post" action='Admin_articleInsert' role="form" enctype="multipart/form-data">
									<div class="form-group" style="margin-top:30px;">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 文章标题 </label>
										
										<div class="col-sm-9">
											<input type="text" name="article_title" id="form-field-1" placeholder="文章标题" class="col-xs-10 col-sm-5" /><span><?php echo $errors->first('article_title'); ?></span>
										</div>
									</div>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name='article_content'>

									<div class="form-group" style="margin-top:30px;">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 文章图片 </label>

										<div class="col-sm-9">
											<input type="file" name="article_img" id="form-field-1" class="col-xs-10 col-sm-5" /><span><?php echo $errors->first('article_img'); ?></span>
										</div>
									</div>
										
									
									<div class="form-group" style="margin-top:30px;">
										<label class="col-sm-3 control-label no-padding-right" style="margin-right:16px;" for="form-field-1"> 开始时间 </label>
										
										<div class="input-group" style="width:300px;">
											<input name="start_date" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" />
											<span class="input-group-addon">
												<i class="icon-calendar bigger-110"></i>
											</span>
											<?php echo $errors->first('start_date'); ?>
										</div>
										
									</div>

									<div class="form-group" style="margin-top:30px;">
										<label class="col-sm-3 control-label no-padding-right" style="margin-right:16px;" for="form-field-1"> 结束时间 </label>
										
										<div class="input-group" style="width:300px;">
											<input name="end_date" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" />
											<span class="input-group-addon">
												<i class="icon-calendar bigger-110"></i>
											</span>
											<?php echo $errors->first('end_date'); ?>
										</div>
										
									</div>
								
									<div class="col-sm-6" style="margin-left:19%">
										<h4 class="header blue">文章内容</h4><span><?php echo $errors->first('article_content'); ?></span>

										<div class="widget-box">
											<div class="widget-header widget-header-small  header-color-green">
												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<div class="wysiwyg-editor" id="editor2" name='textarea'></div>
												</div>
											</div>
										</div>
										
	
								<div class="col-xs-12">
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9" style="margin-left:35%;">
											<button class="btn btn-info" type="submit" id='submit'>
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
		

		<!-- ace scripts -->

		<script src="Admin/js/ace-elements.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='Admin/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>


		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='Admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="Admin/js/bootstrap.min.js"></script>
		<script src="Admin/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<script src="Admin/js/markdown/markdown.min.js"></script>
		<script src="Admin/js/markdown/bootstrap-markdown.min.js"></script>
		<script src="Admin/js/jquery.hotkeys.min.js"></script>
		<script src="Admin/js/bootstrap-wysiwyg.min.js"></script>
		<script src="Admin/js/bootbox.min.js"></script>

		<!-- ace scripts -->

		<script src="Admin/js/ace-elements.min.js"></script>

		<!-- inline scripts related to this page -->
	
	<!-- 获取编辑器的值 -->

		<script type="text/javascript">
			jQuery(function($){

	$('#editor2').css({'height':'200px'}).ace_wysiwyg({
		toolbar_place: function(toolbar) {
			return $(this).closest('.widget-box').find('.widget-header').prepend(toolbar).children(0).addClass('inline');
		},
		toolbar:
		[
			'bold',
			{name:'italic' , title:'Change Title!', icon: 'icon-leaf'},
			'strikethrough',
			null,
			'insertunorderedlist',
			'insertorderedlist',
			null,
			'justifyleft',
			'justifycenter',
			'justifyright'
		],
		speech_button:false
	});

	//获取编辑器的值
	$('#submit').click(function(){
		var content = $('div[name="textarea"]').html();
		// alert(content);
		$('input[name="article_content"]').val(content);
	})


	$('[data-toggle="buttons"] .btn').on('click', function(e){
		var target = $(this).find('input[type=radio]');
		var which = parseInt(target.val());
		var toolbar = $('#editor1').prev().get(0);
		if(which == 1 || which == 2 || which == 3) {
			toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g , '');
			if(which == 1) $(toolbar).addClass('wysiwyg-style1');
			else if(which == 2) $(toolbar).addClass('wysiwyg-style2');
		}
	});
	
	$('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	$('input[name=date-range-picker]').daterangepicker().prev().on(ace.click_event, function(){
		$(this).next().focus();
	});
});
		</script>
</body>
</html>

