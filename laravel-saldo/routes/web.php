<?php

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@index')->name('admin.home');

    Route::get('balance', 'BalanceController@index')->name('admin.balance');
});



Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();

