<?php

require_once (__DIR__ ."/../common.php");

$params = [
    'index' => 'test-index',
    'body' => [
        'settings' => [
            'number_of_shards' => 2,
            'number_of_replicas' => 2
        ]
    ]
];

$response = $client->indices()->create($params);
print_r($response);