<?

require __DIR__ . '/vendor/autoload.php';

use PhpMqtt\Client\MqttClient;

$mqtt = new MqttClient('127.0.0.1', 6001, 'WebServer');

$mqtt->connect();

$mqtt->subscribe('telesurgery', function (string $topic, string $message) {
    // Handle the received message here
});

$mqtt->loop(true);