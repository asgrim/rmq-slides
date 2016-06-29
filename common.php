<?php

require_once 'vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPConnection;

$connection = new AMQPConnection(
	'192.168.33.99',
	5672,
	'guest',
	'guest',
	'/'
);
$channel = $connection->channel();
