//FOR THE VIDEO

console.log('Hello');

$(document).ready(function() {
    var video = document.getElementById('adVideo');
    var videoContainer = document.getElementById('adVideoContainer');

    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                video.play();
            } else {
                video.pause();
                video.currentTime = 0; // Reset video to beginning when not visible
            }
        });
    }, {
        threshold: 0.5
    });

    observer.observe(videoContainer);
});
