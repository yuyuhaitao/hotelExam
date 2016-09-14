<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use Request,Session,redirect;
use DB;
class OrderController extends Controller
{	
	/**
	 * 预定酒店选择
	 * [orderadd description]
	 * @return [type] [description]
	 */
	public function orderadd(){
		
			if(empty(Session::get('u_id'))){
				return redirect("/Home_login");die;
		}

		$hotel_house_id=Request::get('hotel_house_id');

		$checkInDate=session::get('checkInDate');
		$checkOutDate=session::get('checkOutDate');


		$daytime=strtotime($checkOutDate)-strtotime($checkInDate);
		$day=date('d',$daytime)-1;
		$data=DB::table('hotel_house')
			->join('house','hotel_house.house_id','=','house.house_id')
			->select('house_name','house_num','hotel_house_id','price','hotel_id','hotel_house.house_id')
			->where('hotel_house.hotel_house_id',$hotel_house_id)
            ->first();
        $data['checkInDate']=$checkInDate;
        $data['checkOutDate']=$checkOutDate;
        $data['price']=$data['price']*$day;
		return view('Home/orderadd')->with('data',$data);
	}
	/**
	 * 添加订单
	 * [orderadds description]
	 * @return [type] [description]
	 */
	public function orderadds()
	{

		$data=Request::input();
		$data['guest']=implode(',',$data['guest']);
		$data['pay_time']=date('Y-m-d H:i:s');
		unset($data['_token']);
		$u_id = request::session()->get('u_id');
		$data['u_id']=$u_id;
		$order_id=DB::table('order')->insertGetId($data);
		return redirect('Home_payment?order_id='.$order_id);
	}
	/**
	 * 选择支付页面
	 * [payment description]
	 * @return [type] [description]
	 */
	public function payment()
	{
		$hotel_house_id=Request::get('hotel_house_id');
		$u_id = request::session()->get('u_id');
		$u_money=DB::table('users')
			->where('u_id',$u_id)
			->select('u_money')
			->first();
		$order_id=Request::get('order_id');
		$data=DB::table('order')
			->join('house','order.house_id','=','house.house_id')
			->join('hotel','order.hotel_id','=','hotel.hotel_id')
			->select('hotel_name','house_name','prices','hotel_house_id','order_num','order_id')
			->where('order_id',$order_id)
			->first();
		$data['u_money']=$u_money['u_money'];
		return view('Home/payment')->with('data',$data);
	}
	/**
	 * 余额支付
	 * [balance description]
	 * @return [type] [description]
	 */
	public function balance()
	{
		$prices=Request::get('prices');
		$hotel_house_id=Request::get('hotel_house_id');
		$order_num=Request::get('order_num');
		$order_id=Request::get('order_id');
		$u_id = request::session()->get('u_id');
		$re=DB::table('users')->where('u_id',$u_id)->decrement('u_money', $prices);
		if ($re) {
			DB::table('hotel_house')->where('hotel_house_id',$hotel_house_id)->decrement('house_num', $order_num);
			DB::table('order')->where('order_id',$order_id)->update(['order_status'=>'已支付']);
		}
		echo 1;
	}
	/**
	 * 支付宝支付
	 * [Alipay description]
	 */
	public function Alipay()
	{
			$prices=Request::get('prices');
			$hotel_house_id=Request::get('hotel_house_id');
			$order_num=Request::get('order_num');
			$order_id=Request::get('order_id');
			$u_id = request::session()->get('u_id');
			// ******************************************************配置 start*************************************************************************************************************************
			//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
			//合作身份者id，以2088开头的16位纯数字
			$alipay_config['partner']		= '2088002075883504';
			//收款支付宝账号
			$alipay_config['seller_email']	= 'li1209@126.com';
			//安全检验码，以数字和字母组成的32位字符
			$alipay_config['key']			= 'y8z1t3vey08bgkzlw78u9cbc4pizy2sj';
			//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
			//签名方式 不需修改
			$alipay_config['sign_type']    = strtoupper('MD5');
			//字符编码格式 目前支持 gbk 或 utf-8
			//$alipay_config['input_charset']= strtolower('utf-8');
			//ca证书路径地址，用于curl中ssl校验
			//请保证cacert.pem文件在当前文件夹目录中
			$alipay_config['cacert']    = getcwd().'\\cacert.pem';
			//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
			$alipay_config['transport']    = 'http';
			// ******************************************************配置 end*************************************************************************************************************************

			// ******************************************************请求参数拼接 start*************************************************************************************************************************
			$parameter = array(
			    "service" => "create_direct_pay_by_user",
			    "partner" => $alipay_config['partner'], // 合作身份者id
			    "seller_email" => $alipay_config['seller_email'], // 收款支付宝账号
			    "payment_type"	=> '1', // 支付类型
			    "notify_url"	=> "http://www.sanzu.com/Home_Orderlist", // 服务器异步通知页面路径
			    "return_url"	=> "http://www.sanzu.com/Home_Orderlist", // 页面跳转同步通知页面路径
			    "out_trade_no"	=> uniqid().$u_id, // 商户网站订单系统中唯一订单号
			    "subject"	=> "格子微酒店支付", // 订单名称
			    "total_fee"	=> "0.01", // 付款金额
			    "body"	=> "$order_id,$hotel_house_id,$order_num", // 订单描述 可选
			    "show_url"	=> "", // 商品展示地址 可选
			    "anti_phishing_key"	=> "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
			    "exter_invoke_ip"	=> "", // 客户端的IP地址
			    "_input_charset"	=> 'utf-8', // 字符编码格式
			);
			// 去除值为空的参数
			foreach ($parameter as $k => $v) {
			    if (empty($v)) {
			        unset($parameter[$k]);
			    }
			}
			// 参数排序
			ksort($parameter);
			reset($parameter);

			// 拼接获得sign
			$str = "";
			foreach ($parameter as $k => $v) {
			    if (empty($str)) {
			        $str .= $k . "=" . $v;
			    } else {
			        $str .= "&" . $k . "=" . $v;
			    }
			}
			//$parameter['id'] =$user['ddxq']['good_d_id'];
			$parameter['sign'] = md5($str . $alipay_config['key']);
			$parameter['sign_type'] = $alipay_config['sign_type'];
			// ******************************************************请求参数拼接 end*************************************************************************************************************************


			// ******************************************************模拟请求 start*************************************************************************************************************************
			$sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='https://mapi.alipay.com/gateway.do?_input_charset=utf-8' method='post'>";
			foreach ($parameter as $k => $v) {
			    $sHtml.= "<input type='hidden' name='" . $k . "' value='" . $v . "'/>";
			}

			$sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";

			// ******************************************************模拟请求 end*************************************************************************************************************************

			echo $sHtml;
	}
	/**
	 * 支付宝支付完成
	 * [Alipayend description]
	 */
	public function Alipayend()
	{
		$data=Request::get('body');
		$arr=explode(',', $data);
		DB::table('hotel_house')->where('hotel_house_id',$arr[1])->decrement('house_num', $arr[2]);
		DB::table('order')->where('order_id',$arr[0])->update(['order_status'=>'已支付']);
		return redirect('Home_Orderlist');
	}

}