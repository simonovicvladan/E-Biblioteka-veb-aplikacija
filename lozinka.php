<?php
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, "http://www.sethcardoza.com/api/rest/tools/random_password_generator");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
$output = curl_exec($ch);

curl_close($ch);

echo json_encode($output);
?>