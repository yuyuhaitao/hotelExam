<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>礼品添加页面</title>
    <style>
        td{
            padding-right: 20px;
        }
        h3{
            padding-right: 40px;
        }
    </style>
    <script src="{{ asset('admin/js/jquery.js') }}" type="text/javascript"></script>
    <link rel="shortcut icon" href="{{ asset('admin/images/gift/1.png') }}" />
</head>
<body>

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
    <div style="width: 200px;height: 500px; float: right; margin-top: 20px;" >
        <div ><a href="javascript:;" ><img src="{{ asset('admin/images/gift/1.jpg') }}" alt="打火机、烟灰缸套装" width="50px;"height="50px;" class="one"/></a></div>

        <div ><a href="javascript:;" ><img src="{{ asset('admin/images/gift/2.jpg') }}" alt="摆件" width="50px;"height="50px;" class="one"/></a></div>

        <div ><a href="javascript:;" ><img src="{{ asset('admin/images/gift/3.jpg') }}" alt="猫型小锅" width="50px;"height="50px;" class="one"/></a></div>

        <div ><a href="javascript:;" ><img src="{{ asset('admin/images/gift/4.jpg') }}" alt="特色书签" width="50px;"height="50px;" class="one"/></a></div>

        <div ><a href="javascript:;" ><img src="{{ asset('admin/images/gift/5.jpg') }}" alt="粉色小锅" width="50px;"height="50px;" class="one"/></a></div>

    </div>
<center>
    <a href="/Admin_giftList" style="float: left; text-decoration: none;"><button class="btn btn-primary">查看列表</button></a><h3 style="color: green;font-family: bold">添&nbsp;&nbsp;加&nbsp;&nbsp;礼&nbsp;&nbsp;品</h3>
    <form action="/Admin_giftAdd" enctype="multipart/form-data" method="post">
        <table>
            <tr>
                <td>名&nbsp;&nbsp;称</td>
                <td>
                    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                    <input type="text" name="gift_name" id="new_name"/>
                </td>
            </tr>
            <tr style="height: 10px;"></tr>
            <tr>
                <td>图&nbsp;&nbsp;片</td>
                <td>
                    <input type="file" name="gift_img"/>
                </td>
            </tr>
            <tr style="height: 10px;"></tr>
            <tr>
                <td>描&nbsp;&nbsp;述</td>
                <td>

                    <textarea name="gift_info"  cols="16" rows="5"></textarea>
                </td>
            </tr>
            <tr style="height: 10px;"></tr>
            <tr>
                <td>库&nbsp;&nbsp;存</td>
                <td>
                    <input type="text" name="gift_num" id="new_num"/>&nbsp;&nbsp;件&nbsp;&nbsp;<span class="num" style="cursor: pointer">50</span>&nbsp;&nbsp;<span class="num" style="cursor: pointer">100</span>&nbsp;&nbsp;<span class="num" style="cursor: pointer">200</span>
                </td>
            </tr>
            <tr>
                <td>积&nbsp;&nbsp;分</td>
                <td><input type="text" name="gift_price"/></td>
            </tr>
            <tr style="height: 10px;"></tr>
            <tr>
                <td colspan="2" align="center">
                    <input value="重置"  type="reset">
                    <input value="确定"  type="submit">
                </td>
            </tr>
        </table>
    </form>
</center>
    <!--引入左部-->
    @include('admin.di')
</body>
</html>
<script>

    $(function(){
        //获取礼品名称显示到text中
        $('.one').click(function(){
            $('#new_name').val($(this).attr("alt"));
//            $('#old_img').val($(this).attr("src"));
        });

        //获取数量显示到text中
        $('.num').click(function(){
            $('#new_num').val($(this).html());
        })
    })
</script>