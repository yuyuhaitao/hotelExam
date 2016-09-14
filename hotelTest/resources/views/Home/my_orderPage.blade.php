<ul>
@if(!empty($arr))
    @foreach($arr as $k => $v)
        <li>
            <span class="order-hotel-name"><a href="Home_Oinfo?order_id={{ $v['order_id'] }}" title="查看详情">{{ $v['hotel_name'] }}</a></span>
            @if($v['order_status']=='待支付')
                <span class="order-time">{{ $v['pay_time'] }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            @else
                <span class="order-time">{{ $v['pay_time'] }}&nbsp;&nbsp;<a href="Home_Content?order_id={{ $v['order_id'] }}" title='立即评价'><font color="black">评价</font></a></span>
            @endif
        </li>
    @endforeach
</ul>
    <input type="hidden" id='tiaojian' value="{{ $if }}" />
    @if($pagesum!=1)
        <div id="ctl00_ContentPlaceHolder1_AspNetPager1" style="width:100%;text-align:center;">
            <a href="javascript:void(0)" onclick="Opage(1)">首页</a>
            <a href="javascript:void(0)" onclick="Opage({{ $prev }})">上一页</a>
            <a href="javascript:void(0)" onclick="Opage({{ $next }})">下一页</a>
            <a href="javascript:void(0)" onclick="Opage({{ $pagesum }})">尾页</a>
        </div>
    @endif
@else
    <div align="center">空</div>
@endif