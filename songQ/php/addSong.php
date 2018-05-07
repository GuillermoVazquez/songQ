<?php
session_start();
include 'config.php';

//get user id
$id = $_SESSION["spotifyId"];
$playlist = $_SESSION["Party"];
//song name
if(isset($_POST['uri'])) {
    $songName = $_POST['uri'];
    //$songName = "spotify:track:46RVKt5Edm1zl0rXhPJZxz";
    echo $songName;}
else{
    echo "sigh";
}

//get the playlist id
$url = 'https://api.spotify.com/v1/users/'.$id.'/playlists';
$headers = [
    'Authorization: Bearer '.auth
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//json held in response
$response = curl_exec($ch);

$array = json_decode($response, true);
$array = array_values($array);
foreach($array as $value){
    foreach($value as $val){
        if($val["name"] == $playlist){
            echo $val["name"];
            //echo $val["id"];
            //got the playlist id for the party playlist 
            $plId = $val["id"];        
        }
    }
}

if (!$response) 
{
    return false;
}

$url = 'https://api.spotify.com/v1/users/'.$id.'/playlists/'.$plId.'/tracks';
$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer '.auth
];
$json_data->uris = [$songName];
$json_data = json_encode($json_data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS,$json_data);
$response = curl_exec($ch);

header("location:../html/main.php");
exit;

if (!$response) 
{
    return false;
}

?>