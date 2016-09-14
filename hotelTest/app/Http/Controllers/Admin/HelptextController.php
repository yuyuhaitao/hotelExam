<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use DB,Request,input,Validator,Session,Redirect;
/**
 * 帮助咨询管理控制器
 */
 class HelptextController extends AdminController

{
	//咨询列表
    public function helptextList()
    {
    	$arr = DB::table('helptext')->where('user_id',0)->paginate(3);
    	return view('Admin/helptext_list',['arr'=>$arr]);
    }

    //咨询列表
    public function helptextAdd()
    {
    	return view('Admin/helptext_add');
    }

    //咨询列表
    public function helptextInsert()
    {
    	$input = Request::all();
    	//验证
        $rules = [
            'help_title' => 'required|unique:helptext',
            'help_content' => 'required',
        ];
        $messages = [
            'help_title.required' => '<li class="text-warning bigger-110 orange"><i class="icon-warning-sign"></i>请输入问题</li>',
            'help_title.unique:helptext' => '<li class="text-warning bigger-110 orange"><i class="icon-warning-sign"></i>已存在</li>',
            'help_content.required' => '<li class="text-warning bigger-110 orange"><i class="icon-warning-sign"></i>请输入解决方法</li>',
        ];
        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()){
            return redirect('Admin_helptextAdd')->withErrors($validator);
        }
        //插入数据
        unset($input['_token']);
        $input['help_time'] = date('Y-m-d H:i:s');
        $res = DB::table('helptext')->insert($input);
        if($res){
            return Redirect::action('Admin\HelptextController@helptextList');
        }
    }

    //咨询删除
    public function helptextDel()
    {
        $id = Request::input('help_id');
        $res = DB::table('helptext')->where('help_id',$id)->delete();
        return Redirect::action('Admin\HelptextController@helptextList');
    }

    //咨询修改
    public function helptextEdit()
    {
        $id = Request::input('help_id');
        $arr = DB::table('helptext')->where('help_id',$id)->first();
        return view('Admin/helptext_edit')->with('arr',$arr);
    }

    //执行修改
    public function helptextUpd()
    {
        $input = Request::all();
        unset($input['_token']);
        $input['help_time'] = date('Y-m-d H:i:s');
        $res =DB::table('helptext')->where('help_id',$input['help_id'])->update($input);
        return Redirect::action('Admin\HelptextController@helptextList');
    }
}
