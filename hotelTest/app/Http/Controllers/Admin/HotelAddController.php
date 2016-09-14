<?php

namespace App\Http\Controllers\Admin;

/**
 * 酒店添加控制器
 */
use App\Http\Controllers\Admin\AdminController;
use DB,Request,Input,Validator,Session,Redirect;

 class HotelAddController extends AdminController
{
	/**
	 * 酒店添加
	 */
	public function HotelAdd(){
		//查询地区表
		$data=DB::table('city')->get();
		//进行传值
		view()->share('data',$data);
		//返回酒店添加视图层
		return view('Admin/HotelAdd');
	}
	public function HotelAdds(){
		//接受所有值
		 $input=Input::all();
		//进行表单验证
			    	    $rules = [
			            'hotel_name' => 'required|unique:hotel',
			            'city_id' => 'required',
			            'hotel_phone' => 'required|numeric',
			            'hotel_address' => 'required',
			            'hotel_info' => 'required',
			            'hotel_feng' => 'image',
			        ];
			        $messages = [
			            'hotel_name.required' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															酒店不能为空</li>",
						'hotel_name.unique:hotel' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															酒店已存在</li>",
						'city_id.required' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															请选择城市</li>",
						'hotel_phone.required' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															电话不能为空</li>",
						'hotel_phone.numeric' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															电话必须全为数字</li>",
						'hotel_address.required' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															详细地址不能为空</li>",
						'hotel_info.required' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															简介不能为空</li>",
						'hotel_feng.required' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															封面不能为空</li>",
						'hotel_feng.image' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															封面格式必须为(jpeg, png, bmp, gif 或 svg)</li>",
			        ];
			        $validator = Validator::make($input, $rules,$messages);
			        if ($validator->fails()){
			            return redirect('/Admin_HotelAdd')->withErrors($validator);
			        }
			        unset($input['_token']);
			        //执行图片上传
			        unset($input['hotel_feng']);
			        $id=DB::table('hotel')->insertGetID($input);
			        DB::table('hotel_service')->insert(['hotel_id'=>$id]);
			        if($id){
			        	//进行图片上传
			        	$file =Input::file('hotel_feng');
			         		 //print_r($file->isValid());die;
      							 if($file -> isValid()){
          								//检验一下上传的文件是否有效.
		         					 $clientName = $file -> getClientOriginalName();
		         					 $tmpName = $file ->getFileName(); // 缓存在tmp文件夹中的文件名 例如 php8933.tmp 这种类型的.
		          					 $realPath = $file -> getRealPath();    //这个表示的是缓存在tmp文件夹下的文件的绝对路径 
		          					 $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
		          					 $mimeTye = $file -> getMimeType();
		          					 $newName = "$id".".jpg";
		          					 $path = $file -> move(public_path().'/Admin/hotel_img',$newName);
    													}
    							//进行跳转回酒店列表
    							return redirect('/Admin_Hotel');
			        	}else{
			        		//失败后返回
			        		echo "<script>alert('添加失败');window.location=back;</script>";
			        	}
			         		 

	}
}
