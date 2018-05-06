<?php
session_start();


$url = 'https://api.spotify.com/v1/me/player/play';
$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer BQCva9OOcSmJHYuE-dINjkQeRQi8XxIJASk05lcnilUNGraONK2c3J5jRXSzc841JZFeAwgbBOm-dLio_RIFjlFw1TGgLJ9-Rx1herSW2wUkrJW3UHp16vjUf0XewmqOvKyLaMpPzBueofF4zLvNMLo8udPXqYqsji4ivHE'
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
$response = curl_exec($ch);

//echo $response;
echo $url;

if (!$response) 
{
    return false;
}

?>