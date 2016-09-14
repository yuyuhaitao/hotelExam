<?php
/**
 * Created by PhpStorm.
 * User: Bai
 * Date: 2016/6/17
 * Time: 10:56
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use DB,Request,input,Validator,Session,Redirect;

class OrderGiftController extends AdminController{

    //订单列表

    public function orderGiftList(){
        $res = DB::table('ht_gift_order')
            ->join('ht_users','ht_gift_order.u_id','=','ht_users.u_id')
            ->join('ht_gift','ht_gift_order.gift_id','=','ht_gift.gift_id')
            ->select('ht_gift_order.*','ht_users.u_name','ht_gift.gift_name')
            ->paginate(5);
        return view('admin/orderGiftList')->with('arr',$res);
    }

    //删除订单

    public function orderGiftDelete(){
        $id = Input::get('id');
        $row = DB::table('ht_gift_order')->where('gift_order_id', $id)->pluck('is_pay');//查询单一字段
        if($row !=0 ){
            $res = DB::table('ht_gift_order')->where('gift_order_id',$id )->delete();
            if($res){
                echo "<script>
                    alert('删除成功');
                    location.href = '".URL('Admin_orderGiftList')."';
                              </script>";
            }else{
                echo "<script>
                    alert('删除失败');
                    location.href = '".URL('Admin_orderGiftList')."';
                              </script>";
            }
        }else{
            echo "<script>
                    alert('该用户没有支付');
                    location.href = '".URL('Admin_orderGiftList')."';
                              </script>";
        }
    }

    //批删

    public function orderGiftDelAll(){
        $ids = Input::get('id');
        $arr = explode(',',$ids);
        $res = DB::table('ht_gift_order')->whereIn('gift_order_id',$arr)->delete();
        if($res){
            echo "<script>
                    alert('删除成功');
                    location.href = '".URL('Admin_orderGiftList')."';
                              </script>";
        }else{
            echo "<script>
                    alert('删除失败');
                    location.href = '".URL('Admin_orderGiftList')."';
                              </script>";
        }
    }

    //多条件搜索

    public function orderGiftSearch(){
        $searchVal = Input::get('searchVal');
        $option = Input::get('option');
        if($searchVal!=''){
            if($option == -1){
                $res = DB::table('ht_gift_order')
                    ->join('ht_users','ht_gift_order.u_id','=','ht_users.u_id')
                    ->join('ht_gift','ht_gift_order.gift_id','=','ht_gift.gift_id')
                    ->select('ht_gift_order.*','ht_users.u_name','ht_gift.gift_name')
                    ->where('gift_name','like','%'.$searchVal.'%' )
                    ->paginate(5);
            }elseif($option==1){
                $res = DB::table('ht_gift_order')
                    ->join('ht_users','ht_gift_order.u_id','=','ht_users.u_id')
                    ->join('ht_gift','ht_gift_order.gift_id','=','ht_gift.gift_id')
                    ->select('ht_gift_order.*','ht_users.u_name','ht_gift.gift_name')
                    ->where('gift_name','like','%'.$searchVal.'%' )
                    ->where('is_pay',1)
                    ->paginate(5);
            }else{
                $res = DB::table('ht_gift_order')
                    ->join('ht_users','ht_gift_order.u_id','=','ht_users.u_id')
                    ->join('ht_gift','ht_gift_order.gift_id','=','ht_gift.gift_id')
                    ->select('ht_gift_order.*','ht_users.u_name','ht_gift.gift_name')
                    ->where('gift_name','like','%'.$searchVal.'%' )
                    ->where('is_pay',0)
                    ->paginate(5);
            }
            if($res){
                return view('admin/orderGiftList')->with('arr',$res);
            }
        }
    }

    //支付

    public function orderGiftPay(){
        return view('admin/orderGiftPay');
    }
}