<?php

return [
    'oracle' => [
        'driver'        => 'oracle',
        'tns'           => env('DB_TNS', '(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST =10.0.110.55)(PORT = 1521))(CONNECT_DATA =(SERVER = DEDICATED)(SID = ccdb)))'),
        'host'          => env('DB_HOST', '10.0.110.55'),
        'port'          => env('DB_PORT', '1521'),
        'database'      => env('DB_DATABASE', 'aucc_mr'),
        'username'      => env('DB_USERNAME', 'aucc_mr'),
        'password'      => env('DB_PASSWORD', '123456'),
        'charset'       => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'        => env('DB_PREFIX', ''),
        'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
    ],
];
