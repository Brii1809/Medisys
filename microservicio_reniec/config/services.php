<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | Este archivo almacena las credenciales para servicios de terceros como
    | Mailgun, Postmark, AWS y otros. Aquí se incluye la configuración
    | de la API externa RENIEC que usará el microservicio.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // Configuración de la API externa RENIEC
    'reniec' => [
        'base_url' => env('RENIEC_BASE_URL', 'https://api.apis.net.pe/v2/reniec'),
        'token' => env('RENIEC_TOKEN', 'apis-token-12231.7uDBmK5QAsQVvDrgWnpyH3g23czkS7du'),
    ],

];
