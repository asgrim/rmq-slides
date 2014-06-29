<?php

require_once '../common.php';

use PhpAmqpLib\Message\AMQPMessage;

$q = $channel->queue_declare('', false, false, false, true);
$queue_name = $q[0];

$channel->exchange_declare('test_direct', 'direct', false, false, false);

$fruits = array_slice($argv, 1);
if (empty($fruits))
{
	echo "Usage: {$argv[0]} [apple] [orange] [banana]\n";
	exit(1);
}

foreach ($fruits as $fruit)
{
	$channel->queue_bind($queue_name, 'test_direct', $fruit);
}

$channel->basic_consume(
	$queue_name, '', false, true, false, false,
	function(AMQPMessage $message) {
		$key = $message->delivery_info['routing_key'];
		echo "[" . $key . "]: " . $message->body . "\n";
	}
);

while (count($channel->callbacks)) {
	$channel->wait();
}