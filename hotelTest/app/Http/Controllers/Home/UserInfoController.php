<?php

namespace App\Http\Controllers\Home;
/**
 * 前台个人中心
 */
use App\Http\Controllers\Controller;
use Input,DB,Validator,Redirect;
use Illuminate\Http\Request;
use Cookie;
use Session;
class UserInfoController extends Controller
{
		/**
		 * 我的格子
		 * @return [信息] [个人信息]
		 */
	public function index()
	{

		if(empty(Session::get('u_id'))){
				return redirect("/Home_login");die;
		}
		//获取用户id
		$id=Session::get('u_id');
		//进行查询当前用户
		$data=DB::table('users')->where('u_id','=',$id)->first();
		//进行前台传值
		 return view('Home/UserInfo',[
		 		'data'=>$data
		 	]);
	}
	/**
	 * 进行用户头像上传
	 */
	public function Img(){
			$file=Input::file('file');
			 if($file -> isValid()){
					//检验一下上传的文件是否有效.
				 $clientName = $file -> getClientOriginalName();
				 $tmpName = $file ->getFileName(); // 缓存在tmp文件夹中的文件名 例如 php8933.tmp 这种类型的.
				 $realPath = $file -> getRealPath();    //这个表示的是缓存在tmp文件夹下的文件的绝对路径 
				 $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
				 $mimeTye = $file -> getMimeType();
				 $newName = md5(date('ymdhis').$clientName).".jpg";
				 $path = $file -> move(public_path().'/Home/User_img',$newName);
					$names = "Home/User_img/".$newName;
    			}
    			$id=Session::get('u_id');
    			//进行修改本人相片
    				$pd=DB::table('users')->where('u_id',$id)->update(['u_img'=>$names]);
    			if($pd){
    				return redirect("/Home_UserInfo");
    			}else{
    				echo "<script>alert('上传失败');</script>";
    			}
	}
	/**
	 * 充值页面
	 */
		public function Chong(){
				//返回订单页面
				return view('Home/Home_UserChong');
		}
			/**
			 * 支付宝进行充值
			 */
		public function Money(){
			//模拟id
			$id=Session::get('u_id');
			$je=Input::get('je');
				 header("content-type:text/html;charset=utf8");

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
			    "notify_url"	=> "http://www.sanzu.com/Home_UserCheng", // 服务器异步通知页面路径
			    "return_url"	=> "http://www.sanzu.com/Home_UserCheng", // 页面跳转同步通知页面路径
			    "out_trade_no"	=> uniqid().$id, // 商户网站订单系统中唯一订单号
			    "subject"	=> "格子微酒店充值", // 订单名称
			    "total_fee"	=> "0.01", // 付款金额
			    "body"	=> $je, // 订单描述 可选
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
		 * 数据库进行充值
		 */
		public function Cheng(){
			//模拟接受sessionid
			$id=Session::get('u_id');
			//接受值
			$je=Input::get('body');

			$pd=DB::table('users')->where('u_id',$id)->increment('u_money',$je);
			DB::table('users')->where('u_id',$id)->increment('u_point',$je);
    			if($pd){
    				echo "<script>alert('充值成功');</script>";
    			}else{
    				echo "<script>alert('充值失败');</script>";
    				die;
    			}
    			return redirect("/Home_UserInfo");
		}
		/**
		 * 前台用户足迹
		 */
		public function Foot(){
					//模拟接受sessionid
					$id=Session::get('u_id');
					$name=DB::table('users')->where('u_id',$id)->pluck('u_name');
				//进行数据查询
				$date=DB::table('order')
						->where(['u_id'=>$id,'order_status'=>"消费完成"])
						->join('hotel','order.hotel_id','=','hotel.hotel_id')
						->join('city','hotel.city_id','=','city.city_id')
						->select('hotel_name','city_name','end_time')
						->orderBy('order_id', 'desc')
						->get();
					//返回数据层
				return view('Home/UserZuji',['date'=>$date,'name'=>$name]);
		}
		/**
		 * 执行退出
		 */
		public function Sxh(){
			//对session执行销毁
			Session::pull('u_id');  
			Session::save();
			return redirect("/");
		}
		/*
		收藏列表
		 */
		public function Coll(){
				//获取用户session
				$id=Session::get('u_id');
				//联查到酒店
				$date=DB::table('user_coll')->where('u_id',$id)->join('hotel','user_coll.hotel_id','=','hotel.hotel_id')->get();
				//传值到前台
				return view('Home/UserColl',['date'=>$date]);				
		}
		/**
			 * 收藏酒店
			 * [collectadd description]
			 * @return [type] [description]
			 */
			public function collectadd()
			{
				$hotel_id=Input::get('hotel_id');
				$u_id = Session::get('u_id');
				echo $re=DB::table('user_coll')->insert(['hotel_id' => $hotel_id, 'u_id' => $u_id]);

			}
			/**
			 * 取消酒店
			 * [collectdel description]
			 * @return [type] [description]
			 */
			public function collectdel()
			{
				$hotel_id=Input::get('hotel_id');
				$u_id = Session::get('u_id');
				echo $re=DB::table('user_coll')->where('u_id',$u_id)->where('hotel_id',$hotel_id)->delete();
			}

				/**
			 * 取消酒店2
			 * [collectdel description]
			 * @return [type] [description]
			 */
			public function collectdels()
			{
				$hotel_id=Input::get('hotel_id');
				$u_id = Session::get('u_id');
				echo $re=DB::table('user_coll')->where('u_id',$u_id)->where('hotel_id',$hotel_id)->delete();
				return redirect("Home_UserColl");
			}
			

}