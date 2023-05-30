<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitListener extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'listener';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $connection = new AMQPStreamConnection(env('RABBITMQ_HOST'), 5672, 'local', 'local');
        $channel = $connection->channel();
        $channel->queue_declare('hello', false, false, false, false);
        $this->line('Waiting for messages.');

        $callback = function ($msg) use ($channel, $connection) {
            dump(json_decode($msg->body));
        };

        $channel->basic_consume('hello', '', false, true, false, false, $callback);

        while (true) {
            $channel->wait();
        }
    }
}
