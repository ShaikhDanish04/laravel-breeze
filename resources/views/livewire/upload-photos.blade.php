<div>
    <video class="rounded-lg shadow-lg" playsinline autoplay></video>
    <canvas style="display:none"></canvas>
    <button class="px-4 py-2 mt-4 text-white bg-green-500 rounded-lg">Save Photo</button>
</div>
<script>
    const video = document.querySelector('video');
    const canvas = document.querySelector('canvas');

    const button = document.querySelector('button');
    button.onclick = function() {
        // console.log('hi');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        Livewire.emit('storePhoto', canvas.toDataURL());
    };

    const constraints = {
        audio: false,
        video: true
    };

    function handleSuccess(stream) {
        window.stream = stream; // make stream available to browser console
        video.srcObject = stream;
    }

    function handleError(error) {
        console.log('navigator.MediaDevices.getUserMedia error: ', error.message, error.name);
    }

    navigator.mediaDevices.getUserMedia(constraints).then(handleSuccess).catch(handleError);
</script>
