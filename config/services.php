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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '500050987463949',
        'client_secret' => 'e7c2086e484f901f0e9221b58ee6face',
        'redirect' => 'https://localhost:8080/MyLaravel/public/login/facebook/callback',
    ],

    'google' => [
        'client_id' => '942597971013-su5ti5eqro4es7es3j5at5p80lvkbg52.apps.googleusercontent.com',
        'client_secret' => 'ryk2RHglklTQvU9HLztPXNUj',
        'redirect' => 'http://localhost:8080/MyLaravel/public/login/google/callback',
    ],   
];
