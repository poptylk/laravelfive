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
    return view('back.layouts.base');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {

    # Dashboard
    Route::controller('dashboard', 'DashboardController', [
        'getIndex' => 'dashboard'
    ]);

    # Setting
    Route::controller('setting', 'SettingController', [
        'getIndex' => 'setting',
    ]);

    # Post
    Route::resource('post', 'PostController', [
        'names' => [
            'index'  => 'post.index',
            'create' => 'post.create',
            'edit'   => 'post.edit',
            'store'  => 'post.store',
            'update' => 'post.update'
        ]
    ]);

    Route::controller('fileUpload', 'FilesUploadController', [
        'postSetting' => 'file.setting'
    ]);

    Route::get('ckfinder', function () {
        return view('ckfinder.ckfinder');
    });
});
