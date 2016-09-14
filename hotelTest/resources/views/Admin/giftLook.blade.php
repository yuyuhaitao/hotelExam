<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>礼品列表</title>
    <link rel="shortcut icon" href="{{ asset('admin/images/gift/1.png') }}" />
</head>
<body>
    <!--引入顶部-->
    @include('admin.main')
            <p style="margin-top: 50px;"><a href="{{ URL('Admin_giftList') }}"><input type="button" value="返回列表"/></a></p>
            <div style=" margin-top:100px;">
                    <div style="float: left;"><img src="{{ $arr->gift_img }}" width="300" height="300"></div>
                    <div style="float: left; margin-top: 50px;padding-left: 50px;">{{ $arr->gift_info }}</div>
            </div>
    <!--引入左部-->
    @include('admin.di')
</body>
</html>