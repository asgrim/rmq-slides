<?php

require_once '../common.php';

use PhpAmqpLib\Message\AMQPMessage;

$channel->queue_declare(
  'test_queue', // Name of the queue
  false,
  true,         // Durable = survives restart
  false,
  false			// Auto-delete when disconnecting
);

$channel->basic_consume(
	'test_queue',
	'',
	false,
	true, // No-ack - if false, auto-acknowledge msgs
	false, // Exclusive - no other consumers can use Q
	false,
	function(AMQPMessage $message) {
		echo $message->body . "\n";
	}
);

while (count($channel->callbacks)) {
	$channel->wait();
}