<?php
require "vendor/autoload.php";

use Elasticsearch\ClientBuilder;
use Monolog\Logger;

// 用第 2 个参数设置日志级别
$logger = ClientBuilder::defaultLogger(__DIR__ .'/logs/access.log', Logger::ERROR);
// 此处 setHosts 可以设置多个，不设置则为默认: localhost:9200
$client = ClientBuilder::create ()->setHosts (['localhost:9200'])->setLogger($logger, Logger::INFO)->build ();