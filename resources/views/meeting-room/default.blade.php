<!-- resources/views/meeting-room/stream.blade.php -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $room->name }}</title>
  </head>
  <body>
    <div id="jitsi-container"></div>
    <script src='https://8x8.vc/vpaas-magic-cookie-78ee653b16954038a2c128d04cf87c24/external_api.js'></script>
    <script>
      const domain = 'localhost';
      const options = {
        roomName: '{{ $roomName }}',
        parentNode: document.querySelector('#jitsi-container'),
        };

const api = new JitsiMeetExternalAPI(domain, options);
      var options = {
        roomName: '{{ $room->name }}',
        parentNode: document.querySelector('#jitsi-container'),
        interfaceConfigOverwrite: {
          SHOW_CHROME_EXTENSION_BANNER: false,
          SHOW_DEEP_LINKING_IMAGE: false,
          TOOLBAR_BUTTONS: [
            'microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen',
            'fodeviceselection', 'hangup', 'profile', 'chat', 'recording',
            'livestreaming', 'etherpad', 'sharedvideo', 'settings', 'raisehand',
            'videoquality', 'filmstrip', 'invite', 'feedback', 'stats', 'shortcuts',
            'tileview', 'videobackgroundblur', 'download', 'help', 'mute-everyone',
            'e2ee'
          ],
          MOBILE_APP_PROMO: false
        },
        userInfo: {
          email: '{{ Auth::user()->email }}',
          displayName: '{{ Auth::user()->name }}'
        },
        jwt: '{{ $jwt }}'
      };

      var api = new JitsiMeetExternalAPI(domain, options);

      api.addEventListener('readyToClose', function () {
        window.location.href = "{{ route('meeting-room.index') }}";
      });
    </script>
  </body>
</html>