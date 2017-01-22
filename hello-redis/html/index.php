<?php

$rootDir = dirname(__DIR__);

require_once $rootDir.'/vendor/autoload.php';

$client = new Predis\Client('tcp://redis:6379');
$counter = $client->incr('hello-redis:counter');

?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Counter</title>
    </head>
    <body>
        <p>At <?=$counter?>.</p>
    </body>
</html>
