<?php

require_once '../common.php';

$routingKey = isset($argv[1]) ? $argv[1] : null;

if (!in_array($routingKey, ['apple', 'orange', 'banana']))
{
	echo "Usage: {$argv[0]} [apple|orange|banana]\n";
	exit(1);
}

use PhpAmqpLib\Message\AMQPMessage;

$channel->exchange_declare('test_direct', 'direct', false, false, false);

$message = new AMQPMessage('my test message key=' . $routingKey);
$channel->basic_publish($message, 'test_direct', $routingKey);