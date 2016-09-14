<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request,DB,Input,Session,Validator;

/**
 * 订单（酒店）评论
 */
class ContentController extends Controller
{
	//评价表单
	public function index()
	{
		$order_id = isset($_GET['order_id']) ? Input::get('order_id') : '' ;
		//查数据sql语句
		$arr = DB::table('order')->join('hotel', 'order.hotel_id', '=', 'hotel.hotel_id')->join('house', 'order.house_id', '=', 'house.house_id')->select('hotel_name','order.hotel_id','order_id')->where('order_id',$order_id)->first();
		$u_id = Session::get('u_id');
		$content = DB::table('content')->where('order_id',$order_id)->where('u_id',$u_id)->get();
		//print_r($content);die;
		if(!empty($content)){
			return view('Home/Content',['arr'=>$arr,'u_id'=>$u_id,'content'=>$content]);
		}else{
			return view('Home/Content',['arr'=>$arr,'u_id'=>$u_id,'content'=>1]);
		}	
	}

	//执行添加
	public function Add()
	{
		$input = Request::input();
		$rules = [
    		'is_good' => 'required',
    		'content_info' => 'required',
    	];
    	$messages = [
    		'is_good.required' => "<font color='red'>请选择评分</font>",
    		'content_info.required' => "<font color='red'>请输入评论</font>",
    	];
    	$validator = Validator::make($input, $rules, $messages);

    	if ($validator->fails()){
            return redirect('Home_Content?order_id='.$input['order_id'])->withErrors($validator);
        }

		$input['content_info'] = strip_tags($input['content_info']);
		unset($input['_token']);
		$input['content_time'] = date('Y-m-d H:i:s');
		$bool = DB::table('content')->insert($input);
		if($bool){
			return redirect('Home_Content?order_id='.$input['order_id']);
		}
	}

	public function Hotel(){
		$id = isset($_GET['id']) ? Input::get('id') : '' ;
		$page = isset($_GET['page']) ? Input::get('page') : 1 ;
		//符合条件的总条数
		$count = DB::table('content')->where('hotel_id',$id)->count();

		//分页数据
		$num = 3;
		$pagesum = ceil($count/$num);
		$limit = $num*($page-1);

		//查数据sql语句
		$arr = DB::table('content')->join('users', 'content.u_id', '=', 'users.u_id')->where('hotel_id',$id)->skip($limit)->take($num)->get();
		//print_r($arr);die;
		if(!empty($arr)){
			foreach ($arr as $k => $v) {
	            if($v){
	                //处理名称
	                foreach ($arr as $key => $value) {
	                    $len = strlen($value['u_name']);
	                    if($len>6){
	                        $value['u_name'] = substr($value['u_name'],0,3)."*".substr($value['u_name'],-3,3);
	                    }else{
	                        $value['u_name'] = substr($value['u_name'],0,3).'*';
	                    }
	                    $names[] = $value['u_name']; 
	                }
	            }
	        }
	        //上下页
			$prev = ($page-1<=1)?1:$page-1;
			$next = ($page+1>=$pagesum)?$pagesum:$page+1;
			$pagesum = $pagesum;
			return view('Home/HotelContent',['arr'=>$arr,'prev'=>$prev,'next'=>$next,'pagesum'=>$pagesum,'names'=>$names,'id'=>$id]);
	     }else{
	     	echo "<script>alert('本酒店暂无评论');history.go(-1);</script>";
	     }
	    
		
	}
}