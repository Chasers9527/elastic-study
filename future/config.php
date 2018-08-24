<?php
require_once (__DIR__ . "/../common.php");

$params = [
    'index' => 'es-test',
    'type'  => 'test',
    'id' => 'F0KdZWUB_weDmiZYpHZH',
    'client' => [
        'future' => 'lazy'
    ]
];

// future 对象，而不是真正的响应数据
$future = $client->get($params);

// print_r($future);