<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use DB,Request,input,Validator,Session,redirect;
/**
 * 用户管理控制器
 */

class RoleController extends AdminController
{

	/**
	 * 角色添加页面
	 */
    public function RoleAdd()
    {	//接收值
    	$arr = Request::all();
    	
    	//print_r($arr);
    	if(!$arr){
    		//返回添加页面
			return view('Admin/roleadd');
    	}
    	//验证
    	$message = [
       
	        'role_name.required' => '角色名不能为空!',
	        'role_name.max' => '角色名不能大于20位!',
        	'role_name.unique' => '角色名已经存在!',
        ];

    	$validator = Validator::make($arr, [
		    'role_name'=>'required|max:20|unique:role',
		  ],$message);  
      
    	if ($validator->fails()) {
            return redirect('Admin_RoleAdd')->withErrors($validator);                    
        }
    	unset($arr['_token']);
    	//添加入库
    	$re = DB::table('role')->insert($arr);
    	if($re){
    		//echo 1;
    		return redirect('Admin_RoleList');
    	}
    	
    }

    //角色列表
    public function RoleList(){
    	$arr = DB::table('role')->get();
    	//print_r($arr);die;
    	return view('Admin/rolelist')->with('arr',$arr);
    }

    //删除
    public function RoleDel(){
    	$id= isset($_GET['role_id']) ? $_GET['role_id'] : "";
    	//查询
    	$arr = DB::table('role')->join('users_role', 'role.role_id', '=', 'users_role.role_id')
					             ->join('admin_users', 'users_role.user_id', '=', 'admin_users.user_id')
					          	 ->select('admin_users.user_name')
					             ->where('role.role_id',$id)
					             ->get();
		
		//print_r($arr);die; 
		if(!$arr){
			echo $re = DB::table('role')->where('role_id',$id)->delete();
		}  		 
    	//echo $re = DB::table('role')->where('role_id',$id)->delete();
    	
    }

    /*
     *修改页面
     *
     */
    public function RoleDefault(){
        $id = isset($_GET['id']) ? $_GET['id'] : "";

		$arr = DB::table('role')->where('role_id',$id)->get();
		//print_r($arr);die;
        return view('Admin/roleone')->with('arr',$arr);

	}

    /*
     *修改
     */
	public function RoleSave(){
		$arr = Request::all();
        //print_r($arr);die;
		unset($arr['_token']);
        $re = DB::table('role')->where('role_id',$arr['role_id'])->update(['role_name' => $arr['role_name']]);
        if($re){
            //echo 1;
            return redirect('Admin_RoleList');
        }
	}
}