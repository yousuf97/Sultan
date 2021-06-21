(function (window, videojs) {
    if ($('.video-js').length) {
        var player = window.player = videojs('videojs-hls-quality-selector-player',{playbackRates: [0.5, 1, 1.5, 2]});
        player.hlsQualitySelector({
            displayCurrentQuality: true,
        });
        // player.aspectRatio('1:2');
        player.fill(true);
        // player.fluid(true);
        // player.responsive(true);
    }

}(window, window.videojs));

