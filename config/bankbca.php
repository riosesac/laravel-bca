<?php

return [

    'default'     => 'main',

    'connections' => [

        'main'        => [
            'corp_id'       => 'your-corp_id',
            'client_id'     => 'your-client_id',
            'client_secret' => 'your-client_secret',
            'api_key'       => 'your-api_key',
            'secret_key'    => 'your-secret_key',
            'timezone'      => 'Asia/Jakarta',
            'host'          => 'sandbox.bca.co.id',
            'scheme'        => 'https',
            'development'   => true,
            'options'       => [],
            'port'          => 443,
            'timeout'       => 30,
        ],

        'alternative' => [
            'corp_id'       => 'your-corp_id',
            'client_id'     => 'your-client_id',
            'client_secret' => 'your-client_secret',
            'api_key'       => 'your-api_key',
            'secret_key'    => 'your-secret_key',
            'timezone'      => 'Asia/Jakarta',
            'host'          => 'sandbox.bca.co.id',
            'scheme'        => 'https',
            'development'   => true,
            'options'       => [],
            'port'          => 443,
            'timeout'       => 30,
        ],

    ],

];