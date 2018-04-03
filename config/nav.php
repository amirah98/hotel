<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'admin' => [
        'destination' => [
            'name' =>  'Destination',
            'actions' => [
                'add' => 'admin/destination/create',
                'view' =>  'admin/destination'
            ],
            'icon' => 'ti-control-forward'
        ],
        'user' => [
            'name' => 'User',
            'actions' => [
                'view' => 'admin/user',
            ],
            'icon' => 'ti-user'
        ],
        'slider' => [
            'name' => 'Slider',
            'actions' => [
                'view' => 'admin/slider',
            ],
            'icon' => 'ti-layout-grid2'
        ],
        'agency' => [
            'name' => 'Agency',
            'actions' => [
                'view' => 'admin/agency',
            ],
            'icon' => 'ti-panel'
        ],
        'hotel' => [
            'name' => 'Hotel',
            'actions' => [
                'view' => 'admin/hotel',
            ],
            'icon' => 'ti-home'
        ],
        'travel_medium' => [
            'name' => 'Travel Medium',
            'actions' => [
                'view' => 'admin/travel_medium',
            ],
            'icon' => 'ti-car'
        ],
    ],

];
