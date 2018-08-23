<?php
require_once (__DIR__ ."/../common.php");

$params = [
    'index' => 'es-test',
    'type'  => 'test',
    'body'    => [
        'query' => [
            'match' => [
                'content' => '数据'
            ]
        ]
    ],
];

$response = $client->search($params);

print_r ($response);