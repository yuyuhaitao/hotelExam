<?php

namespace App\Http\Controllers\Admin;

/**
 * 酒店添加控制器
 */

use App\Http\Controllers\Admin\AdminController;
use DB,Request,Validator,Session,Redirect;
use Input;
use Cookie;
 class HotelController extends AdminController
{
	/**
	 * 酒店列表
	 */
	public function Index(){
		//查询酒店表
		$data=DB::table('hotel')
				->select('hotel_id','hotel_name','city_name','hotel_close')
				->join('city','city.city_id','=','hotel.city_id')
				->paginate(5);
		//进行传值
		view()->share('data',$data);
		//返回酒店添加视图层
		return view('Admin/Hotel');
	}
	/**
	 * 酒店下图片列表
	 */
	public function Photo(){
			//接受酒店值
			$id=Input::get('id');
			//调用cookie存起酒店id
			Cookie::queue('hotel_id',$id);
			//对当前酒店名称查询
			$name=DB::table('hotel')->where('hotel_id',$id)->pluck('hotel_name');
			//进行当前酒店下图片查询查询
			$data=DB::table('hotel_p')->where('hotel_id',$id)->select('hotel_img','hotel_p_id')->get();
			//进行传值
			view()->share('name',$name);
			view()->share('data',$data);
			view()->share('id',$id);
			//返回该酒店图片视图层
			return view('Admin/HotelPhoto');
	}
	/**
	 * 酒店下套图执行添加
	 */
	public function PAdds(){
			$id=Cookie::get('hotel_id');
			//接受图片值
			$file=Input::file('file');
			//进行上传
			 if($file -> isValid()){
          								//检验一下上传的文件是否有效.
		         					 $clientName = $file -> getClientOriginalName();
		         					 $tmpName = $file ->getFileName(); // 缓存在tmp文件夹中的文件名 例如 php8933.tmp 这种类型的.
		          					 $realPath = $file -> getRealPath();    //这个表示的是缓存在tmp文件夹下的文件的绝对路径 
		          					 $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
		          					 $mimeTye = $file -> getMimeType();
		          					 $newName = md5(date('ymdhis').$clientName).".jpg";
		          					 $path = $file -> move(public_path().'/Admin/hotel_sku',$newName);
  										$names = "Admin/hotel_sku/".$newName;
    							}
    		//执行添加
  
    			$pd=DB::table('hotel_p')->insert(['hotel_id'=>$id,'hotel_img'=>$names]);
    			if($pd){
    				echo $names;	
    			}else{
    				echo "<script>alert('上传失败')</script>";
    			}
			
	}
	/**
	 * 酒店下套图执行删除
	 */
	public function PDel(){
				//接受值进行删除
				$id=Input::get('id');
				$pid=Cookie::get('hotel_id');
				$pd=DB::table('hotel_p')->where('hotel_p_id','=',$id)->delete();
    			if($pd){
    				return redirect("Admin_HotelPhoto?id=$pid");
    			}else{
    				echo "<script>alert('删除失败');</script>";
    			}
	}
		/**
		 * 酒店下户型查询
		 */
	public function House(){
			//接受酒店值
			$id=Input::get('id');
			//调用cookie存起酒店id
				Cookie::queue('hotel_id'.$id,$id);

			//对当前酒店名称查询
			$name=DB::table('hotel')->where('hotel_id',$id)->pluck('hotel_name');
			//进行当前酒店下图片查询查询
			$data=DB::table('hotel_house')
							->join('house','hotel_house.house_id','=','house.house_id')
							->where('hotel_id',$id)
							->select('house_name','price','house_img','hotel_house_id')
							->paginate(5);
				
			//进行传值
			view()->share('name',$name);
			view()->share('data',$data);
			view()->share('id',$id);
			//返回该酒店图片视图层
			return view('Admin/HotelHouse');
	}
	/**
	 * 酒店下户
	 */
	public function HouseAdd(){
			//接受当前酒店id
			$id=Input::get('hotel_id');
			//对户型进行查询
			$data=DB::table('house')->select('house_name','house_id')->get();
			//返回视图层并传值
			view()->share('data',$data);
			view()->share('id',$id);		
			return view('Admin/HotelHouseAdd');
	}
	/**
	 * 对添加执行
	 */
	public function HouseAdds(){
		//接受值
		$input=Input::all();

		  $rules = [
			            'hotel_id' => 'required',
			            'house_id' => 'required',
			            'price' => 'required',
			            'house_num' => 'required',
			            'house_img' => 'required',
			        ];
			        $messages = [
			            'hotel_id.required' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															提交失败未获取酒店</li>",
						'house_id.required' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															户型不能为空</li>",
						'price.required' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															请填写价格</li>",
						'hotel_phone.required' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															电话不能为空</li>",
						'house_num.required' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															请填写房间数</li>",
						'house_img.required' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															文件不能为空</li>",
						
			        ];
			        $validator = Validator::make($input, $rules,$messages);

			        if ($validator->fails()){

			            return redirect("/Admin_HotelHouseAdd?hotel_id=".$input['hotel_id'])->withErrors($validator);
			        }
			        		$file=Input::file('house_img');
			        	 if($file -> isValid()){
          								//检验一下上传的文件是否有效.
		         					 $clientName = $file -> getClientOriginalName();
		         					 $tmpName = $file ->getFileName(); // 缓存在tmp文件夹中的文件名 例如 php8933.tmp 这种类型的.
		          					 $realPath = $file -> getRealPath();    //这个表示的是缓存在tmp文件夹下的文件的绝对路径 
		          					 $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
		          					 $mimeTye = $file -> getMimeType();
		          					 $newName = md5(date('ymdhis').$clientName).".jpg";
		          					 $path = $file -> move(public_path().'/Admin/hotel_house',$newName);
  										$names = "Admin/hotel_house/".$newName;
    							}
    					$arr=Input::all();
    					unset($arr['_token']);
    					$arr['house_img']=$names;
			     $pd=DB::table('hotel_house')->insert($arr);
    			if($pd){
    					return redirect("/Admin_HotelHouse?id=".$arr['hotel_id']);
    			}else{
    				echo "<script>alert('添加失败');window.history.back();</script>";
    			}
	}
	/**
	 * 酒店详情
	 */
	public function Details(){
			//接受酒店id
			$id=Input::get('id');
			//进行单条查询
			$data=DB::table('hotel')->join('city','city.city_id','=','hotel.city_id')->where('hotel_id','=',$id)->first();
			//配套服务查询
			$pei=DB::table('hotel_service')->where('hotel_id','=',$id)->first();
			//进行传值
			view()->share('data',$data);
			view()->share('pei',$pei);
			return view('Admin/HotelDetails');
	}
	/**
	 * 酒店下配置修改
	 */
	public function DetailsUpd(){
		//接受值
		$input=Input::all();
		//进行修改
		$pd=DB::table('hotel_service')->where(['hotel_id'=>$input['hotel_id']])->update(array($input['title']=>$input['pd']));
		if(!$pd){
			echo 0;
		}else{
			echo 1;
		}

	}


	/*
	 *添加地图
	 */
	public function Map(){
		$id = isset($_GET['id']) ? $_GET['id'] : "";
		//echo $id;die;
		$arr = DB::table('hotel')->join('city', 'hotel.city_id', '=', 'city.city_id')
								 ->where('hotel_id',$id)
								 ->first();
		//print_r($arr);die;
 		return view('Admin/map')->with('arr',$arr);
	}
	/*
	 *添加地图页面
	 */
	public function Mapadd(){
		$id = isset($_GET['id']) ? $_GET['id'] : "";
		//echo $id;die;
		//echo 1;
		$PLN = isset($_GET['PLN']) ? $_GET['PLN'] : "";
		$PLA = isset($_GET['PLA']) ? $_GET['PLA'] : "";
		//echo $PLA;die;
		$point = $PLN.",".$PLA;
		//echo $point;die;
		$re = DB::table('hotel')->where('hotel_id',$id)->update(['hotel_point' => $point]);  

		if($re){
			echo 1;
		}else{
			echo 0;
		}
    

	}


	   //店铺关门与开张
    public function Closes(){
        //接受id
        $id=input::get('id');
        $pd=DB::table('hotel')->where(['hotel_id'=>$id])->update(array('hotel_close'=>1));
		if($pd){
			return redirect("/Admin_Hotel");
		}else{
			echo "<script>alert('关店失败');window.history.back();</script>";
		}
    }

}
