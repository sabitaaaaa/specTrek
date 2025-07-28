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


    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],
    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'weather' => [
    'key' => env('WEATHER_API_KEY'),
],
   'weather' => [
    'key' => env('WEATHER_API_KEY'),
],

        'key' => env('WEATHER_API_KEY'),
    

];
// return [
//     // ... other services

//     'stripe' => [
//         'key' => env('STRIPE_KEY'),
//         'secret' => env('STRIPE_SECRET'), // You might want to rename STRIPE_KEY in .env to STRIPE_SECRET for clarity
//         'publishable_key' => env('STRIPE_PUBLISHABLE_KEY'),
//     ],

// ];

return [
    'khalti'=>[
        'secret'=>env('KHALTI_SECRET_KEY'),
    ],
];
