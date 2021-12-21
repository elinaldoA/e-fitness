<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'esaude',
            'hash' => false,
        ],

        'recepcao' => [
            'driver' => 'session',
            'provider' => 'recepcao',
        ],
        'api-recepcao' => [
            'driver' => 'passport',
            'provider' => 'recepcao',
            'hash' => false,
        ],
        'nutricionistas' => [
            'driver' => 'session',
            'provider' => 'nutricionistas',
        ],
        'api-nutricionistas' => [
            'driver' => 'passport',
            'provider' => 'nutricionistas',
            'hash' => false,
        ],

        'professores' => [
            'driver' => 'session',
            'provider' => 'professores',
        ],
        'api-professores' => [
            'driver' => 'passport',
            'provider' => 'professores',
            'hash' => false,
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => \App\User::class,
        ],

        'recepcao' => [
            'driver' => 'eloquent',
            'model' => \App\Models\Recepcaos::class,
        ],

        'nutricionistas' => [
            'driver' => 'eloquent',
            'model' => \App\Models\Nutricionistas::class,
        ],

        'professores' => [
            'driver' => 'eloquent',
            'model' => \App\Models\Professores::class,
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
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'nutricionistas' => [
            'provider' => 'nutricionistas',
            'table' => 'password_resets_nutricionistas',
            'expire' => 1440,
            'throttle' => 60,
        ],

        'professores' => [
            'provider' => 'professores',
            'table' => 'password_resets_professores',
            'expire' => 1440,
            'throttle' => 60,
        ],

        'recepcao' => [
            'provider' => 'recepcao',
            'table' => 'password_resets_recepcao',
            'expire' => 1440,
            'throttle' => 60,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
