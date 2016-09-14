<?php

namespace App\Http\Controllers\Admin;

/**
 * 后台权限控制器
 */
use App\Http\Controllers\Admin\AdminController;
use DB,Request,input,Validator,Session,redirect;

 class PowerController extends AdminController
{
	/**
	 * 权限列表
	 * [PowerList description]
	 */
	public function PowerList()
	{	
		$arr=DB::table('privilege')->paginate(5);
		return view('Admin/powerList')->with('arr',$arr);
	}
	/**
	 * 权限添加
	 * [PowerAdd description]
	 */
	public function PowerAdd()
	{
		if (empty(request::input('_token'))) {
			$arr=DB::table('privilege')
				->select('pri_id', 'pri_name')
					->where('f_id',0)
						->get();
			return view('Admin/powerAdd')->with('arr',$arr);
		}else{
			$data=Request::input();
			unset($data['_token']);
			$message=[
			'pri_name.required'=>'权限名不能为空',
			'pri_name.unique'=>'权限名已存在',
			'pri_controller.required'=>'控制器名不能为空',
			'pri_controller.alpha'=>'控制器只能为字母',
			'pri_action.required'=>'路由不能为空',
			];
			$validator = Validator::make(
			    $data,
			    [
			    'pri_name' => 'required|unique:privilege',
			    'pri_controller' => 'required|alpha',
			    'pri_action' => 'required'
			    ],
			    $message
			);
			if ($validator->fails())
			{
			    return redirect('Admin_poweradd')->withErrors($validator);
			}
			$re=DB::table('privilege')->insert($data);
			if ($re) {
				return redirect('Admin_powerlist');
			}
		}
	}
	/**
	 * 权限删除
	 * [PowerDel description]
	 */
	public function PowerDel()
	{
		$id=request::get('id');
		$re=DB::table('privilege')
			->where('pri_id',$id)
				->delete();
		if ($re) {
			return redirect('Admin_powerlist');
		}
	}
	/**
	 * 赋权列表 默认选择
	 * [MatchList description]
	 */
	public function MatchList()
	{
		if ($role_id=request::get('role_id')) {
		$arr=DB::table('role')->get();
		$ar=DB::table('privilege')
			->select('pri_id', 'pri_name','f_id')
				->get();
		$pri_id=array();
		$ars=DB::table('role_pri')
				->where('role_id',$role_id)
					->get();
			foreach ($ars as $key => $v) {
				$pri_id[]=$v['pri_id'];
				$re=$v['role_id'];
			}
			foreach ($arr as $key => $v) {
			$arr[$key]['re']=$re;
		}
		$ar=$this->MatchLevel($ar,$pid=0,$level=0);
		return view('Admin/matchLists')->with('arr',$arr)->with('ar',$ar)->with('pri_id',$pri_id);
		}else{
		$arr=DB::table('role')->get();
		$ar=DB::table('privilege')
			->select('pri_id', 'pri_name','f_id')
				->get();
		$ars=DB::table('role_pri')
				->where('role_id',1)
					->get();
			foreach ($ars as $key => $v) {
				$pri_id[]=$v['pri_id'];
				$re=$v['role_id'];
			}
			foreach ($arr as $key => $v) {
			$arr[$key]['re']=$re;
		}
		$ar=$this->MatchLevel($ar,$pid=0,$level=0);
		return view('Admin/matchList')->with('arr',$arr)->with('ar',$ar)->with('pri_id',$pri_id);
		}
	}
	/**
	 * 递归权限
	 * [MatchLevel description]
	 * @param [type]  $ar    [description]
	 * @param integer $pid   [description]
	 * @param integer $level [description]
	 */
	public function MatchLevel($ar,$pid=0,$level=0)
	{
		//定义一个静态数组
		static $data = array();
		foreach($ar as $k=>$v){
			if($v['f_id']==$pid){
				$v['level'] = $level;
				$data[] = $v;
				$this->MatchLevel($ar,$v['pri_id'],$level+1);
			}
		}
		return $data;
	}
	/**
	 * 赋权添加
	 * [MatchAdd description]
	 */
	public function MatchAdd()
	{
		$data=request::input();
		DB::table('role_pri')->where('role_id',$data['role_id'])->delete();
		unset($data['_token']);
		foreach ($data['pri_id'] as $key => $v) {
			DB::table('role_pri')->insert(['role_id' => $data['role_id'], 'pri_id' => $v]);
		}
		echo "<script>alert('赋权成功');location.href='Admin_matchlist';</script>";
		//return redirect('Admin_matchlist');
	}
}