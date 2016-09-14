<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use DB,Session,Input,Redirect;

class HelpController extends Controller
{
	//常见问题列表
	public function index()
	{
		$arr = DB::table('helptext')->where('user_id',0)->paginate(5);
		return view('Home/help',['arr'=>$arr]);
	}
	//人工提问
	public function man()
	{
		$u_id = Session::get('u_id');
		if(Session::has('u_id')){
			$arr = DB::table('helptext')->where('user_id',$u_id)->get();
			return view('Home/helpman',['arr'=>$arr]);
		}else{
			return view('Home/helpman',['arr'=>'']);
		}
	}
	//提交问题
	public function question()
	{
		$question = $_GET['question'];
		// Session::put('u_id', '3');
		// Session::save();
		// Session::forget('u_id');
		// Session::save();
		$u_id = Session::get('u_id');
		if(!Session::has('u_id')){
			echo 0;
		}else{
			//判断同一用户在一天内提问的数量
			$date = date('Y-m-d');
			if(Session::has('user')){
				$num = Session::get('user');
				$userNum = array_count_values($num['times']);
				//print_r($userNum);
				$newNum = array_flip($userNum);
				//print_r($newNum);
				$number = array_search($u_id.'_'.$date, $newNum);
				if($number>=3){
					echo 3;die;
				}
			}
			//添加问题
			$bool = DB::table('helptext')->insert(array('help_title'=>$question,'user_id'=>$u_id));
			if($bool){
				Session::push('user.times', $u_id.'_'.$date, time()+3600*24);
				echo 1;
			}
		}
	}

	//用户历史问题列表
	public function Uquestion()
	{
		$u_id = Session::get('u_id');
		$arr = DB::table('helptext')->where('user_id',$u_id)->get();
		return view('Home/helphis',['arr'=>$arr]);
	}

	//用户历史问题列表
	public function Qdel()
	{
		$help_id = Input::get('help_id');
		$arr = DB::table('helptext')->where('help_id',$help_id)->delete();
		return Redirect::action('Home\HelpController@Uquestion');
	}
}