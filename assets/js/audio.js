jQuery(document).ready(function($) {

    audioAdded(findAndStylizationWPAudio);



    function findAndStylizationWPAudio($audios) {
        for (audio of $audios)
            stylizationWPAudio(audio);
    }




    // functions

    function stylizationWPAudio(container) {
        var $container = $(container);
        $container.attr("data-audio-active", "true");

        var audioPlayer = $container.find("audio")[0];

        // audio controls
        var $icon = $(`
            <div class="wp-block-audio__icon fa-solid fa-play"></div>`);
        var $resetIcon = $(`
            <div class="wp-block-audio__icon fa-solid fa-rotate-right"></div>`);
        var $timer = $(
            `<div class="wp-block-audio__timer"></div>`);

        var $title = $container.find(".wp-element-caption");


        // запускати функції тільки після створення контролерів($icon, $resetIcon, $timer)
        // в майбутньому можна буде переробити
        addControls();

        activateIconClickEvents();
        activateResetIconClickEvents();
        activateTimerUpdateEvents();

        function addControls() {
            if ($title.length === 0) {
                addControlsWithCustomFunction($container.append.bind($container));
            } else {
                addControlsWithCustomFunction($title.before.bind($title));
            }

            function addControlsWithCustomFunction(add) {
                add($icon);
                add($resetIcon);
                add($timer);
            }
        }

        function activateIconClickEvents() {
            $icon.click(function () {
                audioPlayer.paused == true ? play() : pause();
            });

            function play() {
                audioPlayer.play();
                $icon.removeClass("fa-play");
                $icon.addClass("fa-pause");
            }

            function pause() {
                audioPlayer.pause();
                $icon.removeClass("fa-pause");
                $icon.addClass("fa-play");
            }
        }

        function activateResetIconClickEvents() {
            $resetIcon.click(function () {
                audioPlayer.currentTime = 0;
            });
        }

        function activateTimerUpdateEvents() {

            audioPlayer.addEventListener("loadedmetadata", updateTimer);
            audioPlayer.addEventListener("timeupdate", updateTimer);
            updateTimer();

            function updateTimer() {
                var currentMinute = Math.floor(audioPlayer.currentTime.toFixed(2) / 60);
                var currentSecond = Math.floor(audioPlayer.currentTime.toFixed(2) % 60);
                var durationMinute = Math.floor(audioPlayer.duration.toFixed(2) / 60);
                var durationSecond = Math.floor(audioPlayer.duration.toFixed(2) % 60);
                var currentTime = `${currentMinute}:${currentSecond}`;
                var durationTime = `${durationMinute}:${durationSecond}`;

                if (currentSecond < 10)
                    currentTime = `${currentMinute}:0${currentSecond}`;
                if (durationSecond < 10)
                    durationTime = `${durationMinute}:0${durationSecond}`;

                $timer.html(`${currentTime}/${durationTime}`);
            }
        }
    }

    function audioAdded(callback, msInterval = 500) {
        if (callback == null)
            return;
            
        setInterval(function() {
            var $audios = $(".wp-block-audio:not([data-audio-active])");
            if ($audios.length > 0) {
                //Actual functions goes here
                callback($audios);
            }
        }, msInterval);
    }
});