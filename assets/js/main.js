// Filename and file extension check
$("uploadfile").change(
    function() {
        var fileext = $("#fileToUpload").val().split('.').pop();
        if($.inArray(fileext, ['wav','mp3','m4a','aac']) == -1) {
            alert('Invalid Extension!');
            $("#fileToUpload").val('')
        }
    }
);

// File submission
$(document).ready(
    function() {
        $("uploadform").submit(
            function(e) {
                if ($("#fileToUpload").val() == '') {
                    alert('Please select a file!');
                    e.preventDefault(e);
                } else if ($("#filename").val() == '') {
                    alert('Please enter a name for your file!');
                    e.preventDefault(e);
                }
            }
        );
    }
);

// Song looping logic
myAudio = document.getElementById('song');

var startTime = 0;
var endTime = 0;
var breakTime = 0;
var numLoops = 0;
var song = document.getElementById("song");
var stop = false;
var count = 0;
var reset_interval = null;

function updateOptions() {
    startTime = parseInt(document.getElementById("startMin").value) * 60 + parseInt(document.getElementById("startSec").value);
    endTime   = parseInt(document.getElementById("endMin").value) * 60 + parseInt(document.getElementById("endSec").value) + 1;
    breakTime = parseInt(document.getElementById("breakTime").value);
    numLoops  = parseInt(document.getElementById("loopCount").value);
    count     = numLoops;
    loop();
}

function loop() {
    if (count > 0) {
        song.currentTime = startTime;
        reset_interval = setInterval(pause, (endTime - startTime) * 1000);
        song.play();
    }
}

function pause() {
    song.pause();
    count--;
    clearInterval(reset_interval);
    window.setTimeout(loop, breakTime * 1000);
}

function reset() {
    song.currentTime = startTime;
    count--;
    loop();
}
