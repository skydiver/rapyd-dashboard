<?php

    # GOOGLE LOGIN
    Route::get ('oauth'         , '\Skydiver\RapydDashboard\Controllers\OAuthController@getSSOLogin'   );
    Route::get ('oauth/redirect', '\Skydiver\RapydDashboard\Controllers\OAuthController@getRedirGoogle');
    Route::get ('oauth/callback', '\Skydiver\RapydDashboard\Controllers\OAuthController@getLoginGoogle');

    # LOGOUT
    Route::get ('auth/logout', '\Skydiver\RapydDashboard\Controllers\AuthController@getLogout');

    # ADMIN DASHBOARD
    Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

        Route::get(''       , '\Skydiver\RapydDashboard\Controllers\DashboardController@getIndex');
        Route::any('profile', '\Skydiver\RapydDashboard\Controllers\ProfileController@getIndex'  );

        Route::any('adminer', '\Skydiver\LaravelAdminer\AdminerController@index');

    });