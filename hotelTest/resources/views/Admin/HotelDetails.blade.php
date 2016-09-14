<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>{{$data['hotel_name']}}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	</head>


	<body>	
	<!--引入顶部-->
			@include('admin.main')
			<div class="page-content">
				<div class="row">
									<div class="col-xs-12 col-sm-6 widget-container-span">
										<div class="widget-box">
											<div class="widget-header">
												<h5>{{$data['hotel_name']}}</h5>

												<div class="widget-toolbar">
													<a href="#" data-action="settings">
														<i class="icon-cog"></i>
													</a>

													<a href="#" data-action="reload">
														<i class="icon-refresh"></i>
													</a>

													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>

													<a href="#" data-action="close">
														<i class="icon-remove"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<p class="alert alert-info">
													详细地址:{{$data['city_name']}}{{$data['hotel_address']}} <br>
													联系电话:{{$data['hotel_phone']}} <br>
													酒店封面: <img src="Admin/hotel_img/{{$data['hotel_id']}}.jpg" height="80" width="80"> <br>
													酒店描述:{{$data['hotel_info']}}
												       
													</p>
												
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-sm-6 widget-container-span">
										<div class="widget-box">
											<div class="widget-header header-color-blue">
												<h5 class="bigger lighter">
													<i class="icon-table"></i>
													配套服务
												</h5>
											</div>
											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-striped table-bordered table-hover">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="icon-cog"></i>
																	服务名称
																</th>
																<th>状态</th>
																
													
																
															</tr>
														</thead>

														<tbody>
															<tr>
																<td class=""><img src="Admin/hotel_details/p1.jpg" alt=""></td>
																<td>
																	@if($pei['is_wifi'] == 1)
																		<input class="ace ace-switch ace-switch-7" titl="is_wifi" val='0'  checked="checked" type="checkbox" name="switch-field-1">
																		<span class="lbl"></span>
																	@else
																		<input class="ace ace-switch ace-switch-7" titl="is_wifi" val='1'  type="checkbox" name="switch-field-1">
																		<span class="lbl"></span>
																	@endif
																</td>
																	
															</tr>
															<tr>
																<td class=""><img src="Admin/hotel_details/p2.jpg" alt=""></td>
																<td>
																	@if($pei['is_elec'] == 1)
																		<input class="ace ace-switch ace-switch-7" titl="is_elec" val="0" checked="checked" type="checkbox" name="switch-field-1">
																		<span class="lbl"></span>
																	@else
																		<input class="ace ace-switch ace-switch-7" titl="is_elec" val="1" type="checkbox" name="switch-field-1">
																		<span class="lbl"></span>
																	@endif
																</td>
																	
															</tr>
															<tr>
																<td class=""><img src="Admin/hotel_details/p3.jpg" alt=""></td>
																<td>
																	@if($pei['is_heat'] == 1)
																		<input class="ace ace-switch ace-switch-7" titl="is_heat" val="0" checked="checked" type="checkbox" name="switch-field-1">
																		<span class="lbl"></span>
																	@else
																		<input class="ace ace-switch ace-switch-7" titl="is_heat" val="1" type="checkbox" name="switch-field-1">
																		<span class="lbl"></span>
																	@endif
																</td>
																	
															</tr>
															<tr>
																<td class=""><img src="Admin/hotel_details/p4.jpg" alt=""></td>
																<td>
																	@if($pei['is_bed'] == 1)
																		<input class="ace ace-switch ace-switch-7" titl="is_bed" val="0" checked="checked" type="checkbox" name="switch-field-1">
																		<span class="lbl"></span>
																	@else
																		<input class="ace ace-switch ace-switch-7" titl="is_bed" val="1" type="checkbox" name="switch-field-1">
																		<span class="lbl"></span>
																	@endif
																</td>
																	
															</tr>
															<tr>
																<td class=""><img src="Admin/hotel_details/p5.jpg" alt=""></td>
																<td>
																	@if($pei['is_air'] == 1)
																		<input class="ace ace-switch ace-switch-7" titl="is_air" val="0" checked="checked" type="checkbox" name="switch-field-1">
																		<span class="lbl"></span>
																	@else
																		<input class="ace ace-switch ace-switch-7" titl="is_air" val="1" type="checkbox" name="switch-field-1">
																		<span class="lbl"></span>
																	@endif
																</td>
																	
															</tr>
															<tr>
																<td class=""><img src="Admin/hotel_details/p6.jpg" alt=""></td>
																<td>
																	@if($pei['is_card'] == 1)
																		<input class="ace ace-switch ace-switch-7" titl="is_card" val="0" checked="checked" type="checkbox" name="switch-field-1">
																		<span class="lbl"></span>
																	@else
																		<input class="ace ace-switch ace-switch-7" titl="is_card" val="1" type="checkbox" name="switch-field-1">
																		<span class="lbl"></span>
																	@endif
																</td>
																	
															</tr>

														
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div><!-- /span -->
								</div><!-- /row -->
							</div>
			<!--引入低部-->
			@include('admin.di')
</body>
		<script>
				$('input').click(function(){
						var th=$(this);
						var title=th.attr('titl');
						var pd=th.attr('val');
						
						var hotel_id="{{$data['hotel_id']}}"
						$.get('/Admin_HotelDetailsUpd',{'hotel_id':hotel_id,'title':title,'pd':pd},function(e){
							if(e==0){
								alert("修改失败")
								return;
							}
						})
						if(pd==1){
							th.attr('val',0);
						}else{
							th.attr('val',1);
						}
						
				})


		</script>
</html>

	
