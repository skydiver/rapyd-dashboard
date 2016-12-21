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

        Route::get(''       , '\Skydiver\RapydDashboard\Controllers\DashboardController@getIndex')->name('dashboard-home');
        Route::any('profile', '\Skydiver\RapydDashboard\Controllers\ProfileController@getIndex'  );

        Route::any('adminer', '\Skydiver\LaravelAdminer\AdminerController@index');

    });