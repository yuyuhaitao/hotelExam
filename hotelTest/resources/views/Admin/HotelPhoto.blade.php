<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>{{$name}}套图</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	</head>
		
			<link rel="stylesheet" href="Admin/css/dropzone.css" />
			<link rel="stylesheet" href="Admin/css/colorbox.css" />
	<body id="tab">	
	<!--引入顶部-->
	@include('admin.main')
				<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

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
								<a href="#">酒店列表</a>
							</li>
							<li class="active">{{$name}}套图</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							
						</div><!-- /.page-header -->
		
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row-fluid"></div>
								@foreach($data as $v)
								<div class="row-fluid">
									<ul class="ace-thumbnails">
														<li>
											<a href="{{$v['hotel_img']}}" data-rel="colorbox">
												<img alt="150x150" width="150" height="150" src="{{$v['hotel_img']}}" />
												<div class="text">
													<div class="inner">{{$name}}图</div>
												</div>
											</a>

											<div class="tools tools-bottom">
												<a href="/Admin_HotelPDel?id={{$v['hotel_p_id']}}">
													<i class="icon-remove red"></i>
												</a>
											</div>
										</li>
									</ul>
								</div><!-- PAGE CONTENT ENDS -->
								@endforeach
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->	
					<div id="dropzone" width="300" height="20">
									<form action="/Admin_HotelPAdds" class="dropzone">
									
									</form>
								</div><!-- PAGE CONTENT ENDS -->
				</div><!-- /.main-content -->

	
					



	<!--引入低部-->
	@include('admin.di')
</body>
		<script src="Admin/js/jquery.colorbox-min.js"></script>
		<script src="Admin/js/dropzone.min.js"></script>

	<script type="text/javascript">
		
					
		
			jQuery(function($) {
	
					
						   
						
					try {
				

			Dropzone.autoDiscover = false;
			var div=$('.row-fluid:last');
			  $(".dropzone").dropzone({
			    paramName: "file", // The name that will be used to transfer the file
			    maxFilesize: 2, // MB
			   parallelUploads: 100,
				addRemoveLinks : true,
				dictDefaultMessage :
				'<span class="bigger-150 bolder"><i class="icon-caret-right red"></i>上传图片</span> 上传酒店的套图 \
				<span class="smaller-80 grey">(上传吧)</span> <br /> \
				<i class="upload-icon icon-cloud-upload blue icon-3x"></i>',
				dictResponseError: '没发现上传地址',
				success:function(e){
					var tr="<div class='row-fluid'><ul class='ace-thumbnails'><li><a href="+e.xhr.responseText+" class='cboxElement' data-rel='colorbox'><img alt='150x150' width='150' height='150' src="+e.xhr.responseText+" /><div class='text'><div class='inner'>新图</div></div></a><div class='tools tools-bottom'><a href='#'><i class='icon-remove red'></i></a></div></li></ul></div>"
						div.after(tr)
				},
				//change the previewTemplate to use Bootstrap progress bars
				previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name id='data-name'></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>",

			  });
			} catch(e) {
			  alert('js没有发现!');
			}
				
		//图片js
	var colorbox_params = {
		reposition:false,
		scalePhotos:false,
		scrolling:false,
		previous:'<i class="icon-arrow-left"></i>',
		next:'<i class="icon-arrow-right"></i>',
		close:'&times;',
		current:'{current} of {total}',
		maxWidth:'95%',
		maxHeight:'150%',
		onOpen:function(){
		
		},
		onClosed:function(){
			document.body.style.overflow = 'auto';
		},
		onComplete:function(){
			$.colorbox.resize();
		}
	};

	$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	$("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");//let's add a custom loading icon

	// $(window).on('resize.colorbox', function() {
	// 	try {
	// 		//this function has been changed in recent versions of colorbox, so it won't work
	// 		$.fn.colorbox.load();//to redraw the current frame
	// 	} catch(e){}
	
	});

		</script>
</html>

	
