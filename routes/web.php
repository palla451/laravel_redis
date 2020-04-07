<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
use App\User;

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


Route::get('/' ,'UsersController@index');
Route::get('/showprofile/{id}' ,'UsersController@showProfile');



//
//
//Route::get('/', function () {
//    return view('welcome');
//});
