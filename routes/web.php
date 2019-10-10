<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 文章
// Route::group(['middleware'=>['checklogin']],function(){
	Route::any('/index',"Index\IndexController@index");
	Route::any('/add','Index\IndexController@add');
	Route::any('/update','Index\IndexController@update');
	Route::any('/update_do','Index\IndexController@update_do');
	Route::any('/del','Index\IndexController@del');
	Route::any('/details','Index\IndexController@details');
	Route::any('/dels','Index\IndexController@dels');
	// 学生
	Route::any('/select',"Index\SubdentsController@select");
	Route::any('/inse',"Index\SubdentsController@inse");
	Route::any('/updates',"Index\SubdentsController@updates");
	Route::any('/update_dos',"Index\SubdentsController@update_dos");
	Route::any('/delete',"Index\SubdentsController@delete");
	Route::any('/page',"Index\SubdentsController@page");

	// ajax
	Route::any('/ajaxadd',"Index\Ajaxindex@ajaxadd");
	Route::any('/ajaxadd_do',"Index\Ajaxindex@ajaxadd_do");
	Route::any('/ajaxselect',"Index\Ajaxindex@ajaxselect");
	Route::any('/ajaxdel',"Index\Ajaxindex@ajaxdel");


// });

// ========电商=============
// 注册
Route::any('/reds',"Admin\AdminUserController@reds");
Route::any('/redsadd',"Admin\AdminUserController@redsadd");
// 登录
Route::any('/logins',"Admin\AdminUserController@logins");
Route::any('/loginsadd',"Admin\AdminUserController@loginsadd");
//首页
Route::any('/admngindex',"Admin\AdminIndexController@adminindex");
// 商品详情
Route::any('/admingoods',"Admin\AdminIndexController@admingoods");
Route::any('/cart/getTotal',"Admin\AdminCartController@getTotal");
// 加入购物车
// 购物车展示
Route::any('/cartinfo',"Admin\AdminCartController@cartinfo");
// 添加
Route::any('/cartadd',"Admin\AdminCartController@cartadd");
// 删除
Route::any('/delete',"Admin\AdminCartController@delete");

// 确认订单
Route::any('/orderinfo',"Admin\OrderInfoController@orderinfo");
// 收货地址
Route::any('/addressedit',"Admin\AddresseditController@addressedit");


Auth::routes();

Route::get('/logout','Index\UserController@logout')->name('logout');
Route::get('/send','Index\UserController@send');
Route::get('/home', 'HomeController@index')->name('home');
