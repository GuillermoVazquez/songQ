<?php
session_start();
include 'config.php';

//get user id
$id = $_SESSION["spotifyId"];
//get part name
$playlist = $_SESSION["Party"];


$url = 'https://api.spotify.com/v1/users/'.$id.'/playlists';
$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer '.auth
];
$json_data->name = $playlist; 
$json_data->description =  "please work";
$json_data = json_encode($json_data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS,$json_data);
$response = curl_exec($ch);

echo $response;
header("location:../html/main.php");
exit;

if (!$response) 
{
    return false;
}

?>