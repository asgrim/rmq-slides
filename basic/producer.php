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

$message = new AMQPMessage('my test message');
$channel->basic_publish($message, '', 'test_queue');