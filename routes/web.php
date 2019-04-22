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
    return view('admin.master');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin'],function(){
    Route::get('admin-register','Admin\AdminLoginController@show_registration_form')->name('admin.register');
    Route::get('admin-login','Admin\AdminLoginController@show_login_form')->name('admin.login');
    Route::post('admin-registration','Admin\AdminLoginController@register')->name('admin.registration');
    Route::post('admin-login','Admin\AdminLoginController@login')->name('admin.adminlogin');
    Route::get('admin-dashboard','Admin\AdminController@index')->name('admin.dashboard');
    Route::get('admin-logout','Admin\AdminLoginController@logout')->name('admin.logout');
});
