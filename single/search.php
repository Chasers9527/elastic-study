<?php

require "../vendor/autoload.php";

use Elasticsearch\ClientBuilder;

// 此处 setHosts 可以设置多个，不设置则为默认: localhost:9200
$client = ClientBuilder::create ()->setHosts (['localhost:9200'])->build ();

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