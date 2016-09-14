<?php

namespace App\Http\Controllers\Admin;

/**
 * 后台登录控制器
 */
use App\Http\Controllers\Controller;
use DB,Request,input,Validator,Session,redirect;

 class LoginController extends Controller
{

	/**
	 * 调用后台登录页面
	 */
    public function login()
    {
    	//返回登录页面
    	return view('Admin/login');
    }
    /**
     * 执行登录验证用户
     */
    public function CheckUser()
    {
    	$username=Request::input('username');
    	$password=md5(Request::input('password'));

    	$re=DB::table('admin_users')
    		->where('user_name',$username)
    			->where('user_pwd',$password)
    				->first();
    	if (!$re) {
    		echo "<script>alert('用户名或密码错误');location.href='Admin_login';</script>";
    	}else{

            request::session()->put('user_name',$re['user_name']);

            request::session()->put('user_id',$re['user_id']);
            session::save();
    		return redirect('Admin_index');
    	}
    }
        /**
     * 后台用户退出
     */
    public function Sxh(){
            //对session执行销毁
            Session::pull('user_id');  
            Session::save();
            return redirect("/Admin_login");
        }
}
