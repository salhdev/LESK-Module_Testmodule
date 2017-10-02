<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['prefix' => 'testmodule', 'middleware' => ['web']], function () {
    //
});



// Routes in this group must be authorized.
Route::group(['middleware' => 'authorize'], function () {

    // Testmodule routes
    Route::group(['prefix' => 'testmodule'], function () {
//        Route::get('/',        ['as' => 'testmodule.index',         'uses' => 'TestmoduleController@index']);
//        Removed the index extension to testmodule because it can not find it when redirected as home page :(
//  TODO: Declare Bug to be further investigated !
//  
        Route::get('/', ['as' => 'testmodule', 'uses' => 'TestmoduleController@index']);
    }); // End of Testmodule group
}); // end of AUTHORIZE middleware group
