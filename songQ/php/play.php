<?php
session_start();
include 'config.php';

$url = 'https://api.spotify.com/v1/me/player/play';
$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer '.auth
];
$json_data->uris = ["spotify:track:46RVKt5Edm1zl0rXhPJZxz"];
$json_data = json_encode($json_data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS,$json_data);
$response = curl_exec($ch);

//echo $response;
echo $url;

if (!$response) 
{
    return false;
}

?>