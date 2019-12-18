<?php

return [

    'title' => 'LTE Dashboard',

    'logo' => env('LTE_LOGO', '<b>ITS</b>LTE'),

    'logo_mini' => env('LTE_LOGO_MINI', '<b>IT</b>LT'),

    'logo_href' => '/lte',

    'prefix' => 'lte',

    'middleware' => ['web'],

    'default' => [
        'skin' => 'skin-yellow-light',
        'layout_boxed' => false,
        'sidebar_collapse' => false,
        'fixed' => false,
    ]
];