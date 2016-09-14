<?php

namespace App\Http\Controllers\Admin;

/**
 * 地区管理控制器
 */
use App\Http\Controllers\Admin\AdminController;
use DB,Request,Input,Validator,Session,Redirect;
 class RegionController extends AdminController
{

	/**
	 * 地区列表
	 * @return [显示地区列表] [description]
	 */
	public function index()
	{

		//查询地区数据分页
		$data=DB::table('city')->paginate(3);
		//print_r($data);die;
		//传值到前台
		view()->share('data',$data);
		//返回前台页面
		return view('Admin/Region');
	}
	/**
	 * 调用地区添加页面
	 */
    public function RegionAdd()
    {
    	//返回添加页面
    	return view('Admin/RegionAdd');
    }
    /**
     * 执行添加页面
     */
    public function RegionAdds()
    {
    	//接受传值
    	$input=Input::all();

    		//进行表单验证
			    	    $rules = [
			            'city_name' => 'required|unique:city',
			        ];
			        $messages = [
			            'city_name.required' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															地区不能为空</li>",
						'city_name.unique' => "<li class='text-warning bigger-110 orange'>
															<i class='icon-warning-sign'></i>
															地区已存在</li>",
			        ];
			        $validator = Validator::make($input, $rules, $messages);
			        if ($validator->fails()){
			            return redirect('/Admin_RegionAdd')->withErrors($validator);
			        }
			        unset($input['_token']);
			        //执行添加命令
			        $pd=DB::table('city')->insert($input);
			        if($pd){
			        	return redirect('/Admin_Region');
			        }else{
			        	echo "<script>alert('添加失败');window.location=back;</script>";
			        }

    }
    /**
     * 地区删除方法
     */
    function RegionDel(){
    		//接受值
    		$id=Input::get('id');
    		//执行数据库删除
    		$pd=DB::table('city')->where('city_id',$id)->delete();
    		    	if($pd){
			        	return redirect('/Admin_Region');
			        }else{
			        	echo "<script>alert('删除失败');window.location=back;</script>";
			        }
    }
}
