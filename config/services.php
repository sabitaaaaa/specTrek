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
<<<<<<< HEAD

<<<<<<< HEAD
=======
>>>>>>> feature/trekking-mapp
=======

>>>>>>> feature/itinerary-and-blogs
    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> feature-admin
=======

>>>>>>> feature/trekking-mapp
=======
>>>>>>> feature/itinerary-and-blogs
    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======

>>>>>>> feature/trekking-mapp
    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

<<<<<<< HEAD
>>>>>>> feature-admin
=======

>>>>>>> feature/trekking-mapp
=======
>>>>>>> feature/itinerary-and-blogs
    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
    'weather' => [
    'key' => env('WEATHER_API_KEY'),
],

>>>>>>> feature-admin



   'weather' => [
    'key' => env('WEATHER_API_KEY'),
],

=======
>>>>>>> feature/itinerary-and-blogs

];
