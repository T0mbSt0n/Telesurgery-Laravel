  // Connect to MQTT broker
  var client = mqtt.connect('ws://149.100.138.89:9001');

  // Set up subscriptions and message handlers
  client.on('connect', function() {
      client.subscribe('TA-morob1');
      client.subscribe('TA-morob2');
      client.subscribe('TA-morob3');
      client.subscribe('TA-morob4');
      client.subscribe('TA-morob5');
      client.subscribe('TA-hapdev1');
      client.subscribe('TA-hapdev2');
      client.subscribe('TA-hapdev3');
      client.subscribe('TA-hapdev4');
      client.subscribe('TA-hapdev5');
      client.subscribe('TA-gyro');
  });

  client.on('message', function(topic, message) {
      console.log('Received message:', message.toString());

      // Find the mqtt-data element corresponding to the topic
      var mqttDataElem = document.getElementById(topic);
      if (mqttDataElem) {
          // Update the element with the received message
          mqttDataElem.innerText = message.toString();
  }});              

  client.on('message', (topic, message) => {
      const data = JSON.parse(message.toString());
      const now = new Date();
      const timezoneOffset = now.getTimezoneOffset() * 60000;
      const timestamp = new Date(now - timezoneOffset).toISOString().slice(0, 19).replace('T', ' ');
      const mqtt = {
          motor1: topic === 'TA-morob1' ? message.toString() : null,
          haptic1: topic === 'TA-hapdev1' ? message.toString() : null,
          published_at: timestamp
      };
      axios.post('/mqtt-data-motor-1', mqtt);
  });

  client.on('message', (topic, message) => {
      const data = JSON.parse(message.toString());
      const now = new Date();
      const timezoneOffset = now.getTimezoneOffset() * 60000;
      const timestamp = new Date(now - timezoneOffset).toISOString().slice(0, 19).replace('T', ' ');
      const mqtt = {
          motor2: topic === 'TA-morob2' ? message.toString() : null,
          haptic2: topic === 'TA-hapdev2' ? message.toString() : null,
          published_at: timestamp
      };
      axios.post('/mqtt-data-motor-2', mqtt);
  });

  client.on('message', (topic, message) => {
      const data = JSON.parse(message.toString());
      const now = new Date();
      const timezoneOffset = now.getTimezoneOffset() * 60000;
      const timestamp = new Date(now - timezoneOffset).toISOString().slice(0, 19).replace('T', ' ');
      const mqtt = {
          motor3: topic === 'TA-morob3' ? message.toString() : null,
          haptic3: topic === 'TA-hapdev3' ? message.toString() : null,
          published_at: timestamp
      };
      axios.post('/mqtt-data-motor-3', mqtt);
  });

  client.on('message', (topic, message) => {
      const data = JSON.parse(message.toString());
      const now = new Date();
      const timezoneOffset = now.getTimezoneOffset() * 60000;
      const timestamp = new Date(now - timezoneOffset).toISOString().slice(0, 19).replace('T', ' ');
      const mqtt = {
          motor4: topic === 'TA-morob4' ? message.toString() : null,
          haptic4: topic === 'TA-hapdev4' ? message.toString() : null,
          published_at: timestamp
      };
      axios.post('/mqtt-data-motor-4', mqtt);
  });

  client.on('message', (topic, message) => {
      const data = JSON.parse(message.toString());
      const now = new Date();
      const timezoneOffset = now.getTimezoneOffset() * 60000;
      const timestamp = new Date(now - timezoneOffset).toISOString().slice(0, 19).replace('T', ' ');
      const mqtt = {
          motor5: topic === 'TA-morob5' ? message.toString() : null,
          haptic5: topic === 'TA-hapdev5' ? message.toString() : null,
          published_at: timestamp
      };
      axios.post('/mqtt-data-motor-5', mqtt);
  });