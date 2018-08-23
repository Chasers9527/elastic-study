<?php

require_once (__DIR__ . "/../common.php");

$deleteParams = [
    'index' => 'test-index'
];
$response = $client->indices()->delete($deleteParams);

print_r($response);