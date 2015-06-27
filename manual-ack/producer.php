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

$message = new AMQPMessage('message at ' . time());
$channel->basic_publish($message, '', 'manual_ack_queue');
