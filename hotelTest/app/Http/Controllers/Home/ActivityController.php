<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request,DB,Input,Session;

/**
 * 前台活动
 */
class ActivityController extends Controller
{
	//活动列表
	public function index()
	{
		$now = date('Y-m-d');
		$arr = DB::table('article')->where('start_date','<=',$now)->where('end_date','>=',$now)->get();
		return view('Home/activitys',['arr'=>$arr]);
	}

	//活动详情
	public function info()
	{
		$id = Input::get('id');
		$arr = DB::table('article')->where('article_id',$id)->first();
		return view('Home/activitysInfo',['arr'=>$arr]);
	}
}