$(document).ready(
        function() {
            $('#sendRegistrationButton').click(function(){
                //alert("fuuuuck");
                var client_id = "client_id=a067472b3bb24cd98495015f3a48693f&";
                var response_type = "response_type=code$";
                var redirect_uri = "redirect_uri=http://localhost/public_html/songQ/index.php"; 
                var url = "https://accounts.spotify.com/authorize?"+client_id+response_type+redirect_uri;
//                var xmlHttp = new XMLHttpRequest();
//                xmlHttp.open('GET',url,true);
//                xmlHttp.send();
                //alert(url);        
            });
            
        });