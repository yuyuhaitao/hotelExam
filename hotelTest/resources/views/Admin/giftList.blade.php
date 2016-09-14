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
    <script src="{{ asset('admin/js/jquery.js') }}" type="text/javascript"></script>
</head>
<body id="body">
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
                            <li class="active">礼品管理</li>
                            <li class="active">礼品列表</li>
                        </ul><!-- .breadcrumb -->
                    </div>
    <center>
 
        <p style="margin-top: 10px">
            <input type="text" name="search" class="searchVal" placeholder="请输入关键词" onfocus="this.placeholder=''" onblur="this.placeholder='请输入关键词'"/>
            <select name="" class="options">
                <option value="0">请选择类别</option>
                <option value="1">礼品名称</option>
                <option value="2">礼品描述</option>
            </select>
            <input type="button" value="搜索" class="searchSubmit"/>
            <input type="button" value="批量删除" onclick="del_all();"/>
        </p>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover" style="width: 800px; margin-top: 50px;">
            <th class="th"><input type="checkbox" id="choose_all" onclick="choose_all()"/></th>
            <th class="th">ID</th>
            <th class="th">礼品名称</th>
            <th class="th">礼品图片</th>
            <th class="th">礼品描述</th>
            <th class="th">库存</th>
            <th class="th">需要积分</th>
            <th class="th">操作</th>
                <?php foreach($arr as $v)
                    {
                ?>
                    <tr>
                        <td><input type="checkbox" name="choose_one" class="choose_one" id="{{ $v['gift_id'] }}"/></td>
                        <td>{{ $v['gift_id'] }}</td>
                        <td>{{ $v['gift_name'] }}</td>
                        <td><img src="{{ $v['gift_img'] }}" width="25" height="25" alt=""/></td>
                        <td>{{ $v['gift_info'] }}</td>
                        <td s="{{ $v['gift_id'] }}"><span class="update" >{{ $v['gift_num'] }}</span></td>
                        <td>{{ $v['gift_price'] }}</td>
                        <td>
                            <a href="{{ URL('Admin_giftLook') }}?id={{ $v['gift_id'] }}" title="查看">
                                <button class="btn btn-xs btn-info">
                                    <i class="icon-edit bigger-120"></i>
                                </button>
                            </a>
                            <a href="{{ URL('Admin_giftDelete') }}?id={{ $v['gift_id'] }}" title="删除">
                                <button class="btn btn-xs btn-danger">
                                    <i class="icon-trash bigger-120"></i>
                                </button>
                            </a>
                            <?php
                                if($v['gift_num'] >35){
                            ?>
                                    <span class="badge badge-success" title="库存尚足">☆</span>
                            <?php
                                }elseif($v['gift_num'] < 35 && $v['gift_num'] >0){
                            ?>
                            <a href="{{ URL('Admin_giftAdd') }}"><span class="badge badge-warning" title="库存不足,请及时添加">+</span></a>
                            <?php
                                }elseif($v['gift_num'] == 0){
                            ?>
                                    <span class="badge badge-grey" title="没库存了">+</span>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table>
            {!! $arr->render() !!}
    </center>
    <!--引入左部-->
    @include('admin.di')
</body>
</html>
<script>
    //即点即改
    $(function(){
        $('.update').click(function(){
            //获取值
            var old_val = $(this).text();
            var $input = $('<input type=\"text\" \/>');
            $(this).html($input);
            $input.click(function(){//可以再文本框中输入
                return false;
            });

            $input.focus().val(old_val);
            $input.blur(function(){
                var new_val = $(this).val();
                if(new_val != 0 && new_val != ''){
                    var url = "{{ URL('Admin_giftUpdate') }}";
                    var id  = $(this).parent().parent().attr("s");
                    $(this).parent().text(new_val);
                    $.get(url,{"new_val":new_val,"id":id},function(data){
                        if(data == 1){
                            alert('保存成功');
                        }else{
                            alert('保存失败');
                        }
                    })
                }else{
                    alert('保存内容不能为空');
                }
            });
        });
    });

    //全选和反选
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
        location.href="{{ URL('Admin_giftDelAll') }}?id="+b;
    }

    //搜索
    $(function(){
        $('.searchSubmit').click(function(){
            var searchVal=$('.searchVal').val();
            var option=$('.options').val();
            //alert(searchVal);alert(option);
            //var arr={'searchVal':searchVal,'option':option};
            var url='{{URL("Admin_giftSearch")}}';
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