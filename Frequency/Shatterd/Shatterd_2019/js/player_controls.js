/*
Audio player controls

Created by TerraVoltt 2017+

Changelog:
12.5.2017 - File created, basic controls added
*/

//wait for document load
$(function(){
        
    // global variables    
    var music_song = document.getElementById('music_src');
    var progress_bar = document.getElementById('player_progress_bar');
    var progress_pos = document.getElementById('player_progress_pos');
    var song_length;
    var progress_bar_width = (progress_bar.offsetWidth - progress_pos.offsetWidth);

    
    // DEBUG - special alert for multi audio files
    // alert();
    
    //FUNCTION - get duration of song
    music_song.addEventListener('canplaythrough', function(){
        song_length = music_song.duration;
    }, false)
    
    // click event listener for play/pause button
    $('#player_playPause').click(musicState);
    
    // FUNCTION - move progress bar
    $('#music_src').on("timeupdate", function(){    
        var song_pos = progress_bar_width * (music_song.currentTime / song_length);
       
        $("#player_progress_pos").css("margin-left", (song_pos + "px"));
    });

    // FUNCTION - check music state, change play/pause status
    function musicState(){
    
        if (music_song.paused){   
            music_song.play();
        }
        else {
            music_song.pause();
        }
    }
    

});