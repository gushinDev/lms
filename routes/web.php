<?php

use Illuminate\Support\Facades\Route;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


Route::get('/send', function() {
    $connection = new AMQPStreamConnection(env('RABBITMQ_HOST'), 5672, 'local', 'local');
    $channel = $connection->channel();
    $channel->queue_declare('hello', false, false, false, false);

    $arr = [2,3,5];
    $str = json_encode($arr);

    $msg = new AMQPMessage($str);
    $channel->basic_publish($msg, '', 'hello');
    $channel->close();
    $connection->close();
});
