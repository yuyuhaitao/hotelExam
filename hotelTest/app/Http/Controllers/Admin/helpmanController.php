<?php
 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use DB,Request,Input,Validator,Session,Redirect;
/**
 * 人工咨询管理控制器
 */
 class HelpmanController extends AdminController


{
	//咨询列表
    public function helpmanList()
    {
    	$arr = DB::table('helptext')->join('users','helptext.user_id','=','users.u_id')->where('helptext.user_id','!=',0)->paginate(3);
        foreach ($arr as $k => $v) {
            if($v){
                //处理名称
                foreach ($arr as $key => $value) {
                    $len = strlen($value['u_name']);
                    if($len>6){
                        $value['u_name'] = substr($value['u_name'],0,3)."*".substr($value['u_name'],-3,3);
                    }else{
                        $value['u_name'] = substr($value['u_name'],0,3).'*';
                    }
                    $names[] = $value['u_name']; 
                }
                return view('Admin/helpman_list',['arr'=>$arr,'names'=>$names]); 
            }
        }
        return view('Admin/helpman_list',['arr'=>$arr]);
    }

    //咨询列表
    public function helpmanAnswer()
    {
    	$id = Input::get('help_id');
    	$arr = DB::table('helptext')->join('users','helptext.user_id','=','users.u_id')->where('help_id',$id)->first();
    	$len = strlen($arr['u_name']);
    	if($len>6){
			$arr['u_name'] = substr($arr['u_name'],0,3)."*".substr($arr['u_name'],-3,3);
		}else{
			$arr['u_name'] = substr($arr['u_name'],0,3).'*';
		}
		$names['u_name'] = $arr['u_name'];
    	return view('Admin/helpman_answer',['arr'=>$arr,'names'=>$names]);
    }

    //人工回复
    public function helpmanHui()
    {
    	$input = Request::all();
    	unset($input['_token']);
        $input['help_time'] = date('Y-m-d H:i:s');
        $res =DB::table('helptext')->where('help_id',$input['help_id'])->update($input);
    	return Redirect::action('Admin\HelpmanController@helpmanList');
    }

    //人工删除
    public function helpmanDel()
    {
        $id = Request::input('help_id');
        $res = DB::table('helptext')->where('help_id',$id)->delete();
        return Redirect::action('Admin\HelpmanController@helpmanList');
    }
}
?>