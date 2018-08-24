<?php

require "vendor/autoload.php";

$handlerParams = ['max_handlers' => 500];

$defaultHandler = \Elasticsearch\ClientBuilder::defaultHandler ($handlerParams);

$client = \Elasticsearch\ClientBuilder::create ()->setHandler ($defaultHandler)->build ();
