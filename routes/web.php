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

//login
Route::get('/', [
	'as'=> 'index',
	'uses'=> 'AuthController@login'
]);
Route::post('/login',[
	'as' => 'login',
	'uses' => 'AuthController@after_login'
]);
//user
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
Route::get('/auth/print-all/{code}',[
	'as' => 'print-all',
	'uses' => 'UserController@print_all'
]);
Route::get('/auth/show-faqs',[
	'as' => 'show-faqs',
	'uses' => 'UserController@show_faqs'
]);
//admin
Route::get('/admin/logout',[
	'as' => 'admin-logout',
	'uses' => 'AuthController@logout'
]);
Route::get('/admin/dashboard',[
	'as' => 'dashboard',
	'uses' => 'AdminController@count'
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
Route::get('/admin/editcom', [
	'as'=> 'com-tbl',
	'uses'=> 'AdminController@com_tbl'
]);
Route::get('/admin/edit-cut',[
	'as' => 'edit-cut',
	'uses' => 'AdminController@show_cut'
]);
Route::get('/admin/editcut',[
	'as' => 'cut-tbl',
	'uses' => 'AdminController@cut_tbl'
]);
Route::get('/admin/edit-hscode',[
	'as' => 'edit-hscode',
	'uses' => 'AdminController@show_hscode'
]);
Route::get('/admin/editcode',[
	'as' => 'code-tbl',
	'uses' => 'AdminController@code_tbl'
]);
Route::get('/admin/edit-country',[
	'as' => 'edit-country',
	'uses' => 'AdminController@show_country'
]);
Route::get('/admin/editcoun',[
	'as' => 'coun-tbl',
	'uses' => 'AdminController@coun_tbl'
]);
Route::get('/admin/edit-fme',[
	'as' => 'edit-fme',
	'uses' => 'AdminController@show_fme'
]);
Route::get('/admin/editfme',[
	'as' => 'fme-tbl',
	'uses' => 'AdminController@fme_tbl'
]);
Route::get('/admin/edit-dots',[
	'as' => 'edit-dots',
	'uses' => 'AdminController@show_dots'
]);
Route::get('/admin/eidtdots',[
	'as' => 'dots-tbl',
	'uses' => 'AdminController@dots_tbl'
]);
Route::get('/admin/edit-faqs',[
	'as' => 'edit-faqs',
	'uses' => 'AdminController@show_faqs'
]);
Route::get('/admin/editfaqs',[
	'as' => 'faqs-tbl',
	'uses' => 'AdminController@faqs_tbl'
]);
Route::get('/admin/users',[
	'as' => 'show-users',
	'uses' => 'AdminController@show_users'
]);
Route::get('/admin/showuser',[
	'as' => 'user-tbl',
	'uses' => 'AdminController@user_tbl'
]);
Route::get('/admin/com-logs',[
	'as' => 'com-logs',
	'uses' => 'AdminController@com_logs'
]);
Route::get('/admin/user-logs',[
	'as' => 'user-logs',
	'uses' => 'AdminController@user_logs'
]);
Route::get('/admin/code-logs',[
	'as' => 'code-logs',
	'uses' => 'AdminController@code_logs'
]);
Route::get('/admin/cut-logs',[
	'as' => 'cut-logs',
	'uses' => 'AdminController@cut_logs'
]);
Route::get('/admin/coun-logs',[
	'as' => 'coun-logs',
	'uses' => 'AdminController@coun_logs'
]);
Route::get('/admin/fme-logs',[
	'as' => 'fme-logs',
	'uses' => 'AdminController@fme_logs'
]);
Route::get('/admin/meat-logs',[
	'as' => 'meat-logs',
	'uses' => 'AdminController@meat_logs'
]);
Route::get('/admin/dots-logs',[
	'as' => 'dots-logs',
	'uses' => 'AdminController@dots_logs'
]);
Route::get('/admin/faq-logs',[
	'as' => 'faqs-logs',
	'uses' => 'AdminController@faqs_logs'
]);

//admin with view id
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
Route::get('/admin/update-commodity',[
	'as' => 'update-commodity',
	'uses' => 'AdminController@view_com'
]);
Route::get('/admin/update-cut_type',[
	'as' => 'update-cut_type',
	'uses' => 'AdminController@view_cut'
]);
Route::get('/admin/update-hscode',[
	'as' => 'update-hscode',
	'uses' => 'AdminController@view_hscode'
]);
Route::get('/admin/update-country',[
	'as' => 'update-country',
	'uses' => 'AdminController@view_country'
]);
Route::get('/admin/update-fmes',[
	'as' => 'update-fmes',
	'uses' => 'AdminController@view_fme'
]);
Route::get('/admin/update-dots',[
	'as' => 'update-dots',
	'uses' => 'AdminController@view_dots'
]);
Route::get('/admin/update-faqs',[
	'as' => 'update-faqs',
	'uses' => 'AdminController@view_faqs'
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
Route::post('/admin/update-commodity',[
	'as' => 'update-com',
	'uses' => 'AdminController@update_com'
]);
Route::post('/admin/delete-commodity',[
	'as' => 'delete-commodity',
	'uses' => 'AdminController@delete_com'
]);
Route::post('/admin/add-cut',[
	'as' => 'add-cut',
	'uses' => 'AdminController@add_cut'
]);
Route::post('/admin/update-cut_type',[
	'as' => 'update_cut',
	'uses' => 'AdminController@update_cut'
]);
Route::post('/admin/delete-cut_type',[
	'as' => 'delete-cut_type',
	'uses' => 'AdminController@delete_cut'
]);
Route::post('/admin/add-hscode',[
	'as' => 'add-code',
	'uses' => 'AdminController@add_hscode'
]);
Route::post('/admin/update-hscode',[
	'as' => 'update-code',
	'uses' => 'AdminController@update_hscode'
]);
Route::post('/admin/delete-hscode',[
	'as' => 'delete-hscode',
	'uses' => 'AdminController@delete_hscode'
]);
Route::post('/admin/add-country',[
	'as' => 'add-country',
	'uses' => 'AdminController@add_country'
]);
Route::post('/admin/update-country',[
	'as' => 'update-coun',
	'uses' => 'AdminController@update_country'
]);
Route::post('/admin/delete-country',[
	'as' => 'delete-country',
	'uses' => 'AdminController@delete_country'
]);
Route::post('/admin/add-fme',[
	'as' => 'add-fme',
	'uses' => 'AdminController@add_fme'
]);
Route::post('/admin/update-fme',[
	'as' => 'update-fme',
	'uses' => 'AdminController@update_fme'
]);
Route::post('/admin/delete-fme',[
	'as' => 'delete-fme',
	'uses' => 'AdminController@delete_fme'
]);
Route::post('/admin/add-dots', [
	'as' => 'add-dots',
	'uses' => 'AdminController@add_dots'
]);
Route::post('/admin/add-faqs',[
	'as' => 'add-faqs',
	'uses' => 'AdminController@add_faqs'
]);
Route::post('/admin/update-dots', [
	'as' => 'update-dot',
	'uses' => 'AdminController@update_dots'
]);
Route::post('/admin/delete-dots',[
	'as' => 'delete-dots',
	'uses' => 'AdminController@delete_dots'
]);
Route::post('/admin/update-faqs',[
	'as' => 'update-faq',
	'uses' => 'AdminController@update_faqs'
]);
Route::post('/admin/delete-faqs',[
	'as' => 'delete-faqs',
	'uses' => 'AdminController@delete_faqs'
]);
Route::post('/admin/update-users/{id}',[
	'as' => 'update-user',
	'uses' => 'AdminController@update_users'
]);
