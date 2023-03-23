const peer = new Peer();

navigator.mediaDevices.getUserMedia({ video: true, audio: true })
    .then(stream => {
        const localVideo = document.getElementById('local-video');
        localVideo.srcObject = stream;

        const call = peer.call('remote-peer-id', stream);

        call.on('stream', remoteStream => {
            const remoteVideo = document.getElementById('remote-video');
            remoteVideo.srcObject = remoteStream;
        });
    });