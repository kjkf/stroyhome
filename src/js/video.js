function initModalVideo() {
    window.document.onkeydown = function(e) {
        if (!e) {
            e = event;
        }
        if (e.key === 'Escape') {
            lightbox_close();
        }
    };

    const btnPlay = document.querySelector('.btn-play');
    if (!btnPlay) return false;
    btnPlay.addEventListener('click', function (e) {
        e.preventDefault();
        lightbox_open();
    });

    const fade = document.createElement('div'); //.getElementById('fade');
    fade.id='fade';
    document.body.append(fade);

    const light = document.getElementById('light');
    const boxclose = document.getElementById('boxclose');
    fade.addEventListener('click', lightbox_close);
    boxclose.addEventListener('click', lightbox_close);

    function lightbox_open() {
        var lightBoxVideo = document.getElementById("modalvideo");
        window.scrollTo(0, 0);
        light.style.display = 'block';
        fade.style.display = 'block';
        lightBoxVideo.play();
    }

    function lightbox_close() {
        var lightBoxVideo = document.getElementById("modalvideo");
        light.style.display = 'none';
        fade.style.display = 'none';
        lightBoxVideo.pause();
    }
}

