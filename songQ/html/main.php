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
  const token = 'BQBzxQbXnRTovVxNfWDvu89Q6v8qB8-H-tM1WUNk5FNL6478CP9T9eKusxim490bFXQgc5Onp2x-SIsIUb2avnmTsLDsDwwWp1DIbww6Ngxkfgi91K7zo_GuyjLcDCeEVuwMpOUZvbzTrsBYoUKl78kavgV0wgNCeVnWFHQyA6hE_5N0HRHWuXv8Mg';
  const player = new Spotify.Player({
    name: 'myPlayer',
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
            
    const play = ({
  spotify_uri,
  playerInstance: {
    _options: {
      getOAuthToken,
      id
    }
  }
}) => {
  getOAuthToken(access_token => {
    fetch(`https://api.spotify.com/v1/me/player/play?device_id=10e81ad2ac4570c16c6b0a8ed169cb07cef8c755`, {
      method: 'PUT',
      body: JSON.stringify({ uris: [spotify_uri] }),
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer BQDe9NXQ3gwWrYrUTown-MDbqjEHJYXUzM4fQaKcOi5iuccynRgd4r1l6s7B7HL_TTDkZGG4UPPjf0woCxCORKDqxgjQJ8q9hoV6hVgb_65I8QormetfNUpugPTqiBgtaUTjjwqVXXG6EMywKZXXyXn6diDDoKflgUFWlV-pAztoLSdBv5ClMOWtZw`
      },
    });
  });
};

play({
  playerInstance: new Spotify.Player({ name: "..." }),
  spotify_uri: 'spotify:track:3mi7RsNkaXOMfcXqjxXGzB',
});
            
};

</script>
<script src="../js/play.js"></script>   
    
    
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
