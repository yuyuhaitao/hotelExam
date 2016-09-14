<?php
/**
 * Created by PhpStorm.
 * User: Bai
 * Date: 2016/6/20
 * Time: 14:12
 */
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Request;
use Session;
class GiftshopController extends Controller
{
    //礼品商城

    public function shopList(){
        $res = DB::table('gift')->simplePaginate(12);
        return view('Home/shopList')->with('arr',$res);
    }

    //确认信息

    public function giftOrder(){
        if(empty(Session::get('u_id'))){
                return redirect("/Home_login");die;
        }
        $id = $_GET['ids'];
        $u_id = Session('u_id');
//        print_r($u_id);die;
        $res = DB::table('gift')->where('gift_id',$id)->get();

      
        $row = DB::table('users')->where('u_id',$u_id)->get();

         $gift_price=$res[0]['gift_price'];
         
        $price=$row[0]['u_point'];
        $results = array_merge($res,$row);
         if($gift_price>$price){
            echo "0";die;
        }
//        print_r($results);die;
        return view('Home/giftOrder')->with('arr',$results);
    }

    //添加订单

    public function giftAdd(){
        if(empty(Session::get('u_id'))){
                return redirect("/Home_login");die;
        }
        $u_id = $_POST['u_id'];
        $gift_id = $_POST['gift_id'];
        $now = date('Y-m-d H:i:s');
        $address = $_POST['address'];
        $gift_price = $_POST['gift_price'];


        $point = DB::table('users')->where('u_id',$u_id)->pluck('u_point');
        if($gift_price>$point){
            echo "<script>alert('积分不足快去消费吧');history.go(-1)</script>";die;
        }
        $new_point = $point-$gift_price;
        $update = DB::table('users')
                    ->where('u_id',$u_id)
                    ->update(array('u_point' => $new_point));
        if($address != ''){
            if($update){
                $res = DB::table('gift_order')->insert(array('u_id'=>$u_id,'gift_id'=>$gift_id,'is_pay'=>1,'pay_time'=>$now,'address'=>$address));
                if($res){
                    echo"<script>
            alert('兑换成功');
            location.href='".URL('Home_shopList')."';
                 </script>";
                }else{
                    echo"<script>
            alert('添加订单失败');
            location.href='".URL('Home_shopList')."';
                 </script>";
                }
            }
        }
    }

    //历史兑换

    public function giftHistory(){
        if(empty(Session::get('u_id'))){
                return redirect("/Home_login");die;
        }
            $u_id = Session('u_id');
            $res = DB::table('gift_order')
                ->join('gift','gift_order.gift_id','=','gift.gift_id')
                ->where('u_id',$u_id)
                ->get();
            return view('Home/giftHistory')->with('arr',$res);
    }
}