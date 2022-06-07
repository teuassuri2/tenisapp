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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
});

Route::group(['middleware' => 'apiJwt', 'prefix' => 'rest'], function () {

    Route::get('weather/forecast', 'ScheduleStudentController@weatherForecast');
    
    Route::get('student/index', 'StudentController@indexApi');
    Route::post('student/store', 'StudentController@storeApi');
    Route::get('student/edit/{id}', 'StudentController@editApi');
    Route::get('student/remover/{id}', 'StudentController@removerApi');
    
    
    Route::get('group/index', 'GroupController@indexApi');
    Route::post('group/store', 'GroupController@storeApi');
    Route::post('group/edit/{id}', 'GroupController@editApi');
    Route::post('group/remover/{id}', 'GroupController@removerApi');

    Route::get('group_day/index/{group_id}', 'GroupDayController@indexApi');

    Route::get('group_student/index/{student_id}', 'ScheduleStudentController@indexApi');

    Route::get('level/index', 'LevelController@indexApi');

    

    Route::get('user/index', 'UserController@indexApi');
    Route::post('user/store', 'UserController@storeApi');
    Route::post('user/edit/{id}', 'UserController@editApi');
    Route::get('user/remover/{id}', 'UserController@removerApi');
});

