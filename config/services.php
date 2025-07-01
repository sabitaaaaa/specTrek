<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

<<<<<<< HEAD
=======
    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

>>>>>>> 51ff48e5d0d0cb0414c83e974f23d7e2b268dd6c
    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

<<<<<<< HEAD
    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

=======
>>>>>>> 51ff48e5d0d0cb0414c83e974f23d7e2b268dd6c
    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

<<<<<<< HEAD
<<<<<<< HEAD
    'weather' => [
    'key' => env('WEATHER_API_KEY'),
],


=======
>>>>>>> 984c64976086bcf7202c3d6842f57cf725e74a5d
=======
>>>>>>> 51ff48e5d0d0cb0414c83e974f23d7e2b268dd6c
];
