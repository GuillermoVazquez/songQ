<?php
session_start();
include 'config.php';

$url = 'https://api.spotify.com/v1/me';
$headers = [
    'Authorization: Bearer '.auth
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//json held in response
$response = curl_exec($ch);

$array = json_decode($response, true);
$id = $array["id"];
echo $id;
//store user id for later use in session var
$_SESSION["spotifyId"] = "$id";

if (!$response) 
{
    return false;
}

?>