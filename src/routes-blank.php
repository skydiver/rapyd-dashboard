<?php

    # APP DASHBOARD MODULES
    Route::group(['prefix' => 'dashboard', 'middleware' => 'auth', 'namespace' => '\App\Http\Controllers\Dashboard'], function () {

    });