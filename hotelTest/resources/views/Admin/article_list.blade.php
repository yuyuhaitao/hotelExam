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
							<li class="active">网站配置</li>
							<li class="active">活动发起</li>
						</ul><!-- .breadcrumb -->
					</div>
			<button class="btn btn-lg btn-success" onclick="window.location.href='Admin_articleAdd'">
				<i class="icon-ok"></i>
				添加活动文章
			</button>
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
							<th>编号</th>
							<th>文章标题<font color="skyblue" size="1">（点击看详情）</font></th>
							
							<th class="hidden-480"><i class="icon-time bigger-110 hidden-480"></i>开始日期</th>
							<th class="hidden-480"><i class="icon-time bigger-110 hidden-480"></i>结束日期</th>
							<th class="hidden-480">活动状态</th>
							<th>操作</th>
						</tr>
					</thead>

					<tbody>
					@foreach($arr as $k => $v)
						<tr>
							<td class="center">
								<label>
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</td>

							<td>
								{{ $v['article_id'] }}</a>
							</td>
							<td><a href="Admin_articleInfo?article_id={{ $v['article_id'] }}">{{ $v['article_title'] }}</a></td>
							
							<td class="hidden-480">
								{{ $v['start_date'] }}
							</td>
							<td class="hidden-480">
								{{ $v['end_date'] }}
							</td>
							@if($v['start_date'] <= $now and $now <= $v['end_date'])
								<td class="hidden-480">火热进行中...</td>
							@elseif($now < $v['start_date'])
								<td class="hidden-480">未开始</td>
							@elseif($v['end_date'] < $now)
								<td class="hidden-480">已结束</td>
							@endif
							<td>
								<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
									<a class="green" href="{{ url('Admin_articleEdit') }}?article_id={{ $v['article_id'] }}">
										<i class="icon-pencil bigger-130" title='编辑'></i>
									</a>

									<a class="red" href="{{ url('Admin_articleDel') }}?article_id={{ $v['article_id'] }}">
										<i class="icon-trash bigger-130" title='删除'></i>
									</a>
								</div>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div align="center"><?php echo $arr->render(); ?></div>
			</div>
		</div>
	</div>
			<!--引入低部-->
			@include('admin.di')
</body>
</html>