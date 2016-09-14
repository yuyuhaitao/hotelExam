<?php

namespace App\Http\Controllers\Admin;

/**
 * 后台用户控制器
 */
use App\Http\Controllers\Admin\AdminController;
use DB,Request,input,Validator,Session,redirect;

 class UserController extends AdminController
{	
	/**
     * 后台首页
     * @return [type] [description]
     */
    public function index(){
    	return view('Admin/zhuti');
    }
	/**
	 * 用户展示
	 * @param string $value [description]
	 */
	public function UserLst()
	{
		$arr=DB::table('admin_users')
			->join('users_role', 'admin_users.user_id', '=', 'users_role.user_id')
            	->join('role', 'users_role.role_id', '=', 'role.role_id')
            		->where('admin_users.user_id','!=','1')
            			->paginate(5);
		return view('Admin/userLst')->with('arr',$arr);
	}
	/**
	 * 用户添加
	 * [UserAdd description]
	 */
	public function UserAdd(){

		if (empty(request::input('_token'))) {

			$ar=DB::table('role')->where('role_id','!=','1')->get();
			return view('Admin/userAdd')->with('ar',$ar);

		}else{

			$data=Request::input();
			unset($data['_token']);
			$arr['role_id']=$data['role_name'];
			unset($data['role_name']);
			$message=[
			'user_name.required'=>'用户名不能为空',
			'user_name.alpha'=>'用户名只能是字母',
			'user_name.max'=>'用户名不能大于15位',
			'user_name.unique'=>'用户名已存在',
			'user_pwd.required'=>'密码不能为空',
			'user_pwd.alpha_num'=>'密码只能是数字或字母',
			'user_pwd.min'=>'密码不能低于6位'
			];
			$validator = Validator::make(
			    $data,
			    [
			    'user_name' => 'required|alpha|max:15|unique:admin_users',
			    'user_pwd' => 'required|alpha_num|min:6'
			    ],
			    $message
			);
			if ($validator->fails())
			{
			    return redirect('Admin_useradd')->withErrors($validator);
			}
			$data['user_pwd']=md5($data['user_pwd']);
			$id=DB::table('admin_users')->insertGetId($data);
			$arr['user_id']=$id;
			$re=DB::table('users_role')->insert($arr);
			if ($re) {

				return redirect('Admin_userlst');
			}

		}
	}
	/**
	 * 用户删除
	 * [UserDel description]
	 */
	public function UserDel()
	{
		$id=request::get('id');
		DB::table('admin_users')
			->where('user_id',$id)
				->delete();
		$re=DB::table('users_role')
			->where('user_id',$id)
				->delete();
		if ($re) {
			return redirect('Admin_userlst');
		}
	}
	/**
	 * 用户编辑
	 * [UserEdit description]
	 */
	public function UserEdit()
	{
		if (empty(request::input('_token'))) {
		$id=request::get('id');
		$ar=DB::table('role')->where('role_id','!=','1')->get();
		$arr=DB::table('admin_users')
			->join('users_role', 'admin_users.user_id', '=', 'users_role.user_id')
            	->join('role', 'users_role.role_id', '=', 'role.role_id')
            		->where('admin_users.user_id',$id)
            			->first();
        return view('Admin/userEdit')->with('arr',$arr)->with('ar',$ar); 
		}else{
			$user_id=request::input('user_id');
			$role_id=request::input('role_id');
			$re=DB::table('users_role')
				->where('user_id',$user_id)
					->update(['role_id' => $role_id]);
			if ($re) {
				return redirect('Admin_userlst');
			}
		}
	}
}