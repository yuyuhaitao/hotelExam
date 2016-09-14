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
							<li class="active">帮助咨询</li>
							<li class="active">图文咨询</li>
						</ul><!-- .breadcrumb -->
					</div>
			<button class="btn btn-lg btn-success">
				<i class="icon-ok"></i>
				用户咨询列表
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
							<th>提问人用户名</th>
							<th>提问人邮箱</th>
							<th>提问问题</th>
							<th>给予回答</th>
							<th class="hidden-480"><i class="icon-time bigger-110 hidden-480"></i>回答时间</th>
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
								{{ $v['help_id'] }}</a>
							</td>
							<td>{{ $names[$k] }}</td>
							<td><a href="#">{{ $v['u_email'] }}</a></td>
							<td><a href="javascript:void(0)">{{ $v['help_title'] }}</a></td>
							<td>
							@if($v['help_content'] == '')
            					未回复
					        @else
					            <?php echo $v['help_content']; ?>
					        @endif
							</td>
							<td class="hidden-480">
							@if($v['help_time'] == '')
            					未回复
					        @else
					            {{ $v['help_time'] }}
					        @endif
							</td>
							<td>
								<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
									@if($v['help_content'] == '')
		            					<a class="green" href="{{ url('Admin_helpmanAnswer') }}?help_id={{ $v['help_id'] }}">
											<i class="icon-edit bigger-130" title='回复'></i>
										</a>

										<a class="red" href="{{ url('Admin_helpmanDel') }}?help_id={{ $v['help_id'] }}">
											<i class="icon-trash bigger-130" title='删除'></i>
										</a>
							        @else
							            <a class="red" href="{{ url('Admin_helpmanDel') }}?help_id={{ $v['help_id'] }}">
											<i class="icon-trash bigger-130" title='删除'></i>
										</a>
							        @endif	
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