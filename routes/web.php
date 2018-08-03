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

/*=================== Ngọc =================*/

Route::get('device-list',[
	'as'=>'devicelist',
	'uses'=>'DeviceController@getDevice_List'
]);

Route::get('device-add',[
	'as'=>'deviceadd',
	'uses'=>'DeviceController@getDevice_add'
]);

Route::post('device-add',[
	'as'=>'deviceadd',
	'uses'=>'DeviceController@postDevice_add'
]);

Route::get('device-information/{id?}/{status?}',[
	'as'=>'deviceinformation',
	'uses'=>'DeviceController@getDevice_information'
]);

Route::get('device-edit/{id?}/{status?}',[
	'as'=>'deviceedit',
	'uses'=>'DeviceController@getDevice_edit'
])->middleware('dangnhap', 'quanly');

Route::post('device-edit/{id?}/{status?}',[
	'as'=>'deviceedit',
	'uses'=>'DeviceController@postDevice_edit'
])->middleware('dangnhap', 'quanly');

Route::get('device-del/{id?}/{status?}',[
	'as'=>'devicedel',
	'uses'=>'DeviceController@getDevice_del'
])->middleware('dangnhap', 'quanly');;

Route::get('device-search',[
	'as'=>'devicesearch',
	'uses'=>'DeviceController@getDevice_search'
]);

Route::get('warning-list',[
	'as'=>'warninglist',
	'uses'=>'DeviceController@getWarning_list'
]);

Route::get('warning-search',[
	'as'=>'warningsearch',
	'uses'=>'DeviceController@getWarning_search'
]);

Route::get('home-index',[
	'as'=>'homeindex',
	'uses'=>'DeviceController@getHome'
]);

Route::get('thongbao',[
	'as'=>'thongbao',
	'uses'=>'DeviceController@getabc'
]);
/*==================== Đồng ===============*/

use App\Users;

Route::group(['prefix'=>'page_admin'], function (){
    Route::group(['prefix'=>'users'], function (){
        // page_admin/users/user_list
        Route::get('user_list', 'UsersController@getUser_List');

        Route::get('user_edit/{AccountID}', 'UsersController@getUser_Edit')->middleware('dangnhap', 'end-user');
        Route::post('user_edit/{AccountID}', 'UsersController@postUser_Edit')->middleware('dangnhap', 'end-user');

        Route::get('user_add', 'UsersController@getUser_Add');
        Route::post('user_add', 'UsersController@postUser_Add');

        Route::get('user_delete/{AccountID}', 'UsersController@getUser_Delete')->middleware('dangnhap', 'end-user');
    });
});

/*================== Vương ================*/
Route::get('dangnhap', 'Usercontroller@getLogin');
Route::post('dangnhap', 'Usercontroller@postLogin');
Route::get('addAccount', 'Usercontroller@getAddAccount')->middleware('dangnhap');
Route::post('addAccount', 'Usercontroller@postAddAccount')->middleware('dangnhap');
Route::get('accountList', 'Usercontroller@getAccountList');
Route::get('deviceList', 'Usercontroller@getDeviceList');
Route::get('editAccount/{adminId}', 'Usercontroller@getEditAccount');
Route::post('editAccount/{adminId}', 'Usercontroller@postEditAccount');
Route::get('manageDevice', 'Usercontroller@getManageDevice');
Route::post('manageDevice', 'Usercontroller@postManageDevice');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('manage/{fullname}/{id}', 'Usercontroller@getAjax');
Route::get('login/{user}', 'Usercontroller@getLogin1');
Route::get('check/{fullname}', 'Usercontroller@getCheck');