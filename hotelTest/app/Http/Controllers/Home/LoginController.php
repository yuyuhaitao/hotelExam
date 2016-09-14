<?php

namespace App\Http\Controllers\Home;
/**
 * 前台登录控制器
 */
use App\Http\Controllers\Controller;
use DB,Request,input,Validator,Session,redirect,Mail;
class LoginController extends Controller
{
	/**
	 * 前台登录
	 * [login description]
	 * @return [type] [description]
	 */
	public function login()
	{
		$u_name = request::session()->get('u_name');
		if (empty(request::input('_token'))) {
			if (empty( $u_name)) {
				return view('Home/login')->with('u_name',$u_name);
			}else{
				//echo 1;die;
				return view('Home/login')->with('u_name',$u_name);
			}
			
		}else{
		$username=Request::input('username');

    	
    	if(empty(Request::input('u_pwd'))){
			echo "<script>alert('密码不能为空');location.href='Home_login';</script>";
			die;
    	}
    	$u_pwd=md5(Request::input('u_pwd'));
    	
    	$re=DB::table('users')
    		->where('u_name',$username)
    			
    			->where('u_pwd',$u_pwd)
    					->orWhere('u_phone', $username)
    				->orWhere('u_card',$username)
    						->first();

    	if (!$re) {
    		echo "<script>alert('用户名或密码错误');location.href='Home_login';</script>";
    		die;
    	}else{
    		    		request::session()->put('u_id',$re['u_id']);				
			    	if (request::input('u_cookie')) {
			    		request::session()->put('u_name', $username,time()+24*36600*7);

			    	}
    		return redirect('/');
    	}

		}
	}
	/**
	 * 注册用户
	 * [register description]
	 * @return [type] [description]
	 */
	public function register()
	{
		if (empty(request::input('_token'))) {
			return view('Home/register');
		}else{
			$data=request::input();
			unset($data['_token']);
			$data['u_pwd']=md5($data['u_pwd']);
			$message=[
			'u_name.required'=>'用户名不能为空',
			'u_name.max'=>'用户名不能大于15位',
			'u_name.unique'=>'用户名已存在',
			'u_pwd.required'=>'密码不能为空',
			'u_pwd.alpha_num'=>'密码只能是数字或字母',
			'u_pwd.min'=>'密码不能低于6位',
			'u_phone.required'=>'手机号不能为空',
			'u_phone.between'=>'手机号必须是11位',
			'u_phone.unique'=>'该手机已注册',
			'u_email.required'=>'邮箱不能为空',
			'u_email.email'=>'邮箱格式不正确',
			'u_card.required'=>'身份证号不能为空',
			'u_card.between'=>'身份证号必须18位',
			'u_card.unique'=>'该身份证已注册'
			];
			$validator = Validator::make(
			    $data,
			    [
			    'u_name' => 'required|max:15|unique:users',
			    'u_pwd' => 'required|alpha_num|min:6',
			    'u_phone' => 'required|between:10,12|unique:users',
			    'u_email'=> 'required|email',
			    'u_card'=> 'required|between:17,19|unique:users'
			    ],
			    $message
			);
			if ($validator->fails())
			{
			    return redirect('Home_register')->withErrors($validator);
			}
			DB::table('users')->insert($data);
			echo "<script>alert('注册成功');location.href='Home_login';</script>";
		}

	}		



	
	/**
	 * 忘记密码验证账号
	 * [forget description]
	 * @return [type] [description]
	 */
	public function forget()
	{
		if (empty(Request::input('_token'))) {
			return view('Home/forgetPwd1');	
		}else{
			$data=Request::input();
			unset($data['_token']);
			$re=DB::table('users')
					->where('u_name',$data['u_name'])
						->orwhere('u_phone',$data['u_name'])
							->orwhere('u_card',$data['u_name'])
								->first();
			if ($re) {
				request::session()->put('u_id', $re['u_id'],time()+600);
				return redirect('Home_forgetpwdone');
			}else{
				echo "<script>alert('账号不存在');location.href='Home_forgetpwd';</script>";
			}
		}
	}
	/**
	 * 验证码验证
	 * [forgetone description]
	 * @return [type] [description]
	 */
	public function forgetone()
	{	
		if (empty(Request::get('codes'))) {
			return view('Home/forgetPwd2');	
		}
		$codes=Request::get('codes');
		$code = request::session()->get('code');
		if ($codes==$code) {
			echo 1;
		}else{
			echo '验证码错误';
		}
	}
	/**
	 * 发送邮箱
	 * [forgetemail description]
	 * @return [type] [description]
	 */
	public function forgetemail()
	{
		$email=Request::get('email');
		$re=DB::table('users')->where('u_email',$email)->first();
		if ($re) {
			$code=rand(1000,9999);
			request::session()->put('code', $code,time()+60);
		 	$data = ['code'=>$code, "to" => $re['u_email']];
			Mail::raw('验证码为:'.$data['code'], function ($message)use($data) {
			$to = $data['to'];
			$message ->to($to)->subject('格子官方');
			});
		}else{
			echo "邮箱不正确";
		}
	}
	/**
	 * 设置新密码
	 * [forgettwo description]
	 * @return [type] [description]
	 */
	public function forgettwo()
	{
		if (empty(Request::input('_token'))) {
			return view('Home/forgetPwd3');
		}
			$u_pwd=md5(request::input('u_pwd'));
			$u_id = request::session()->get('u_id');
			$re=DB::table('users')->where('u_id',$u_id)->update(['u_pwd' => $u_pwd]);
			if ($re) {
				return redirect('Home_forgetpwdend');
			}
	}
	/**
	 * 修改成功
	 * [forgetend description]
	 * @return [type] [description]
	 */
	public function forgetend()
	{
		return view('Home/forgetPwd4');
	}
}

