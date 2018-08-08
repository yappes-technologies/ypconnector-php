<!-- <?php
$url = 'https://maps.googleapis.com/maps/api/timezone/json?location=38.908133,-77.047119&timestamp=1458000000';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
var_dump($ch);
curl_close($ch);
var_dump($data);
?> -->

<?php
$url = 'https://maps.googleapis.com/maps/api/timezone/json?location=38.908133,-77.047119&timestamp=1458000000';
$header = array('Accept-Language: en');
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$data = curl_exec($curl);
var_dump($data);
curl_close($curl);
?>