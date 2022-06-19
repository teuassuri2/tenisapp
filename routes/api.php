<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

/*Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

    Route::get('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
});
 * 
 */

Route::group(['prefix' => 'rest'], function () {
    Route::get('weather/forecast', 'ScheduleStudentController@weatherForecast');
    Route::get('level/index', 'LevelController@indexApi');
    
    
    Route::group(['prefix' => 'user'], function () {
        Route::get('index', 'UserController@indexApi');
        Route::post('store', 'UserController@storeApi');
        Route::post('edit/{id}', 'UserController@editApi');
        Route::get('remover/{id}', 'UserController@removerApi');
    });

    Route::group(['prefix' => 'group'], function () {
        Route::get('index', 'GroupController@indexApi');
        Route::post('store', 'GroupController@storeApi');
        Route::post('edit/{id}', 'GroupController@editApi');
        Route::post('remover/{id}', 'GroupController@removerApi');
    });

    Route::group(['prefix' => 'student'], function () {
        Route::get('index', 'StudentController@indexApi');
        Route::get('group/{group_id}', 'StudentController@studentByGroup');
        Route::post('store', 'StudentController@storeApi');
        Route::post('edit/{id}', 'StudentController@editApi'); 
        Route::get('delete/{id}', 'StudentController@deleteApi');
    });

});

