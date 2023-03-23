<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;

class MqttReceiver extends Command
{
    protected $signature = 'mqtt:receive';
    protected $description = 'Receive MQTT messages';

    public function handle()
    {
        $mqtt = new MqttClient('127.0.0.1', 6001, 'WebServer');

        $mqtt->connect();

        $mqtt->subscribe('telesurgery', function (string $topic, string $message) {
            // Handle the received message here
        });

        $mqtt->loop(true);
    }
}