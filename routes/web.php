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
    exit("aqui");
    //return redirect()->route('auth');
});

Route::group(['prefix' => 'rest'], function () {
    Route::group(['prefix' => 'api'], function () {
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
});

Route::fallback(function () {
    exit('Route not found');
    return 'Route not found';
});
