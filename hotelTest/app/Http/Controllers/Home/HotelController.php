<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request;
use DB;
use Session;
class HotelController extends Controller
{	
	/*
	 *城市列表
	 */ 
	public function citylist()
	{ 
		 //城市查询
		 $arr = DB::table('city')->get();
		 //print_r($arr);die;
		 return view('Home/citylist')->with('arr',$arr);
		 
	}

	/*
	 *城市酒店列表
	 */
	public function hotellist(){

		$cityID = isset($_GET['cityID']) ? $_GET['cityID'] : "";
		$u_id=Session::get('u_id');

		//接受值
		$row = request::input();

		$u_id = request::session()->get('u_id');

		//print_r($row);die;
		$arr = DB::table('hotel')->where('city_id',$row['cityID'])
								// ->where()
		                         ->get();
		//print_r($arr);die;
		//通过酒店ID查询酒店的商标标识
		foreach($arr as $k=>$v){
			$hotel_id = $v['hotel_id'];
			//定义读取路径
			$arr[$k]['hotel_id_img'] = "Admin/hotel_img/".$hotel_id.".jpg";
		}

		$ar=DB::table('user_coll')->where('u_id',$u_id)->get();
		foreach ($arr as $key => $v) {
			foreach ($ar as $ke => $va) {
					if($va['hotel_id']==$v['hotel_id']){
							$arr[$key]['sc']=1;
					}
				
			}
		}




		
		if($cityID){
			//接受值
			$row = request::input();
			//print_r($row);die;
			if(!$row['checkInDate']){

				// Session()::forget('checkInDate');
				// Session()::forget('checkOutDate');
				echo "<script>alert('请先选择入住时间');window.location.href='Home_city';</script>";
			}
			if(!$row['checkOutDate']){
				echo "<script>alert('请先选择离开时间');window.location.href='Home_city';</script>";
			}
			session()->put('checkInDate',$row['checkInDate']);
 			session()->put('checkOutDate',$row['checkOutDate']);
 			session::save();
 			//$checkInDate = session::get('checkInDate');
 			//$checkOutDate = session::get('checkOutDate');
 			//echo $checkInDate;die;
	
			//通过酒店ID查询酒店的商标标识
			foreach($arr as $k=>$v){
				$hotel_id = $v['hotel_id'];
				//定义读取路径
				$arr[$k]['hotel_id_img'] = "Admin/hotel_img/".$hotel_id.".jpg";
			}
			//print_r($arr);die;
			return view('Home/hotellist')->with('arr',$arr)->with('row',$row)->with('u_id',$u_id);
		}else{
		 	echo "<script>alert('请先选择城市');window.location.href='Home_city';</script>";

		}


 	}

 	/*
 	 *酒店户型
 	 */
 	public function hotel(){
 		$hotel_id = isset($_GET['id']) ? $_GET['id'] :"";
 		//echo $hotel_id;die;
 		session()->put('id',$hotel_id);
 		session::save();
 		$id = session::get('id');
 		//echo $id;die;
 		//酒店的房型信息
 		$arr = DB::table('hotel')->join('hotel_house', 'hotel.hotel_id', '=', 'hotel_house.hotel_id')
					             ->join('house', 'hotel_house.house_id', '=', 'house.house_id')
					             ->where('hotel.hotel_id',$id)
					             ->get();
		//print_r($arr);die;
		//酒店地址
		$arr_address = DB::table('hotel')->where('hotel_id',$id)->select('hotel.hotel_id','hotel.hotel_address')->first();
		//print_r($arr_address);die;
		$arr_address['checkInDate'] = session::get('checkInDate');
		$arr_address['checkOutDate'] = session::get('checkOutDate');
		//print_r($arr_address);die;
 		return view('Home/hotel')->with('arr',$arr)->with('arr_address',$arr_address);
 	}

 	/*
 	 *修改时间
 	 */
 	public function hotel_time(){
 		$arr = Request::all();
 		//print_r($arr);die;
 		session()->put('checkInDate',$arr['CheckInDate']);
 		session()->put('checkOutDate',$arr['CheckOutDate']);
 		//$checkInDate = session::get('checkInDate');
 		//print_r($checkInDate);die;
 		return redirect("Home_hotel?id=".$arr['id']);
 	}

 	/*
 	 *酒店简介
 	 */
 	public function hotelinfo(){
 		$id = isset($_GET['id']) ? $_GET['id'] :"";
 		//echo $id;die;
 		//酒店详细
 		$arr = DB::table('hotel_p')->where('hotel_id',$id)->select('hotel_p.hotel_img')->get();
 		$row = DB::table('hotel')->where('hotel_id',$id)->first();
 		//print_r($arr);die;
 		//print_r($row);die;
 		return view('Home/hotelinfo')->with('arr',$arr)->with('row',$row);
 	}

 	

 	/*
 	 *酒店地图
 	 */
 	public function hotelmap(){
 		$id = isset($_GET['id']) ? $_GET['id'] :"";
 		//$id = session::get('id');
 		//echo $id;die;
 		$arr = DB::table('hotel')->join('city', 'hotel.city_id', '=', 'city.city_id')
                                 ->where("hotel_id",$id)->first();
 		//print_r($arr);die;
 		return view('Home/hotelmap')->with('arr',$arr);
 	}

 	 /*
 	 *酒店百度导航
 	 */
 	public function hotelmap_road(){
 		$id = isset($_GET['id']) ? $_GET['id'] : "";
 		//echo $id;die;
 		$arr = DB::table('hotel')->join('city', 'hotel.city_id', '=', 'city.city_id')
                                 ->where("hotel_id",$id)->first();
 		//print_r($arr);die;
 		$row = explode(",", $arr['hotel_point']);
 		//print_r($row);die;
 		$arr['PLN'] = $row[0];
 		$arr['PLA'] = $row[1];
 		//print_r($arr);die;
 		return view('Home/hotelmap_road')->with('arr',$arr);
 	}

 	 /*
 	 *酒店腾讯导航
 	 */
 	public function hotelmap_roads(){
 		$id = isset($_GET['id']) ? $_GET['id'] : "";
 		//echo $id;die;
 		$arr = DB::table('hotel')->join('city', 'hotel.city_id', '=', 'city.city_id')
                                 ->where("hotel_id",$id)->first();
 		//print_r($arr);die;
 		$row = explode(",", $arr['hotel_point']);
 		//print_r($row);die;
 		$arr['PLN'] = $row[0];
 		$arr['PLA'] = $row[1];
 		//print_r($arr);die;
 		return view('Home/hotelmap_roads')->with('arr',$arr);
 	}

 	/*
 	 *酒店设施
 	 */
 	public function hotelservice(){
 		$id = isset($_GET['id']) ? $_GET['id'] : "";
 		//echo $id;die;
 		$arr = DB::table('hotel_service')->join('hotel', 'hotel_service.hotel_id', '=', 'hotel.hotel_id')
										 ->select('hotel_service.*','hotel.hotel_name')
										 ->where('hotel_service.hotel_id',$id)
										 ->first();
 		//print_r($arr);die;
 		$arr['hotel_id_img'] = "Admin/hotel_img/".$id.".jpg";
 		//print_r($arr);die;
 		return view('Home/hotelservice')->with('arr',$arr);
 	}
 }