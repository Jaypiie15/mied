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
	'uses'=> 'AuthController@login'
]);
Route::post('/login',[
	'as' => 'login',
	'uses' => 'AuthController@after_login'
]);

Route::get('/auth/main',[
	'as' => 'main',
	'uses' => 'UserController@main'
]);
Route::get('/auth/show-dots',[
	'as' => 'show-dots',
	'uses' => 'UserController@show_dots'
]);
Route::get('/auth/main/{code}',[
	'as' => 'user-view',
	'uses' => 'UserController@view_meat'
]);
Route::get('/auth/print/{id}',[
	'as' => 'print-meat',
	'uses' => 'UserController@print_meat'
]);
Route::get('/auth/print-all',[
	'as' => 'print-all',
	'uses' => 'UserController@print_all'
]);


Route::get('/admin/logout',[
	'as' => 'admin-logout',
	'uses' => 'AuthController@logout'
]);
Route::get('/admin/dashboard',[
	'as' => 'dashboard',
	'uses' => 'AdminController@count'
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
Route::get('/admin/edit-country',[
	'as' => 'edit-country',
	'uses' => 'AdminController@show_country'
]);
Route::get('/admin/edit-dots',[
	'as' => 'edit-dots',
	'uses' => 'AdminController@show_dots'
]);
Route::get('/admin/users',[
	'as' => 'show-users',
	'uses' => 'AdminController@show_users'
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
Route::get('/admin/update-country/{id}',[
	'as' => 'update-country',
	'uses' => 'AdminController@view_country'
]);
Route::get('/admin/delete-country/{id}',[
	'as' => 'delete-country',
	'uses' => 'AdminController@delete_country'
]);
Route::get('/admin/update-dots/{id}',[
	'as' => 'update-dots',
	'uses' => 'AdminController@view_dots'
]);
Route::get('/admin/delete-dots/{id}',[
	'as' => 'delete-dots',
	'uses' => 'AdminController@delete_dots'
]);
Route::get('/admin/edit-users/{id}',[
	'as' => 'edit-users',
	'uses' => 'AdminController@edit_users'
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
Route::post('/admin/add-country',[
	'as' => 'add-country',
	'uses' => 'AdminController@add_country'
]);
Route::post('/admin/update-country/{id}',[
	'as' => 'update-coun',
	'uses' => 'AdminController@update_country'
]);
Route::post('/admin/add-dots', [
	'as' => 'add-dots',
	'uses' => 'AdminController@add_dots'
]);
Route::post('/admin/update-dots/{id}', [
	'as' => 'update-dot',
	'uses' => 'AdminController@update_dots'
]);
Route::post('/admin/update-users/{id}',[
	'as' => 'update-user',
	'uses' => 'AdminController@update_users'
]);