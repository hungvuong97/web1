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

Route::get('device-information/{id?}',[
	'as'=>'deviceinformation',
	'uses'=>'DeviceController@getDevice_information'
]);

Route::get('device-edit/{id?}',[
	'as'=>'deviceedit',
	'uses'=>'DeviceController@getDevice_edit'
]);

Route::post('device-edit/{id?}',[
	'as'=>'deviceedit',
	'uses'=>'DeviceController@postDevice_edit'
]);

Route::get('device-del/{id?}',[
	'as'=>'devicedel',
	'uses'=>'DeviceController@getDevice_del'
]);

/*==================== Đồng ===============*/

use App\Users;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'page_admin'], function (){
   Route::group(['prefix'=>'users'], function (){
       // page_admin/users/user_list
       Route::get('user_list', 'UsersController@getUser_List');

       Route::get('user_edit/{AccountID}', 'UsersController@getUser_Edit');
       Route::post('user_edit/{AccountID}', 'UsersController@postUser_Edit');

       Route::get('user_add', 'UsersController@getUser_Add');
       Route::post('user_add', 'UsersController@postUser_Add');
   });
});

Route::get('users-list',[
	'as' => 'userlist',
	'uses' => 'UsersController@getUser_List'
]);

/*================== Vương ================*/