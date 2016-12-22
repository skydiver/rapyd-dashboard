<?php

    Route::group(['middleware' => ['web']], function () {

        # AUTH
        Route::get('login', '\Skydiver\RapydDashboard\Controllers\LoginController@showLoginForm')->name('dashboard-login');
        Route::get('logout', '\Skydiver\RapydDashboard\Controllers\LoginController@logout'      )->name('dashboard-logout');

        # LOGIN WITH GOOGLE
        Route::get('auth/google'         , '\Skydiver\RapydDashboard\Controllers\AuthController@redirectToGoogle'    );
        Route::get('auth/google/callback', '\Skydiver\RapydDashboard\Controllers\AuthController@handleGoogleCallback');

    });


    # ADMIN DASHBOARD
    Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth']], function () {

        # HOME
        Route::get(''       , '\Skydiver\RapydDashboard\Controllers\DashboardController@getIndex')->name('dashboard-home');

        # USER PROFILE
        Route::any('profile', '\Skydiver\RapydDashboard\Controllers\ProfileController@getIndex'  );

        # USERS MANAGEMENT
        Route::get ('users'            , '\Skydiver\RapydDashboard\Controllers\UsersController@index' );
        Route::get ('users/form/{id?}' , '\Skydiver\RapydDashboard\Controllers\UsersController@form'  )->where('id', '[0-9]+');
        Route::post('users/form/{id?}' , '\Skydiver\RapydDashboard\Controllers\UsersController@form'  )->where('id', '[0-9]+');
        Route::get ('users/delete/{id}', '\Skydiver\RapydDashboard\Controllers\UsersController@delete')->where('id', '[0-9]+');

        # ADMINER
        Route::any('adminer', '\Skydiver\LaravelAdminer\AdminerController@index');

    });