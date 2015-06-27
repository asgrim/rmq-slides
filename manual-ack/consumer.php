<?php

require_once '../common.php';

use PhpAmqpLib\Message\AMQPMessage;

$channel->queue_declare(
  'manual_ack_queue', // Name of the queue
  false,
  true,         // Durable = survives restart
  false,
  false			// Auto-delete when disconnecting
);

$channel->basic_consume(
	'manual_ack_queue',
	'',
	false,
	false, // No-ack - if false, we must manually acknowledge
	false, // Exclusive - no other consumers can use Q
	false,
	function(AMQPMessage $message) {
		echo $message->body . "\n";
        throw new Exception('oh noes!!!');

        $message->delivery_info['channel']->basic_ack($message->delivery_info['delivery_tag']);
	}
);

while (count($channel->callbacks)) {
	$channel->wait();
}
