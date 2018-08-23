<?php

// 展示一些配置项

require "vendor/autoload.php";

use Elasticsearch\ClientBuilder;
use Monolog\Logger;

$hosts = [
    // 等价于内联主机配置中使用 "https://username:password!#$?*abc@foo.com:9200/"
    /*
    [
        'host' => 'foo.com',
        'port' => '9200',
        'scheme' => 'https',
        'user' => 'username',
        'pass' => 'password!#$?*abc'
    ],
    */

    // 等价于内联主机配置中使用 "http://localhost:9200/"
    [
        'host' => 'localhost',    // 只有 host 是必须的
    ],
];

$defaultHandler = ClientBuilder::defaultHandler();
$singleHandler = ClientBuilder::singleHandler();
$multiHandler = ClientBuilder::multiHandler();
// 自定义handle
//$customHandler = new MyCustomHandler();

// 用第 2 个参数设置日志级别
$logger = ClientBuilder::defaultLogger(__DIR__ . '/../logs/access.log', Logger::INFO);

$client = ClientBuilder::create()
    ->setHosts($hosts)// hosts 设置
    ->setRetries(2)// 重试次数
    ->setHandler($defaultHandler)
    ->setLogger($logger)
    ->build();

try {
    // do what you want
    echo "success";
} catch (Elasticsearch\Common\Exceptions\Curl\CouldNotConnectToHost $e) {
    $previous = $e->getPrevious();
    if($previous instanceof Elasticsearch\Common\Exceptions\MaxRetriesException) {
        echo "Max retries!";
    }
}