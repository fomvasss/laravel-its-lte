<?php

return [

    'title' => env('APP_NAME', '') . ' - Dashboard',

    'logo' => env('LTE_LOGO', '<b>ITS</b>LTE'),

    'logo_mini' => env('LTE_LOGO_MINI', '<b>IT</b>LT'),

    /*
     * Dashboard home page path
     */
    'logo_href' => '/lte',

    /*
     * For example pages
     */
    'prefix' => 'lte',

    /*
     * For /profile page
     */
    'use_laravel_fortify' => true,

    /*
     * For LTE exaple pages (/lte/*)
     */
    'middleware' => ['web'],

    /**
     * Show next type alerts in dashboard
     * Example success type alert: \Session::flash('success', 'Welcome to Laravel Admin LTE!');
     * Available types: success, info, warning, error
     *
     */

    'view' => [

        /**
         * Available skins:
         * skin-blue, skin-black, skin-purple, skin-green, skin-red,
         * skin-yellow, skin-blue-light, skin-black-light, skin-purple-light,
         * skin-green-light, skin-red-light, skin-yellow-light,
         *
         */
        'skin' => 'skin-purple',
        'layout_boxed' => false,
        'sidebar_collapse' => false,
        'fixed' => false,

        /**
         * Allert types: warning, success, info, error
         * Usage exaple: \Session::flash('info', 'Welcome to Laravel Admin LTE!');
         */
        'alerts' => [
            //'bootstrap',
            //'toastr',
            'sweetalert',
        ],

        'btn_actions_class' => 'btn-xs', //'btn-sm btn-flat'

        /**
         * Example aside menu
         */
        'aside_menu' => [
            'static' => false,
            'static_example' => env('APP_ENV') !== 'production',
            'lte' => env('APP_ENV') !== 'production',
        ],

        'aside_auth_user_info' => false,

        'aside_search' => false,

        'header_filter_languages' => true,

        'header_notify_menus' => true,

    ],
];
