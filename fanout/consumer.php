<?php

require_once '../common.php';

use PhpAmqpLib\Message\AMQPMessage;

$q = $channel->queue_declare(
  '',    // Lets RabbitMQ pick a name for queue
  false,
  false,
  false,
  true   // Delete this queue
);
$queue_name = $q[0];

$channel->exchange_declare('test_exchange', 'fanout', false, false, false);

$channel->queue_bind($queue_name, 'test_exchange');

$channel->basic_consume(
	$queue_name,
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