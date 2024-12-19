<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | Este archivo almacena las credenciales para servicios de terceros como
    | Mailgun, Postmark, AWS y otros. Aquí agregaremos configuraciones
    | adicionales como el microservicio RENIEC.
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

    // Configuración para la API externa RENIEC (Respaldo)
    'reniec' => [
        'base_url' => env('API_DNI_BASE_URL', 'https://api.apis.net.pe'),
        'token' => env('API_DNI_TOKEN', 'apis-token-12231.7uDBmK5QAsQVvDrgWnpyH3g23czkS7du'),
    ],

    // Configuración del Microservicio RENIEC
    'microservicio' => [
        'reniec_url' => env('MICROSERVICIO_RENIEC_URL', 'http://34.60.43.34:8001/api/reniec/dni'),
    ],

];
