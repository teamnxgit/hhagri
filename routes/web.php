<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){
    // Farmer
    Route::any('/farmer', 'FarmerController@index')->name('Farmer');
    Route::get('/farmer/new', 'FarmerController@new')->name('New Farmer');
    Route::post('/farmer/add', 'FarmerController@add');
    Route::post('/farmer/rem', 'FarmerController@rem');

    // User
    Route::get('/users', 'UserController@index');
    Route::get('/user/{id}', 'UserController@user');
    Route::post('/user/{id}/addpermission', 'UserController@addPermission');
    Route::post('/user/{id}/rempermission', 'UserController@remPermission');
    Route::post('/user/{id}/updateuser', 'UserController@updateUser');
});