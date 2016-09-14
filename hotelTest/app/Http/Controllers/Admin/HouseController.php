<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use DB,Request,Validator,Session,Redirect;
use Input;
/**
 * 户型管理控制器
 */

 class HouseController extends AdminController


{
	//户型列表
    public function houseList()
    {
    	$arr = DB::table('house')->paginate(5);
    	return view('Admin/house_list',['arr'=>$arr]);
    }

    //户型名称即点即改
    public function nameEdit()
    {
    	$arr = Request::all();
        $res = DB::table('house')->where('house_id',$arr['house_id'])->update(array('house_name'=>$arr['house_name']));
        if($res){
            return 1;
        }
    }

    //户型删除
    public function houseDel()
    {
    	$id = Request::input('house_id');
    	$res = DB::table('house')->where('house_id',$id)->delete();
        return Redirect::action('Admin\HouseController@houseList');
    }

    //户型添加
    public function houseAdd()
    {
        return view('Admin/house_add');
    }

    //执行添加
    public function houseInsert()
    {
    	$arr = Request::all();
    	$rules = [
    		'house_name' => 'required|unique:house',
    	];
    	$messages = [
    		'house_name.required' => '<li class="text-warning bigger-110 orange"><i class="icon-warning-sign"></i>不能为空</li>',
    		'house_name.unique' => '<li class="text-warning bigger-110 orange"><i class="icon-warning-sign"></i>已存在</li>',
    	];
    	$validator = Validator::make($arr, $rules, $messages);

    	if ($validator->fails()){
            return redirect('Admin_houseAdd')->withErrors($validator);
        }

    	$arr['addtime'] = date('Y-m-d H:i:s');
        unset($arr['_token']);
    	$res = DB::table('house')->insert($arr);
    	if($res){
    		return Redirect::action('Admin\HouseController@houseList');
    	}
    }
}
