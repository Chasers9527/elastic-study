<?php
require_once (__DIR__ ."/../common.php");

$params = [
    'index' => 'es-test',
    'type'  => 'test',
    // 如果不指定id 则使用 es 默认的创建id的规则。此处不建议使用自定义id
    // 'id'    => 1,
    'body'  => [
        'id'      => 1,
        'content' => '测试数据',
    ],
];

$response = $client->index ($params);

print_r ($response);