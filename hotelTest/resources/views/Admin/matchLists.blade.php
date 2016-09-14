						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							<form class="form-horizontal" action="Admin_matchadd" method="post">
					<div class="space-4"></div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 角色名称 </label>
								<div class="col-sm-9">
									<select name="role_id" class="role_name">
									@foreach($arr as $key=>$v)
										@if($v['role_id']==$v['re'])
										<option value="{{$v['role_id']}}" selected="selected">{{$v['role_name']}}</option>
										@else
										<option value="{{$v['role_id']}}">{{$v['role_name']}}</option>
										@endif
									@endforeach
									</select>
								</div>
							</div>
					<div class="space-4"><input type="hidden" name="_token" value="{{csrf_token()}}"/></div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 权限名称 </label>
								<div class="col-sm-9">
									@foreach($ar as $key=>$v)
									@if(in_array($v['pri_id'],$pri_id))
										<input type="checkbox" name="pri_id[]" checked="checked" value="{{$v['pri_id']}}">
										<?php echo str_repeat("&nbsp;&nbsp;----",$v['level']);?>{{$v['pri_name']}}<br>
									@else
										<input type="checkbox" name="pri_id[]" value="{{$v['pri_id']}}">
										<?php echo str_repeat("&nbsp;&nbsp;----",$v['level']);?>{{$v['pri_name']}}<br>
									@endif
									@endforeach
								</div>
							</div>
									<div>
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												添加
										</div>
									</div>
							</form>
						</div>
<script>
	$('.role_name').change(function(){
		var role_id=$(this).val();
		$.get('Admin_matchlist',{'role_id':role_id},function(msg){
			$('#row').html(msg);
		});
	})
</script>