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
Route::get('/home', 'HomeController@index')->name('home');


Route::match(['get','post'],'/admin','AdminController@login');
Auth::routes();


Route::group(['middleware'=>['auth']],function(){
Route::get('/admin/dashboard','AdminController@dashboard');
Route::get('/admin/settings','AdminController@settings');
Route::get('/admin/check-pwd','AdminController@chkPassword');
Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');
Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
Route::get('/admin/view-categories','CategoryController@viewCategories');
Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
Route::get('/admin/add-admin','AdminController@getAdminPage');
Route::post('/admin/add-addmin','AdminController@addAdmin');
});



Route::get('/logout','AdminController@logout');