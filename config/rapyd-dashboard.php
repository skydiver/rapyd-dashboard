<?php

    return [

        # DASHBOARD TITLE
        'title' => 'Rapyd Dashboard',

        # CUSTOM LOGO ON HOME
        # 'logo' => asset('imgs/logo.png'),

        # SIDEBAR ITEMS
        'sidebar' => [
         /* 'BUTTON LABEL' => [
                'action' => 'Dashboard\DemoController@getIndex',
                'params' => 'db=' . env('DB_DATABASE'),
                'icon'   => 'icon-gear',
                'active' => 'dashboard/demo'
            ], */

         /* 'Just a header' => [
                'header' => true
            ], */
        ],

        # EXTRA SIDEBAR ITEMS
        'sidebar_extra' => [
            'Adminer' => [
                'action' => '\Skydiver\LaravelAdminer\AdminerController@index',
                'params' => 'db=' . env('DB_DATABASE'),
                'icon'   => 'fa fa-database'
            ]
        ],

    ];

?>