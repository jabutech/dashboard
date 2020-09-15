<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('has.role')->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('role-and-permission')->middleware('permission:role & permission')->group(function(){
        // group route role
        Route::prefix('roles')->group(function(){
            Route::get('', 'RoleController@index')->name('roles.index');
            Route::post('create', 'RoleController@store')->name('roles.create');
            Route::get('{role}/edit', 'RoleController@edit')->name('roles.edit');
            Route::put('{role}/edit', 'RoleController@update');
            Route::delete('{role}/delete', 'RoleController@delete')->name('roles.delete');
        });
        // group route permission
        Route::prefix('permissions')->group(function(){
            Route::get('', 'PermissionController@index')->name('permissions.index');
            Route::post('create', 'PermissionController@store')->name('permissions.create');
            Route::get('{permission}/edit', 'PermissionController@edit')->name('permissions.edit');
            Route::put('{permission}/edit', 'PermissionController@update');
            Route::delete('{permission}/delete', 'PermissionController@delete')->name('permissions.delete');
        });
        // group route memberikan role ke permission
        Route::prefix('assignable')->group(function(){
            Route::get('', 'AssignController@index')->name('assign.index');
            Route::post('', 'AssignController@store');
            Route::get('{role}/edit', 'AssignController@edit')->name('assign.edit');
            Route::put('{role}/edit', 'AssignController@update');
        });

        // route memberikan hak akses ke user
        Route::prefix('assign-user')->group(function(){
            Route::get('assign/user', 'UserController@index')->name('assign.user.index');
            Route::post('assign/user', 'UserController@store');
            Route::get('assign/{user}/user', 'UserController@edit')->name('assign.user.edit');
            Route::put('assign/{user}/user', 'UserController@update');
        });
    });
});


