<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 *前台
 */
Route::get('/','Home\IndexController@index');//前台首页
Route::any('Home_login','Home\LoginController@login');/*前台登录*/
Route::any('Home_register','Home\LoginController@register');/*前台注册*/
Route::get('/Home_UserInfo','Home\UserInfoController@index');//前台个人中心


/**
 * 前台活动
 */
Route::get('Home_Activity','Home\ActivityController@index');//前台个人中心
Route::get('Home_ActInfo','Home\ActivityController@info');//前台个人中心

/**
 * 前台咨询
 */
Route::get('Home_Help','Home\HelpController@index');//前台帮助咨询
Route::get('Home_Helpman','Home\HelpController@man');//前台人工咨询
Route::get('Home_Question','Home\HelpController@question');//前台人工咨询
Route::get('Home_Uquestion','Home\HelpController@Uquestion');//用户历史问题
Route::get('Home_Qdel','Home\HelpController@Qdel');//用户历史问题

/**
 * 前台定单
 */
Route::get('Home_Orderlist','Home\OrderlistController@index');//前台定单列表
Route::get('Home_Opage','Home\OrderlistController@Opage');//定单列表分页
Route::get('Home_Unfinish','Home\OrderlistController@Unfinish');//未完成订单
Route::get('Home_Finish','Home\OrderlistController@Finish');//已完成订单
Route::get('Home_Oinfo','Home\OrderlistController@Oinfo');//订单详情

/**
 * 评价
 */
Route::get('Home_Content','Home\ContentController@index');//前台定单列表
Route::post('Home_ContentAdd','Home\ContentController@Add');//前台定单列表
Route::get('Home_HotelContent','Home\ContentController@Hotel');//酒店评价




Route::post('/Home_UserImg','Home\UserInfoController@Img');//前台个人头像上传
Route::get('/Home_UserUpd','Home\UserInfoController@Upd');//前台个人信息中心
Route::get('/Home_UserOrder','Home\UserInfoController@Order');//前台格子订单
Route::get('/Home_UserChong','Home\UserInfoController@Chong');//前台格子充值
Route::get('/Home_UserMoney','Home\UserInfoController@Money');//前台格子支付宝充值
Route::get('/Home_UserCheng','Home\UserInfoController@Cheng');//前台格子充值
Route::get('/Home_UserFoot','Home\UserInfoController@Foot');//前台格子足迹
Route::get('/Home_UserSxh','Home\UserInfoController@Sxh');//前台格子退出
Route::get('/Home_UserColl','Home\UserInfoController@Coll');//前台格子收藏

Route::any('/Home_forgetpwd','Home\LoginController@forget');//前台忘记密码(1)
Route::any('/Home_forgetpwdone','Home\LoginController@forgetone');//前台忘记密码(2)
Route::any('/Home_forgetpwdeml','Home\LoginController@forgetemail');//邮箱验证
Route::any('/Home_forgetpwdtwo','Home\LoginController@forgettwo');//前台忘记密码(3)
Route::any('/Home_forgetpwdend','Home\LoginController@forgetend');//前台忘记密码(4)
/*
 *预订酒店
 */
//选择城市
Route::any('Home_city','Home\HotelController@citylist');/*城市列表*/
Route::any('Home_hotellist','Home\HotelController@hotellist');/*选中城市酒店列表*/
Route::any('Home_hotel','Home\HotelController@hotel');/*选中城市酒店列表*/
Route::any('Home_hotelinfo','Home\HotelController@hotelinfo');/*选中城市酒店简介*/
Route::any('Home_hotelmap','Home\HotelController@hotelmap');//地图

Route::any('Home_hotelmap_road','Home\HotelController@hotelmap_road');//百度地图导航
Route::any('Home_hotelservice','Home\HotelController@hotelservice');//酒店设施
Route::any('Home_order','Home\OrderController@orderadd');//城市预定订单
Route::any('Home_hotel_time','Home\HotelController@hotel_time');

Route::any('Home_hotelmap_road','Home\HotelController@hotelmap_road');//导航
Route::any('Home_hotelmap_info','Home\HotelController@hotelmap_info');//实景

Route::any('Home_collectadd','Home\UserInfoController@collectadd');//收藏
Route::any('Home_collectdel','Home\UserInfoController@collectdel');//取消收藏
Route::any('Home_collectdels','Home\UserInfoController@collectdels');//取消收藏2
//订单支付
Route::any('Home_order','Home\OrderController@orderadd');//城市预定订单	
Route::any('Home_orders','Home\OrderController@orderadds');//城市预定订单添加
Route::any('Home_payment','Home\OrderController@payment');//选择支付
Route::any('Home_balance','Home\OrderController@balance');//余额支付
Route::any('Home_Alipay','Home\OrderController@Alipay');//支付宝支付
Route::any('Home_Alipayend','Home\OrderController@Alipayend');//支付宝支付完成



/*
 *后台登录
 */
Route::get('Admin_login','Admin\LoginController@login');/*后台登录*/
Route::any('Admin_check','Admin\LoginController@CheckUser');/*登录验证*/

Route::get('/Admin_UserSxh','Admin\LoginController@Sxh');//后台退出

Route::get('Admin_index','Admin\UserController@index');/*后台首页*/

Route::any('Admin_navigation','Admin\NavigationController@Navigation');/*导航栏*/

/*
 *后台 RBAC管理
 */ 
//后台用户管理
Route::get('Admin_userlst','Admin\UserController@UserLst');/*后台用户列表*/
Route::any('Admin_useradd','Admin\UserController@UserAdd');/*后台添加用户*/
Route::any('Admin_userdel','Admin\UserController@UserDel');/*后台删除用户*/
Route::any('Admin_useredit','Admin\UserController@UserEdit');/*后台编辑用户*/

//角色管理
Route::any('/Admin_RoleAdd','Admin\RoleController@RoleAdd');//添加角色
Route::any('/Admin_RoleList','Admin\RoleController@RoleList');//角色列表
Route::any('/Admin_RoleDel','Admin\RoleController@RoleDel');//角色删除
Route::any('/Admin_RoleDefault','Admin\RoleController@RoleDefault');//角色修改页面
Route::any('/Admin_RoleSave','Admin\RoleController@RoleSave');//角色修改

//权限管理
Route::get('Admin_powerlist','Admin\PowerController@PowerList');/*权限列表*/
Route::any('Admin_poweradd','Admin\PowerController@PowerAdd');/*权限添加*/
Route::any('Admin_powerdel','Admin\PowerController@PowerDel');/*权限删除*/
Route::any('Admin_matchlist','Admin\PowerController@MatchList');/*赋权列表*/
Route::any('Admin_matchadd','Admin\PowerController@MatchAdd');/*赋权添加*/

/*
 *地区管理
 */
Route::get('/Admin_Region','Admin\RegionController@index');//地区列表
Route::get('/Admin_RegionAdd','Admin\RegionController@RegionAdd');//地区添加
Route::post('/Admin_RegionAdds','Admin\RegionController@RegionAdds');//执行添加
Route::get('/Admin_RegionDel','Admin\RegionController@RegionDel');//执行删除

/**
 * 后台酒店管理
 */
//后台添加酒店
Route::get('/Admin_HotelAdd','Admin\HotelAddController@HotelAdd');//酒店添加页面
Route::post('/Admin_HotelAdds','Admin\HotelAddController@HotelAdds');//执行添加酒店
//后台酒店
Route::get('/Admin_Hotel','Admin\HotelController@Index');//后台酒店列表
Route::get('/Admin_HotelPhoto','Admin\HotelController@Photo');//酒店下套图列表
Route::post('/Admin_HotelPAdds','Admin\HotelController@PAdds');//酒店下套图执行添加
Route::get('/Admin_HotelPDel','Admin\HotelController@PDel');//酒店下套图执行删除
Route::get('/Admin_HotelHouse','Admin\HotelController@House');//酒店下户型列表
Route::get('/Admin_HotelHouseAdd','Admin\HotelController@HouseAdd');//酒店下户型添加
Route::post('/Admin_HotelHousAdds','Admin\HotelController@HouseAdds');//酒店下户型执行添加
Route::get('/Admin_HotelDetails','Admin\HotelController@Details');//酒店下详情
Route::get('/Admin_HotelDetailsUpd','Admin\HotelController@DetailsUpd');//酒店下配置修改
Route::get('/Admin_HotelCloses','Admin\HotelController@Closes');//酒店下配置修改

Route::get('/Admin_Map','Admin\HotelController@Map');//后台酒店添加地图
Route::get('/Admin_Mapadd','Admin\HotelController@Mapadd');//执行添加地图

Route::get('/Admin_HotelCloses','Admin\HotelController@Closes');//酒店下配置修改


/*
 *户型管理
 */

Route::get('Admin_house','Admin\HouseController@houseList');//户型列表
Route::get('Admin_houseAdd','Admin\HouseController@houseAdd');//户型添加
Route::post('Admin_houseInsert','Admin\HouseController@houseInsert');//户型执行添加
Route::get('Admin_houseNedit','Admin\HouseController@nameEdit');//户型名称即点即改
Route::get('Admin_houseDel','Admin\HouseController@houseDel');//户型删除

/*
 *订单管理
 */

Route::any('/Admin_OrderList','Admin\OrderController@OrderList');//订单列表

/*
 *活动文章管理
 */

Route::get('Admin_article','Admin\ArticleController@articleList');//文章列表
Route::get('Admin_articleAdd','Admin\ArticleController@articleAdd');//文章添加
Route::post('Admin_articleInsert','Admin\ArticleController@articleInsert');//执行添加
Route::get('Admin_articleInfo','Admin\ArticleController@articleInfo');//文章详情
Route::get('Admin_articleDel','Admin\ArticleController@articleDel');//文章删除
Route::get('Admin_articleEdit','Admin\ArticleController@articleEdit');//文章修改
Route::post('Admin_articleUpd','Admin\ArticleController@articleUpd');//执行修改

/*
 *帮助咨询
 */

Route::get('Admin_helptext','Admin\HelptextController@helptextList');//咨询列表
Route::get('Admin_helptextAdd','Admin\HelptextController@helptextAdd');//咨询添加
Route::post('Admin_helptextInsert','Admin\HelptextController@helptextInsert');//执行添加
Route::get('Admin_helptextDel','Admin\HelptextController@helptextDel');//咨询删除
Route::get('Admin_helptextEdit','Admin\HelptextController@helptextEdit');//咨询修改
Route::post('Admin_helptextUpd','Admin\HelptextController@helptextUpd');//执行修改

/*
 *活动文章管理
 */
Route::get('Admin_article','Admin\ArticleController@articleList');//文章列表
Route::get('Admin_articleAdd','Admin\ArticleController@articleAdd');//文章添加
Route::post('Admin_articleInsert','Admin\ArticleController@articleInsert');//执行添加
Route::get('Admin_articleInfo','Admin\ArticleController@articleInfo');//文章详情
Route::get('Admin_articleDel','Admin\ArticleController@articleDel');//文章删除
Route::get('Admin_articleEdit','Admin\ArticleController@articleEdit');//文章修改
Route::post('Admin_articleUpd','Admin\ArticleController@articleUpd');//执行修改

/*
 *帮助咨询管理
 */
Route::get('Admin_helptext','Admin\HelptextController@helptextList');//咨询列表
Route::get('Admin_helptextAdd','Admin\HelptextController@helptextAdd');//咨询添加
Route::post('Admin_helptextInsert','Admin\HelptextController@helptextInsert');//执行添加
Route::get('Admin_helptextDel','Admin\HelptextController@helptextDel');//咨询删除
Route::get('Admin_helptextEdit','Admin\HelptextController@helptextEdit');//咨询修改
Route::post('Admin_helptextUpd','Admin\HelptextController@helptextUpd');//执行修改

Route::get('Admin_helpman','Admin\HelpmanController@helpmanList');//人工咨询列表
Route::get('Admin_helpmanAnswer','Admin\HelpmanController@helpmanAnswer');//人工回答
Route::post('Admin_helpmanHui','Admin\HelpmanController@helpmanHui');//进行回复
Route::get('Admin_helpmanDel','Admin\HelpmanController@helpmanDel');//进行回复

/*
 *礼品管理
 */
//礼品
Route::any('/Home_shopList','Home\GiftshopController@shopList');//礼品商城首页
Route::any('/Home_giftOrder','Home\GiftshopController@giftOrder');//确认信息
Route::any('/Home_giftAdd','Home\GiftshopController@giftAdd');//添加订单表
Route::any('/Home_giftHistory','Home\GiftshopController@giftHistory');//历史兑换


Route::any('/Admin_giftAdd','Admin\GiftController@giftAdd');//礼品添加
Route::get('/Admin_giftList','Admin\GiftController@giftList');//礼品列表
Route::get('/Admin_giftDelete','Admin\GiftController@giftDelete');//删除礼品
Route::any('/Admin_giftUpdate','Admin\GiftController@giftUpdate');//即点即改结合的修改
Route::any('/Admin_giftLook','Admin\GiftController@giftLook');//查看礼品详情
Route::any('/Admin_giftDelAll','Admin\GiftController@giftDelAll');//批删
Route::any('/Admin_giftSearch','Admin\GiftController@giftSearch');//搜索
//礼品订单
Route::any('/Admin_orderGiftList','Admin\OrderGiftController@orderGiftList');//礼品订单列表
Route::any('/Admin_orderGiftDelete','Admin\OrderGiftController@orderGiftDelete');//礼品订单删除
Route::any('/Admin_orderGiftDelAll','Admin\OrderGiftController@orderGiftDelAll');//礼品订单批量删除
Route::any('/Admin_orderGiftSearch','Admin\OrderGiftController@orderGiftSearch');//礼品搜索
Route::any('/Admin_orderGiftPay','Admin\OrderGiftController@orderGiftPay');//提醒用户支付页面
