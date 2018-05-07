$(document).ready(
        function() {
            $('#submit').click(function(){
                var height = $(".container").height();
                var newHeight = height + 200;
                var song = '<div class = "song">\
                    <div  class = "songName"></div>\
                    <div  class = "songArtist" id = "here"></div>\
                    <div class = "contributor"></div>\
               </div>';
                var input = document.getElementById("songIn").value;
                //alert(input);
                  $(song).insertBefore(".input-box");
                $(".container").css({'height':newHeight+'px'});
                document.getElementById("here").innerHTML = input;
                document.getElementById("here").style.color = "white";
                //document.getElementById("songIn").value = '';
            });
        });