<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use DB,Request,Input,Validator,Session,Redirect;
/**
 * 活动文章管理
 */
class ArticleController extends AdminController
{
	/**活动列表*/
    public function articleList()
    {
    	$arr = DB::table('article')->select('article_id','article_title','start_date','end_date')->paginate(5);
        $now = date('Y-m-d');
    	return view('Admin/article_list',['arr'=>$arr,'now'=>$now]);
    }

    //文章添加
    public function articleAdd()
    {
        return view('Admin/article_add');
    }

    //执行添加
    public function articleInsert()
    {   
        $input = Request::all();
        //验证
        $rules = [
            'article_title' => 'required|unique:article',
            'article_img' => 'required|image',
            'article_content' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
        $messages = [
            'article_title.required' => '<li class="text-warning bigger-110 orange"><i class="icon-warning-sign"></i>请输入标题</li>',
            'article_title.unique' => '<li class="text-warning bigger-110 orange"><i class="icon-warning-sign"></i>已存在</li>',
            'article_img.required' => '<li class="text-warning bigger-110 orange"><i class="icon-warning-sign"></i>请选择图片</li>',
            'article_img.image' => '<li class="text-warning bigger-110 orange"><i class="icon-warning-sign"></i>文件必需为图片(jpeg, png, bmp, gif 或 svg)</li>',
            'article_content.required' => '<li class="text-warning bigger-110 orange"><i class="icon-warning-sign"></i>请输入内容</li>',
            'start_date.required' => '<li class="text-warning bigger-110 orange"><i class="icon-warning-sign"></i>请选择日期</li>',
            'end_date.required' => '<li class="text-warning bigger-110 orange"><i class="icon-warning-sign"></i>请选择日期</li>',
        ];
        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()){
            return redirect('Admin_articleAdd')->withErrors($validator);
        }
        //插入数据
        $file = Input::file('article_img');
        $clientName = $file -> getClientOriginalName();//文件名称 
        $entension = $file -> getClientOriginalExtension();//上传文件的后缀
        $newName = md5(date('ymdhis').$clientName).".".$entension;//随机名称
        $path = $file -> move('Admin/app',$newName);//移动到项目
        $arr = Input::all();
        unset($arr['_token']);
        unset($arr['article_img']);
        $arr['article_img'] = "Admin/app/".$newName;
        $arr['article_time'] = date('Y-m-d H:i:s');
        $res = DB::table('article')->insert($arr);
        if($res){
            return Redirect::action('Admin\ArticleController@articleList');
        }
    }
 
    //文章详情
    public function articleInfo()
    {
        $article_id = Input::get('article_id');
        $arr = DB::table('article')->where('article_id',$article_id)->first();
        return view('Admin/article_info')->with('arr',$arr);
    }

    //文章删除
    public function articleDel()
    {
        $id = Request::input('article_id');
        $res = DB::table('article')->where('article_id',$id)->delete();
        return Redirect::action('Admin\ArticleController@articleList');
    }

    //文章修改
    public function articleEdit()
    {
        $id = Request::input('article_id');
        $arr = DB::table('article')->where('article_id',$id)->first();
        return view('Admin/article_edit')->with('arr',$arr);
    }

    //执行修改
    public function articleUpd()
    {
        $input = Request::all();
        if(count($input)==6){
            unset($input['_token']);
            $arr['article_time'] = date('Y-m-d H:i:s');
            $res =DB::table('article')->where('article_id',$input['article_id'])->update($input);
        }elseif(count($input)==7){
            $file = Input::file('article_img');
            $clientName = $file -> getClientOriginalName();//文件名称 
            $entension = $file -> getClientOriginalExtension();//上传文件的后缀
            $newName = md5(date('ymdhis').$clientName).".".$entension;//随机名称
            $path = $file -> move('Admin/app',$newName);//移动到项目
            unset($input['_token']);
            unset($input['article_img']);
            $input['article_img'] = "Admin/app/".$newName;
            $input['article_time'] = date('Y-m-d H:i:s');
            $res =DB::table('article')->where('article_id',$input['article_id'])->update($input);
        }
        return Redirect::action('Admin\ArticleController@articleList');
    }
}