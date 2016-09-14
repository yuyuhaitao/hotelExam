<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request,Session;
use DB;
class CollectionController extends Controller
{
	/**
	 * 收藏酒店
	 * [collectadd description]
	 * @return [type] [description]
	 */
	public function collectadd()
	{
		$hotel_id=request::get('hotel_id');
		$u_id = request::session()->get('u_id');
		echo $re=DB::table('user_coll')->insert(['hotel_id' => $hotel_id, 'u_id' => $u_id]);

	}
	/**
	 * 取消酒店
	 * [collectdel description]
	 * @return [type] [description]
	 */
	public function collectdel()
	{
		$hotel_id=request::get('hotel_id');
		$u_id = request::session()->get('u_id');
		echo $re=DB::table('user_coll')->where('u_id',$u_id)->where('hotel_id',$hotel_id)->delete();
	}
}