<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'v1', 'middleware' => []], function () {

    Route::group(['middleware' => ['auth:api']], function () {

        Route::group(['namespace' => 'Api\V1'], function () {
            Route::group(['prefix' => 'auth'], function () {
                Route::get('logout', 'AuthController@logout')->name('auth.logout');
            });
            Route::get('auth/user', 'AuthController@user')->name('auth_user');            
            Route::resource('users', 'UserController');
        });
        
    });

    Route::group(['middleware' => ['auth:api', 'verified']], function () {
        //Le middleware 'verified' ne marche pas même si le email est vérifié
    });
});
