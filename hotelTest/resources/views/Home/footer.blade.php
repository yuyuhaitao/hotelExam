<div class="footer">
<div class="gezifooter">
	<?php $u_id = Session::get('u_id');//echo "<script>alert(".$u_id.");</script>";?>
	@if($u_id=='')
		<a href="Home_login" class="ui-link">立即登陆</a> <font color="#878787">|</font> 
		<a href="Home_register" class="ui-link">免费注册</a> <font color="#878787">	
	@endif           
</div>
<div class="gezifooter">
	<p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p>
</div>
</div>