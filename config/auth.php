<?php

return [

    /*
      |--------------------------------------------------------------------------
      | Authentication Defaults
      |--------------------------------------------------------------------------
     */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],
    /*
      |--------------------------------------------------------------------------
      | Authentication Guards
      |--------------------------------------------------------------------------
     */
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'admin-api' => [
            'driver' => 'token',
            'provider' => 'admins',
        ],
    ],
    /*
      |--------------------------------------------------------------------------
      | User Providers
      |--------------------------------------------------------------------------
     */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class,
        ],
    // 'users' => [
    //     'driver' => 'database',
    //     'table' => 'users',
    // ],
    ],
    /*
      |--------------------------------------------------------------------------
      | Resetting Passwords
      |--------------------------------------------------------------------------
     */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],
];
