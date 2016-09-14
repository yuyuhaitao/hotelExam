<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>微酒店</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	</head>

	<body id="tab">	
	<!--引入顶部-->
			@include('/admin.main')

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
					<button class="btn btn-lg btn-success" onclick="window.location.href='/Admin_article'">
						<i class="icon-ok"></i>
						活动文章列表
					</button>
					<div class="page-content">
							<div class="row">


									
								<div class="col-xs-12">
									<form class="form-horizontal" method="post" action='Admin_articleUpd' role="form" enctype="multipart/form-data">
									<div class="form-group" style="margin-top:30px;">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 文章标题 </label>
										
										<div class="col-sm-9">
											<input type="text" name="article_title" id="form-field-1" placeholder="文章标题" class="col-xs-10 col-sm-5" value="{{ $arr['article_title'] }}" /><span><?php echo $errors->first('article_title'); ?></span>
										</div>
									</div>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="article_id" value="{{ $arr['article_id'] }}">
									<input type="hidden" name='article_content'>
									<div style="margin-left:20%;"><img width="150" src="{{ $arr['article_img'] }}">（原图片）</div>
									<div class="form-group" style="margin-top:30px;">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 文章图片 </label>

										<div class="col-sm-9">
											<input type="file" name="article_img" id="form-field-1" class="col-xs-10 col-sm-5" /><span><?php echo $errors->first('article_img'); ?></span>
										</div>
									</div>
									<div class="form-group" style="margin-top:30px;">
										<label class="col-sm-3 control-label no-padding-right" style="margin-right:16px;" for="form-field-1"> 开始时间 </label>
										
										<div class="input-group" style="width:300px;">
											<input name="start_date" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" value="{{ $arr['start_date'] }}" />
											<span class="input-group-addon">
												<i class="icon-calendar bigger-110"></i>
											</span>
										</div>
										
									</div>

									<div class="form-group" style="margin-top:30px;">
										<label class="col-sm-3 control-label no-padding-right" style="margin-right:16px;" for="form-field-1"> 结束时间 </label>
										
										<div class="input-group" style="width:300px;">
											<input name="end_date" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" value="{{ $arr['end_date'] }}" />
											<span class="input-group-addon">
												<i class="icon-calendar bigger-110"></i>
											</span>
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
													<div class="wysiwyg-editor" id="editor2" name='textarea'><?php echo $arr['article_content']; ?></div>
												</div>
											</div>
										</div>
										
										

	
								<div class="col-xs-12">
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9" style="margin-left:35%;">
											<button class="btn btn-info" type="submit" id='submit'>
												<i class="icon-ok bigger-110"></i>
												修改
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
			@include('/admin.di')

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

			<script src="/Admin/js/jquery-2.0.3.min.js"></script>
		<!-- <![endif]-->



		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/Admin/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/Admin/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/Admin/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="/Admin/js/bootstrap.min.js"></script>
		<script src="/Admin/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="/Admin/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="/Admin/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/Admin/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/Admin/js/chosen.jquery.min.js"></script>
		<script src="/Admin/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="/Admin/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="/Admin/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="/Admin/js/date-time/moment.min.js"></script>
		<script src="/Admin/js/date-time/daterangepicker.min.js"></script>
		<script src="/Admin/js/bootstrap-colorpicker.min.js"></script>
		<script src="/Admin/js/jquery.knob.min.js"></script>
		<script src="/Admin/js/jquery.autosize.min.js"></script>
		<script src="/Admin/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="/Admin/js/jquery.maskedinput.min.js"></script>
		<script src="/Admin/js/bootstrap-tag.min.js"></script>
		

		<!-- ace scripts -->

		<script src="/Admin/js/ace-elements.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/Admin/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>


		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/Admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="/Admin/js/bootstrap.min.js"></script>
		<script src="/Admin/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<script src="/Admin/js/markdown/markdown.min.js"></script>
		<script src="/Admin/js/markdown/bootstrap-markdown.min.js"></script>
		<script src="/Admin/js/jquery.hotkeys.min.js"></script>
		<script src="/Admin/js/bootstrap-wysiwyg.min.js"></script>
		<script src="/Admin/js/bootbox.min.js"></script>

		<!-- ace scripts -->

		<script src="/Admin/js/ace-elements.min.js"></script>

		<!-- inline scripts related to this page -->
	
	<!-- 获取编辑器的值 -->

		<script type="text/javascript">
			jQuery(function($){
	
	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	}

	//$('#editor1').ace_wysiwyg();//this will create the default editor will all buttons

	//but we want to change a few buttons colors for the third style
	$('#editor1').ace_wysiwyg({
		toolbar:
		[
			'font',
			null,
			'fontSize',
			null,
			{name:'bold', className:'btn-info'},
			{name:'italic', className:'btn-info'},
			{name:'strikethrough', className:'btn-info'},
			{name:'underline', className:'btn-info'},
			null,
			{name:'insertunorderedlist', className:'btn-success'},
			{name:'insertorderedlist', className:'btn-success'},
			{name:'outdent', className:'btn-purple'},
			{name:'indent', className:'btn-purple'},
			null,
			{name:'justifyleft', className:'btn-primary'},
			{name:'justifycenter', className:'btn-primary'},
			{name:'justifyright', className:'btn-primary'},
			{name:'justifyfull', className:'btn-inverse'},
			null,
			{name:'createLink', className:'btn-pink'},
			{name:'unlink', className:'btn-pink'},
			null,
			{name:'insertImage', className:'btn-success'},
			null,
			'foreColor',
			null,
			{name:'undo', className:'btn-grey'},
			{name:'redo', className:'btn-grey'}
		],
		'wysiwyg': {
			fileUploadError: showErrorAlert
		}
	}).prev().addClass('wysiwyg-style2');

	

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


	

	//Add Image Resize Functionality to Chrome and Safari
	//webkit browsers don't have image resize functionality when content is editable
	//so let's add something using jQuery UI resizable
	//another option would be opening a dialog for user to enter dimensions.
	if ( typeof jQuery.ui !== 'undefined' && /applewebkit/.test(navigator.userAgent.toLowerCase()) ) {
		
		var lastResizableImg = null;
		function destroyResizable() {
			if(lastResizableImg == null) return;
			lastResizableImg.resizable( "destroy" );
			lastResizableImg.removeData('resizable');
			lastResizableImg = null;
		}

		var enableImageResize = function() {
			$('.wysiwyg-editor')
			.on('mousedown', function(e) {
				var target = $(e.target);
				if( e.target instanceof HTMLImageElement ) {
					if( !target.data('resizable') ) {
						target.resizable({
							aspectRatio: e.target.width / e.target.height,
						});
						target.data('resizable', true);
						
						if( lastResizableImg != null ) {//disable previous resizable image
							lastResizableImg.resizable( "destroy" );
							lastResizableImg.removeData('resizable');
						}
						lastResizableImg = target;
					}
				}
			})
			.on('click', function(e) {
				if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
					destroyResizable();
				}
			})
			.on('keydown', function() {
				destroyResizable();
			});
	    }
		
		enableImageResize();
	}

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

