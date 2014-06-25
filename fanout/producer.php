<?php

require_once '../common.php';

$id = (int)(isset($argv[1]) ? $argv[1] : 0);

use PhpAmqpLib\Message\AMQPMessage;

$channel->exchange_declare('test_exchange', 'fanout', false, false, false);

$message = new AMQPMessage('my test message #' . $id);
$channel->basic_publish($message, 'test_exchange');