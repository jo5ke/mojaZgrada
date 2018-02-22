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

// Auth::routes();

Route::get('/home', 'UserController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@getAdminLogin')->name('getAdminlogin');
  Route::post('/login', 'AdminAuth\LoginController@postAdminLogin')->name('postAdminLogin');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@getAdminRegister')->name('getAdminRegister');
  Route::post('/register', 'AdminAuth\RegisterController@postAdminRegister')->name('postAdminRegister');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});


// Authentication Routes...
Route::get('userLogin', 'Auth\LoginController@getUserLogin')->name('getUserLogin');
Route::post('userLogin', 'Auth\LoginController@postUserLogin')->name('postUserLogin');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('userRegister', 'Auth\RegisterController@getUserRegister')->name('getUserRegister');
Route::post('userRegister', 'Auth\RegisterController@postUserRegister')->name('postUserRegister');
Route::get('/confirmUser/{token}', 'Auth\RegisterController@confirmUser')->name('confirmUser');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Route::get('/invoices', 'AdminController@getInvoices')->name('getInvoices');
Route::get('/invoices', function(){
  return view('invoicetest');
});

Route::get('/registerBuilding', 'BuildingController@getRegisterBuilding')->name('getRegisterBuilding');
Route::post('/registerBuilding', 'BuildingController@postRegisterBuilding')->name('postRegisterBuilding');
Route::post('/postBuildingPayment', 'BuildingController@postBuildingPayment')->name('postBuildingPayment');
Route::post('/createApartments', 'BuildingController@createApartments')->name('createApartments');

Route::get('/adminDashboard', 'AdminController@getAdminDashboard')->name('getAdminDashboard');
Route::get('/userprofiles', 'AdminController@getEditUsers')->name('getEditUsers');
Route::get('/editUser/{uid}', 'AdminController@getEditUserAccount')->name('getEditUserAccount');
Route::post('/postEditUserAccount', 'AdminController@postEditUserAccount')->name('postEditUserAccount');
Route::post('/deleteUserAccount', 'AdminController@deleteUserAccount')->name('deleteUserAccount');







    
