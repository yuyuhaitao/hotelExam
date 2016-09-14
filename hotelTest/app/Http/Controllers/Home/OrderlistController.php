<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request,DB,Input,Session;

/**
 * 前台订单
 */
class OrderlistController extends Controller
{
	//订单列表
	public function index()
	{
		$u_id = Session::get('u_id');
		if(!Session::has('u_id')){
			return redirect("/Home_login");die;
		}else{
			$arr = $this->OrderData(1);
			return view('Home/my_order',['arr'=>$arr['data'],'prev'=>$arr['prev'],'next'=>$arr['next'],'pagesum'=>$arr['pagesum'],'if'=>1]);
		}
	}

	//公共数据
	public function OrderData($if)
	{
		$page = isset($_GET['page']) ? Input::get('page') : 1 ;
		$u_id = Session::get('u_id');
		//符合条件的总条数
		$query1 = DB::table('order')->where('u_id',$u_id);
		if($if!=1){
			$query1->where('order_status',$if,'待支付');
		}
		$count = $query1->count();
		//分页数据
		$num = 5;
		$pagesum = ceil($count/$num);
		$limit = $num*($page-1);
		//查数据sql语句
		$query = DB::table('order')->orderBy('order_id', 'desc')->join('hotel', 'order.hotel_id', '=', 'hotel.hotel_id')->select('order_id','hotel_name','pay_time','order_status')->where('u_id',$u_id);
		if($if!=1){
			$query->where('order_status',$if,'待支付');
		}
		$query->skip($limit)->take($num); 
		$arr['data'] = $query->get();
		//上下页
		$arr['prev'] = ($page-1<=1)?1:$page-1;
		$arr['next'] = ($page+1>=$pagesum)?$pagesum:$page+1;
		$arr['pagesum'] = $pagesum;
		return $arr;
	}

	//列表分页
	public function Opage()
	{
		$if = isset($_GET['if']) ? Input::get('if') : 1 ;
		$arr = $this->OrderData($if);
		return view('Home/my_orderPage',['arr'=>$arr['data'],'prev'=>$arr['prev'],'next'=>$arr['next'],'pagesum'=>$arr['pagesum'],'if'=>$if]);
	}

	//未完成的订单
	public function Unfinish()
	{
		$if = "=";
		$arr = $this->OrderData($if);
		return view('Home/my_orderPage',['arr'=>$arr['data'],'prev'=>$arr['prev'],'next'=>$arr['next'],'pagesum'=>$arr['pagesum'],'if'=>$if]);
	}

	//已完成的订单
	public function Finish()
	{
		$if = "!=";
		$arr = $this->OrderData($if);
		return view('Home/my_orderPage',['arr'=>$arr['data'],'prev'=>$arr['prev'],'next'=>$arr['next'],'pagesum'=>$arr['pagesum'],'if'=>$if]);
	}

	//订单详情
	public function Oinfo()
	{
		$order_id = isset($_GET['order_id']) ? Input::get('order_id') : '' ;
		//查数据sql语句
		$arr = DB::table('order')->join('hotel', 'order.hotel_id', '=', 'hotel.hotel_id')->join('house', 'order.house_id', '=', 'house.house_id')->where('order_id',$order_id)->first();
		//print_r($arr);die;
		return view('Home/my_orderInfo',['arr'=>$arr]);
	}
}