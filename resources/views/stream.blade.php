<html>
<head>
    <title>Video Streaming</title>
    <script src="https://cdn.jsdelivr.net/npm/peerjs@1.3.2/dist/peerjs.min.js"></script>
    <script src="{{ asset('js/simplepeer.min.js') }}"></script>
    <script src="{{ asset('js/video-streaming.js') }}"></script>
</head>
<body>
    <video id="local-video" autoplay></video>
    <video id="remote-video" autoplay></video>
</body>
</html>