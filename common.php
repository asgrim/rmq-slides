<?php

require_once 'vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPConnection;

$connection = new AMQPConnection(
	'localhost',
	5672,
	'guest',
	'guest',
	'/'
);
$channel = $connection->channel();