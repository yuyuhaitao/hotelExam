<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use DB,Session,Request;
abstract class AdminController extends Controller
{
    /**
     * 根据用户登陆的ID来查询 当前用户的角色 以及当前角色所拥有的权限
     * [Navigation description]
     */
    public function __construct(){
        if (session::has('user_id')) {   
        $user_id = request::session()->get('user_id'); 
        $guide=DB::table('users_role')
            ->join('role_pri', 'users_role.role_id', '=', 'role_pri.role_id')
                ->join('privilege', 'role_pri.pri_id', '=', 'privilege.pri_id')
                        ->where('users_role.user_id',$user_id)
                            ->where('f_id',0)
                                ->get();   
         foreach ($guide as $key => $v) {
            $guide[$key]['son']=DB::table('privilege')
                        ->where('f_id',$v['pri_id'])
                            ->get();
         }

         $name=Session::get('user_name');
        // echo $name;die;



        view()->share('guide',$guide);
        view()->share('u_name',$name);
        if ($user_id==1) {
            return true;
        }else{
                foreach($guide as $k=>$v){
                    foreach ($v['son'] as $key => $vv) {
                    $arr[] = $vv['pri_action'];
                }
            }
            //把当前控制器和方法通过-链接
            $str =request::path();
            //判断$str是否在权限数组中存在
            if(in_array($str,$arr)){
            return true;
            }else{
                echo "<script>alert('您所访问的系统权限不足，请联系管理员');location.href='Admin_index';</script>";
            }
        }
         }else{
            echo "<script>alert('禁止非法登录');location.href='Admin_login';</script>";
         }
    }
}