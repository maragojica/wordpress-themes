//Youtube

const tag = document.createElement('script');
const firstScriptTag = document.getElementsByTagName('script')[0];

let videoID;
let playerOptions;
if(document.getElementById("yt-player")){
    videoID = document.querySelector('.youtube-desk').getAttribute('data-video');
 }

let videoIDmv;
let playerOptionsmv;
if(document.getElementById("yt-player-mv")){
videoIDmv = document.querySelector('.youtube-mv').getAttribute('data-video');
}

if(document.getElementById("yt-player")){
playerOptions = {
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
}
if(document.getElementById("yt-player-mv")){
playerOptionsmv = {
    autohide: 1,
    autoplay: 1,
    controls: 0,
    disablekb: 1,
    enablejsapi: 1,
    iv_load_policy: 3,
    loop: 1,
    modestbranding: 1,
    mute: 1,
    playlist: videoIDmv,
    rel: 0,
    showinfo: 0
};
}
tag.src = "https://www.youtube.com/iframe_api";
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

let ytPlayer;
let ytPlayermv;

function onYouTubeIframeAPIReady() {
    if(document.getElementById("yt-player")){
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
    if(document.getElementById("yt-player-mv")){
        ytPlayermv = new YT.Player('yt-player-mv', {
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            },
            height: '1080',
            playerVars: playerOptionsmv,
            width: '1920',
            videoId: videoIDmv
        });
    }
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


