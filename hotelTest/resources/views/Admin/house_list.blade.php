<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>微酒店</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script src="Admin/js/jquery.js"></script>
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
							<li class="active">酒店列表</li>
						</ul><!-- .breadcrumb -->
					</div>
			<button class="btn btn-lg btn-success" onclick="window.location.href='Admin_houseAdd'">
				<i class="icon-ok"></i>
				添加户型
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
							<th width="400">户型名称<font color="skyblue" size="1">（点击可编辑）</font></th>
							<th><i class="icon-time bigger-110 hidden-480"></i>添加时间</th>

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
								{{ $v['house_id'] }}
							</td>
							<td>
								<span class="edit" edid="{{ $v['house_id'] }}">{{ $v['house_name'] }}</span>
							</td>
							

							<td class="hidden-480">
								{{ $v['addtime'] }}
							</td>
							<td>
								<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
									<a class="red" href="{{ url('Admin_houseDel') }}?house_id={{ $v['house_id'] }}">
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
<script>
$(function(){
    $(document).on('click','.edit',function(){
      var edid = $(this).attr('edid');
      var here = $(this);
      var val = here.html();
      here.parent().html("<input type='text' class='upd' value="+val+">");
      var inp = $('.upd');
      inp.focus();
      inp.blur(function(){
        var new_val = inp.val();
        if(new_val == ''){
          alert('不能为空');
          inp.parent().html("<span class='edit' edid="+edid+">"+val+"</span>");
          return false;
        }
        if(val == new_val){
          inp.parent().html("<span class='edit' edid="+edid+">"+val+"</span>");
        }
        $.get("Admin_houseNedit",{'house_name':new_val,'house_id':edid},function(msg){
          if(msg==1){
            inp.parent().html("<span class='edit' edid="+edid+">"+new_val+"</span>");
          }
      });
    });
  });
});
</script>