<?php

require __DIR__ . "/../vendor/autoload.php";

$handlerParams = ['max_handlers' => 500];

$defaultHandler = \Elasticsearch\ClientBuilder::defaultHandler ($handlerParams);

$client = \Elasticsearch\ClientBuilder::create ()->setHandler ($defaultHandler)->build ();

$params = [
    'index' => 'es-test',
    'type' => 'test',
    'id' => 1,
    'client' => [
        'future' => 'lazy'
    ]
];

$futures['getRequest'] = $client->get($params);     // First request

$params = [
    'index' => 'es-test',
    'type' => 'test',
    'body' => [
        'id' => '123',
        'content' => 'test info'
    ],
    'client' => [
        'future' => 'lazy'
    ]
];

$futures['indexRequest'] = $client->b($params);       // Second request

$params = [
    'index' => 'es-test',
    'type' => 'test',
    'body' => [
        'query' => [
            'match' => [
                'content' => '测试'
            ]
        ]
    ],
    'client' => [
        'future' => 'lazy'
    ]
];

$futures['searchRequest'] = $client->search($params);      // Third request


// Resolve futures...blocks until network call completes
$searchResults = $futures['searchRequest']['hits'];

// Should return immediately, since the previous future resolved the entire batch

$doc = $futures['getRequest']['_source'];

print_r($doc);
die();