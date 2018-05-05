<?php
//this will handle the Spotify auth code
session_start();

if(isset($_GET('code'))){
    $auth = $_GET('code');
    $state = $_GET('state');
    
    $url = "https://accounts.spotify.com/api/token";
    $postFields = "grant_type=authorization_code&code=.$auth.&redirect_uri=value3&client_id=a067472b3bb24cd98495015f3a48693f&client_secret=8a3a21a67c1c4ee99975e29ede60548d";
    $postFields = urlencode($postFields);    
    
    $ch = curl_init();    // initialize curl handle
    curl_setopt($ch, CURLOPT_URL,$url); // set url to post to
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    
    //post stuff
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$postFields);
    
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
    curl_setopt($ch, CURLOPT_COOKIESESSION, 1);// allow redirects    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 3); // times out after 4s
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_VERBOSE, 1); //for returning some body messages
    curl_setopt($ch, CURLOPT_HEADER, 1);  //for returning header messages
        
    $result = curl_exec($ch); // run the whole process
    curl_close($ch);    
}
else{
    $error = $_GET('error');
    //handel error
}




?>