//Accordeon

const tag = document.createElement('script');
const firstScriptTag = document.getElementsByTagName('script')[0];
const videoID = document.querySelector('.video-bg-player').getAttribute('data-video');
const videoOverlay = document.querySelector('.video-bg-overlay');
const playerOptions = {
    autohide: 1,
    autoplay: 1,
    controls: 0,
    disablekb: 1,
    enablejsapi: 1,
    iv_load_policy: 3,
    loop: 1,
    modestbranding: 1,
    mute: 1,
    playlist: videoID,
    rel: 0,
    showinfo: 0
};

tag.src = "https://www.youtube.com/iframe_api";
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

let ytPlayer;

function onYouTubeIframeAPIReady() {
    ytPlayer = new YT.Player('yt-player', {
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        },
        height: '1080',
        playerVars: playerOptions,
        width: '1920',
        videoId: videoID
    });
}

function onPlayerReady(event) {
    event.target.playVideo();

    const videoDuration = event.target.getDuration();

    setInterval(function() {
        const videoCurrentTime = event.target.getCurrentTime();
        const timeDifference = videoDuration - videoCurrentTime;

        if (2 > timeDifference > 0) {
            event.target.seekTo(0);
        }
    }, 1000);
}

function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING) {
        videoOverlay.classList.add('video-bg-overlay--fadeOut');
    }
}


