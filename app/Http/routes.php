<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(array('middleware'=>'auth'), function(){
    Route::get('home', 'UserController@home');
    Route::get('account/logout','UserController@getSignOut');
    Route::get('account/changePassword', 'UserController@getChangePassword');
    Route::post('account/changePassword', 'UserController@postChangePassword');
});

Route::group(array('middleware' => 'guest'), function () {


    Route::post('account/create', array(
        'as' => 'account-create-post',
        'uses' => 'UserController@postCreateAccount'
    ));


    Route::get('account', 'UserController@index');
    Route::get('account/actived/{code}', [
        'as' => 'account-actived',
        'uses' => 'UserController@getActived'
    ]);
    Route::get('account/create', array(
        'as' => 'account-create',
        'uses' => 'UserController@getCreateAccount'
    ));


    Route::get('account/login',array(
        'as' => 'login',
        'uses' => 'UserController@getSignIn'
    ));

    Route::post('account/login',array(
        'as' => 'login-post',
        'uses' => 'UserController@postSignIn'
    ));

});
