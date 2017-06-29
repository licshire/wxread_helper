<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    //阿里大鱼接口配置
    'dayu' => [
        'app_key' => env('DAYU_APP_KEY'),
        'app_secret' => env('DAYU_APP_SECRET'),
        'format' => 'json',
        'log_dir' => '/tmp',
        'sms_from' => env('DAYU_SMS_SIGN_NAME'),
        'sms_type' => 'normal',
        'sms_template' => env('DAYU_SMS_TEMPLATE','SMS_9655108')
    ],

];
