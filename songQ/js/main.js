$(document).ready(
        function() {
            $('#submit').click(function(){
                var newHeight = $(".input-box").height() + 50;
                var song = '<div class = "song">\
                    <div  class = "songName"></div>\
                    <div  class = "songArtist"></div>\
                    <div class = "contributor"></div>\
               </div>';
                  $(song).insertBefore(".input-box");
                //$(".container").css({'height':newHeight+'%'});
            });
        });