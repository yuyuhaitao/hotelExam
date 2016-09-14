<?php
/**
 * Created by PhpStorm.
 * User: Bai
 * Date: 2016/6/14
 * Time: 18:57
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use DB,Request,Validator,Session,Redirect;
use Illuminate\Support\Facades\Input;

class GiftController extends AdminController
{

    //添加礼品

    public function giftAdd(){
        //判断是否接过来值
        if(!empty($_POST))
        {
           //判断是否有图片上传
            if(Request::hasFile('gift_img'))
            {
                $gift_img = Request::file('gift_img');//使用laravel自带的Request类来获取文件
                $fileDir = "Admin/uploads/gift";//定义文件的路径
                $gift_imgName = $gift_img->getClientOriginalName();//获取上传图片的名字
                $arr = explode('.',$gift_imgName);//获取后缀
                $last_name = $arr[1];
                $types = array('jpg','png','gif');//定义上传文件的格式
                if(!in_array($last_name,$types)){
                    echo"<script>
                    alert('文件格式不对');
                    location.href='".URL('Admin_giftAdd')."';
                         </script>";
                }
                $fileNew = time().rand(1000,9999).'.'.$last_name;//重新命名文件名
                $gift_img->move($fileDir,$fileNew);//使用move方法移动到指定文件夹

                $gift_name = Request::input('gift_name');//接值
                $gift_img = $fileDir.'/'.$fileNew;
                $gift_info = Request::input('gift_info');
                $gift_num = Request::input('gift_num');
                $gift_price = Request::input('gift_price');
                $res = DB::table('gift')->insert(array(
                    'gift_name' => $gift_name,'gift_img'  => $gift_img,'gift_info'  => $gift_info,'gift_num' => $gift_num,'gift_price' => $gift_price
                ));//添加入库

                if($res){
                        echo "<script>
                    alert('添加成功');
                    location.href = '".URL('Admin_giftAdd')."';
                              </script>";
                }else{
                        echo "<script>
                    alert('添加失败');
                    location.href = '".URL('Admin_giftAdd')."';
                              </script>";
                }
            }else{
                echo"<script>
                    alert('请上传图片哦~');
                    location.href='".URL('Admin_giftAdd')."';
                         </script>";
            }
        }
        return view('Admin/giftAdd');
    }

    //礼品列表+分页

    public function giftList(){
        $arr = DB::table('gift')->paginate(5);
      //print_r($arr);die;
        return view('Admin/giftList')->with('arr',$arr);
    }

    //礼品删除

    public function giftDelete(){
        $id = Input::get('id');
        $row = DB::table('gift')->where('gift_id', $id)->pluck('gift_num');//查询单一字段
        if($row ==0 ){
            $res = DB::table('gift')->where('gift_id',$id )->delete();
            if($res){
                echo "<script>
                    alert('删除成功');
                    location.href = '".URL('Admin_giftList')."';
                              </script>";
            }else{
                echo "<script>
                    alert('删除失败');
                    location.href = '".URL('Admin_giftList')."';
                              </script>";
            }
        }else{
            echo "<script>
                    alert('此礼品还有库存呢');
                    location.href = '".URL('Admin_giftList')."';
                              </script>";
        }

    }

    //即点即改结合修改

    public function giftUpdate(){
        $id = $_GET['id'];
        $val = $_GET['new_val'];
        $res = DB::table('gift')->where('gift_id',$id)->update(['gift_num'=>$val]);
//        print_r($res);die;
        if($res){
            echo "1";
        }else{
            echo "-1";
        }
    }

    //查看礼品详情

    public function giftLook(){
        $id = Input::get('id');
        $arr = DB::table('gift')->where('gift_id',$id)->first();
//        print_r($arr);die
        return view('Admin/giftLook')->with('arr',$arr);
    }

    //批量删除

    public function giftDelAll(){
        $ids = Input::get('id');
        $arr = explode(',',$ids);
        $res = DB::table('gift')->whereIn('gift_id',$arr)->delete();
        if($res){
            echo "<script>
                    alert('删除成功');
                    location.href = '".URL('Admin_giftList')."';
                              </script>";
        }else{
            echo "<script>
                    alert('删除失败');
                    location.href = '".URL('Admin_giftList')."';
                              </script>";
        }
    }

    //ajax搜索

    public function giftSearch(){
        $searchVal = Input::get('searchVal');
        //var_dump($searchVal);die;
        $option = Input::get('option');
        if($searchVal!=''){
            if($option==0){
                $res = DB::table('gift')->where('gift_name','like','%'.$searchVal.'%' )->orwhere('gift_info','like','%'.$searchVal.'%')->paginate(5);
            }elseif($option==1){
                $res = DB::table('gift')->where('gift_name','like','%'.$searchVal.'%' )->paginate(5);
            }else{
                $res = DB::table('gift')->where('gift_info','like','%'.$searchVal.'%')->paginate(5);
            }
            if($res){
                return view('Admin/giftList')->with('arr',$res);
            }
        }
    }
}