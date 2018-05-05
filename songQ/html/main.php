<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CIS3238 Lab2 Guillermo Vazquez">
    <meta name="author" content="Guillermo Vazquez">
    <link rel="icon" href="../../../../favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <!-- ok here we will include the jquery script source and then scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script src="https://sdk.scdn.co/spotify-player.js"></script>
    <!-- some immediate spotify player sdk stuff.... might move to folder later -->
    <script>
        window.onSpotifyWebPlaybackSDKReady = () => {
  const token = 'BQDHKKKsETSoyXWakWSEr0swi_fDrgAvZ4ixFmZHQ3gG09djhFjXIXT3_VkJk-J5jL-PnOi68VNvosbE66IuWlzMAKPhWYTjgN5kb-gOIy0k-MyPkVlEVBm5Mn9kOm2T-NVRv0Wi-I99atTlIo1pXU2zsphgXoa3VAeYp92AhXwr9K18FFpnHUxG3Q';
  const player = new Spotify.Player({
    name: 'Web Playback SDK Quick Start Player',
    getOAuthToken: cb => { cb(token); }
  });

  // Error handling
  player.addListener('initialization_error', ({ message }) => { console.error(message); });
  player.addListener('authentication_error', ({ message }) => { console.error(message); });
  player.addListener('account_error', ({ message }) => { console.error(message); });
  player.addListener('playback_error', ({ message }) => { console.error(message); });

  // Playback status updates
  player.addListener('player_state_changed', state => { console.log(state); });

  // Ready
  player.addListener('ready', ({ device_id }) => {
    console.log('Ready with Device ID', device_id);
  });

  // Not Ready
  player.addListener('not_ready', ({ device_id }) => {
    console.log('Device ID has gone offline', device_id);
  });

  // Connect to the player!
  player.connect();
};

    </script>
    
    
    <title>songQ main</title>
    </head>
    
    <body>
       
        <div class = "container">
               
                <div class = "input-box">
                           <form id = "userInput" action="#">
                               <input style="background-color: purple; height: 50px; width: 300px; border-width: 3px; border-color: purple; border-radius: 15px;" type="text" name="songInput" placeholder="song name">
                               <input id = "submit" style="background-color: black;height: 50px; width: 100px; border-width: 3px; border-color: black; border-radius: 15px; color: white; font-size: 16px" type="submit" value="Add">
                           </form>   
                </div>
        </div>
        <!-- Bootstrap core JavaScript-->
    <script src="../jquery/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../jquery/jquery.easing.min.js"></script>
    <!-- custom for this page -->
    
    
    </body>
    
</html>
