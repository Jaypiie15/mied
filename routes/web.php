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

Route::get('/', [
	'as'=> 'index',
	'uses'=> 'PageController@main'
]);


Route::get('/admin/register', [
	'as'=> 'register',
	'uses'=> 'AdminController@register'
]);
Route::get('/admin/add-meatcut', [
	'as' => 'add-meatcuts',
	'uses' => 'AdminController@show_options',
]);
Route::get('/admin/show-meat',[
	'as' => 'show-meat',
	'uses' => 'AdminController@show_meat'
]);
Route::get('/admin/edit-commodity',[
	'as' => 'edit-commodity',
	'uses' => 'AdminController@show_com'
]);
Route::get('/admin/edit-cut',[
	'as' => 'edit-cut',
	'uses' => 'AdminController@show_cut'
]);
Route::get('/admin/edit-hscode',[
	'as' => 'edit-hscode',
	'uses' => 'AdminController@show_hscode'
]);


Route::get('/admin/view-meat/{code}',[
	'as' => 'view-meat',
	'uses' => 'AdminController@view_meat'
]);
Route::get('/admin/update-meatcut/{id}',[
	'as' => 'update-meatcut',
	'uses' => 'AdminController@update_meatcut'
]);
Route::get('/admin/delete-meatcut/{id}',[
	'as'=> 'delete-meatcut',
	'uses'=> 'AdminController@delete_meat'
]);
Route::get('/admin/update-commodity/{id}',[
	'as' => 'update-commodity',
	'uses' => 'AdminController@view_com'
]);
Route::get('/admin/delete-commodity/{id}',[
	'as' => 'delete-commodity',
	'uses' => 'AdminController@delete_com'
]);
Route::get('/admin/update-cut_type/{id}',[
	'as' => 'update-cut_type',
	'uses' => 'AdminController@view_cut'
]);
Route::get('/admin/delete-cut_type/{id}',[
	'as' => 'delete-cut_type',
	'uses' => 'AdminController@delete_cut'
]);
Route::get('/admin/update-hscode/{id}',[
	'as' => 'update-hscode',
	'uses' => 'AdminController@view_hscode'
]);
Route::get('/admin/delete-hscode/{id}',[
	'as' => 'delete-hscode',
	'uses' => 'AdminController@delete_hscode'
]);



Route::post('/admin/add-admin', [
	'as'=>	'add-admin',
	'uses'=> 'AdminController@add_admin'
]);
Route::post('/admin/add-meat',[
	'as' =>	'add-meatcut',
	'uses' => 'AdminController@add_meats'
]);
Route::post('/admin/add-commodity',[
	'as' => 'add-commodity',
	'uses' => 'AdminController@add_com'
]);
Route::post('/admin/update-meat/{id}',[
	'as' => 'update-meat',
	'uses' => 'AdminController@update_meat'
]);
Route::post('/admin/update-commodity/{id}',[
	'as' => 'update-com',
	'uses' => 'AdminController@update_com'
]);
Route::post('/admin/add-cut',[
	'as' => 'add-cut',
	'uses' => 'AdminController@add_cut'
]);
Route::post('/admin/update-cut_type/{id}',[
	'as' => 'update_cut',
	'uses' => 'AdminController@update_cut'
]);
Route::post('/admin/add-hscode',[
	'as' => 'add-code',
	'uses' => 'AdminController@add_hscode'
]);
Route::post('/admin/update-hscode/{id}',[
	'as' => 'update-code',
	'uses' => 'AdminController@update_hscode'
]);