<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>礼品列表</title>
    <link rel="shortcut icon" href="{{ asset('admin/images/gift/1.png') }}" />
    <style>
        td{
            text-align: center;
        }
        .th{
            text-align: center;
        }
    </style>
    <script src="admin/js/jquery.js" type="text/javascript"></script>
</head>
<body id="body">
<!--引入顶部-->
@include('admin.main')
<center>
    <p style="margin-top: 10px">
        <input type="text" name="search" class="searchVal" placeholder="请输入关键词" onfocus="this.placeholder=''" onblur="this.placeholder='请输入关键词'"/>
        <select name="" class="options">
            <option value="-1">请选择类别</option>
            <option value="1">已支付</option>
            <option value="0">未支付</option>
        </select>
        <input type="button" value="搜索" class="searchSubmit"/>
        <input type="button" value="批量删除" onclick="del_all();"/>
    </p>
    <table id="sample-table-1" class="table table-striped table-bordered table-hover" style="width: 800px; margin-top: 50px;">
        <th class="th"><input type="checkbox" id="choose_all" onclick="choose_all()"/></th>
        <th class="th">ID</th>
        <th class="th">礼品名称</th>
        <th class="th">用户名</th>
        <th class="th">是否支付</th>
        <th class="th">添加时间</th>
        <th class="th">操作</th>
        <?php foreach($arr as $v)
        {
        ?>
        <tr>
            <td><input type="checkbox" name="choose_one" class="choose_one" id="{{ $v['gift_order_id'] }}"/></td>
            <td>{{ $v['gift_order_id'] }}</td>
            <td>{{ $v['gift_name'] }}</td>
            <td>{{ $v['u_name'] }}</td>
            <td><?php if($v['is_pay'] == 0){ echo "<a href='".URL("Admin_orderGiftPay")."?'>未支付</a>";}else{ echo "已支付";}?></td>
            <td>{{ $v['pay_time'] }}</td>
            <td>
                <a href="{{ URL('') }}?id={{ $v['gift_order_id'] }}" title="查看订单详情">
                    <button class="btn btn-xs btn-info">
                        <i class="icon-edit bigger-120"></i>
                    </button>
                </a>
                <a href="{{ URL('Admin_orderGiftDelete') }}?id={{ $v['gift_order_id'] }}" title="删除">
                    <button class="btn btn-xs btn-danger">
                        <i class="icon-trash bigger-120"></i>
                    </button>
                </a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <p><?php echo $arr->render(); ?></p>
</center>
<!--引入左部-->
@include('admin.di')
</body>
</html>
<script>
    //全选和全不选
    function choose_all(){
        var choose = document.getElementById('choose_all').checked;
        var choose_one  = document.getElementsByName('choose_one');
        for(var i=0;i<choose_one.length;i++){
            if(choose == true){
                choose_one[i].checked = true;
            }else{
                choose_one[i].checked = false;
            }
        }
    }

    //批量删除
    function del_all(){
        var choose_one  = document.getElementsByName('choose_one');
        var a='';
        for(var i=0;i<choose_one.length;i++){
            if(choose_one[i].checked == true){
                a=a+choose_one[i].id+',';
            }
        }
        b= a.substring(0,a.length-1);
        if(b == ''){
            alert('没有选中内容');
            return false;
        }
        location.href="{{ URL('Admin_orderGiftDelAll') }}?id="+b;
    }

    //搜索
    $(function(){
        $('.searchSubmit').click(function(){
            var searchVal=$('.searchVal').val();
            var option=$('.options').val();
            //alert(searchVal);alert(option);
            //var arr={'searchVal':searchVal,'option':option};
            var url='{{URL("Admin_orderGiftSearch")}}';
            //alert(url);
            if(searchVal == ''){
                alert('请输入搜索内容');
                return false;
            }
            $.get(url,{'searchVal':searchVal,'option':option},function(data){
                $('#body').html(data)
            });
        });
    });
</script>