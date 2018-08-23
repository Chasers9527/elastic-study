<?php
require_once (__DIR__ ."/../common.php");

$params = [
    'index' => 'es-test',
    'type'  => 'test',
    'id'    => 'F0KdZWUB_weDmiZYpHZH',
];

$response = $client->get ($params);

// 删除数据
// $response = $client->delete ($params);

print_r ($response);
/*
执行结果：
Array
(
    [_index] => es-test
    [_type] => test
    [_id] => F0KdZWUB_weDmiZYpHZH
    [_version] => 1
    [found] => 1
    [_source] => Array
    (
        [id] => 1
        [content] => 测试数据
    )
)
*/
