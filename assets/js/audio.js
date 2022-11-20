
jQuery(document).ready(function($) {
    
    $(window).bind("DOMNodeInserted", function(event) {
        if ($(event.target).hasClass("wp-block-audio")) {
            stylizationAudio($(event.target).find("audio")[0]);
        }        
    });

    var $audios = $("audio");

    for (var audio of $audios) {
        stylizationAudio(audio);
    }



    function stylizationAudio(audio) {
        audio.preload = "metadata";
        var $result = $(`
            <div class="audio">
                ${audio.outerHTML}
            </div>
        `);
        // var $result = createElementFromHTML(`
        //     <div class="audio">
        //         ${audio.outerHTML}
        //     </div>
        // `);
        var $icon = $(`
            <div class="audio__icon fa-solid fa-play"></div>`);
        var $title = $(`
            <span class="audio__title">${audio.title}</span>`);
        var $timer = $(
            `<div class="audio__timer"></div>`);

        $result.append($icon);
        $result.append($title);
        $result.append($timer);
        
        $icon.click(function () {
            audio.paused == true ? play() : stop();
        });
        timeUpdated();
        audio.addEventListener("loadedmetadata", function() {
            timeUpdated();
        }, false);
        $(audio).on("ontimeupdate", timeUpdated);
        $(audio).replaceWith($result);




        function play() {
            audio.play();
            $icon.removeClass('fa-play');
            $icon.addClass('fa-pause');
        }
        
        function stop() {
            audio.pause();
            $icon.removeClass('fa-pause');
            $icon.addClass('fa-play');
        }

        function timeUpdated() {
            var currentMinute = Math.floor(audio.currentTime.toFixed(2) / 60);
            var currentSecond = Math.floor(audio.currentTime.toFixed(2) % 60);
            var durationMinute = Math.floor(audio.duration.toFixed(2) / 60);
            var durationSecond = Math.floor(audio.duration.toFixed(2) % 60);
        
            var currentTime = `${currentMinute}:${currentSecond}`;
            var durationTime = `${durationMinute}:${durationSecond}`;
        
            if (currentSecond < 10)
                currentTime = `${currentMinute}:0${currentSecond}`;
            if (durationSecond < 10)
                durationTime = `${durationMinute}:0${durationSecond}`;
        
            $timer.html(`${currentTime}/${durationTime}`);
        }    
    }
});
  
// $(window).bind("DOMSubtreeModified", function() {
//     var $audios = $('audio');
//     console.log($audios);

//     for (var $audio of $audios) {
//         stylizationAudio($audio);
//     }
// });

