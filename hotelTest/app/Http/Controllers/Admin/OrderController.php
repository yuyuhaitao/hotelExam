<?php

namespace App\Http\Controllers\Admin;

/**
 * 地区管理控制器
 */
use App\Http\Controllers\Admin\AdminController;
use DB,Request,input,Validator,Session,Redirect;

 class OrderController extends AdminController
{

	/**
	 * 调用地区添加页面
	 */
    public function OrderList()
    {
    	//接收后台用户id
    	$user_id= Session::get('user_id');
        //echo $user_id;die;
    	//查询该用户下酒店的订单
        $arr = DB::table('users_hotel')->join('hotel', 'users_hotel.hotel_id', '=', 'hotel.hotel_id')
            						   ->join('order', 'hotel.hotel_id', '=', 'order.hotel_id')
            						   ->join('hotel_house','order.hotel_house_id','=','hotel_house.hotel_house_id')
            						   ->join('house','hotel_house.house_id','=','house.house_id')
            						   ->select('hotel.hotel_name','house.house_name','hotel_house.price','order.u_id','order.order_status','order.pay_time','order.use_time','order.order_num','order.start_time','order.end_time','price','phone')
            						   ->where('users_hotel.user_id',$user_id)
           							   ->Paginate(5);


        //print_r($arr);die;
       
        //print_r($arr);die;					   
    	//返回添加页面
    	return view('Admin/orderlist')->with('arr',$arr);
    }
}