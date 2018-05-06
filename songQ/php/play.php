<?php
session_start();


$url = 'https://api.spotify.com/v1/me/player/play';
$headers = [
    'BQDrkzrGGH5KOpJiwr4nY-4DtrwhGpQkp1CddeqbK7zFJWoD7WTHu-G98eMnKbILxmk8AmAqN4Wugi2-uR_hWFx88YEQO-re9l09oeR8dKP25AorNnFqPLdl37q50Rq64TMLUOf1XpR894Wgxt99tk0y8Yqp2D-eJ3FBEvOD2RAY0edI4oLIPfRLOw'
];
$json_data->uris = ["spotify:track:46RVKt5Edm1zl0rXhPJZxz"];
$json_data = json_encode($json_data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS,$json_data);
$response = curl_exec($ch);

echo $response;
echo $url;

if (!$response) 
{
    return false;
}

?>