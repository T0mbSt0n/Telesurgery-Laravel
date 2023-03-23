
        // Connect to MQTT broker
        var client = mqtt.connect('ws://127.0.0.1:6001');
        // Set up subscription and message handler
        client.on('connect', function() {
        client.subscribe('telesurgery');
        });
        client.on('message', function(topic, message) {
            console.log('Received message:', message.toString());
            document.getElementById('mqtt-data').innerText = message.toString();
            });
