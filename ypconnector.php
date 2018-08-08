<?php

// $api_request_url = 'https://maps.googleapis.com/maps/api/timezone/json?location=38.908133,-77.047119&timestamp=1458000000';
$head= array(
  "Content-Type:"."application/json", 
  "X-Yappes-Key:"."9c4272e8e7e09b6f701cf735cc2b66b5527f7795b637532b8ba5008328e4bea6"
);
$api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => ["Movies" => "dilwale", "Ratings" => "4"]];
class yappesLibrary

  {
  function getOperation($url, $parameters)
    {
    $options = ["host" => parse_url($url, PHP_URL_HOST) , "path" => parse_url($url, PHP_URL_PATH) , "port" => parse_url($url, PHP_URL_PORT) , "method" => "get", "headers" => $parameters["headers"]];
    if (!$options["port"])
      {
      $options["port"] = 443;
      }

    try
      {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HEADER, true);
      curl_setopt($ch, CURLOPT_NOBODY, false);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $parameters["headers"]);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_TIMEOUT, 10);
      curl_setopt($ch, CURLINFO_HEADER_OUT, true);
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      $header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
      $header = substr($output, 0, $header_len);
      $body = substr($output, $header_len);
      curl_close($ch);
      $responseSchema["headers"] = $header;
      $responseSchema["statusCode"] = $info["http_code"];
      $responseSchema["statusMessage"] = "";
      $responseSchema["body"] = $body;
      return $responseSchema;
      }

    catch(Exception $e)
      {
      echo $e;
      }
    }

  function postOperation($url, $parameters)
    {
    $options = ["host" => parse_url($url, PHP_URL_HOST) , "path" => parse_url($url, PHP_URL_PATH) , "port" => parse_url($url, PHP_URL_PORT) , "method" => "get", "headers" => $parameters["headers"]];
    if (!$options["port"])
      {
      $options["port"] = 443;
      }

    try
      {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters["payload"]);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $parameters["headers"]);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
      curl_setopt($ch, CURLOPT_NOBODY, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_TIMEOUT, 10);
      curl_setopt($ch, CURLINFO_HEADER_OUT, true);
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($output, 0, $header_size);
$body = substr($output, $header_size);
      curl_close($ch);
      $responseSchema["headers"] = $header;
      $responseSchema["statusCode"] = $info["http_code"];
      $responseSchema["statusMessage"] = "";
      $responseSchema["body"] = $body;
      return $responseSchema;
      }

    catch(Exception $e)
      {
      echo $e;
      }
    }

  function putOperation($url, $parameters)
    {
    $options = ["host" => parse_url($url, PHP_URL_HOST) , "path" => parse_url($url, PHP_URL_PATH) , "port" => parse_url($url, PHP_URL_PORT) , "method" => "get", "headers" => $parameters["headers"]];
    if (!$options["port"])
      {
      $options["port"] = 443;
      }

    try
      {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters["payload"]);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $parameters["headers"]);
      curl_setopt($ch, CURLOPT_NOBODY, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
      curl_setopt($ch, CURLOPT_TIMEOUT, 10);
      curl_setopt($ch, CURLINFO_HEADER_OUT, true);
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($output, 0, $header_size);
$body = substr($output, $header_size);
      curl_close($ch);
      $responseSchema["headers"] = $header;
      $responseSchema["statusCode"] = $info["http_code"];
      $responseSchema["statusMessage"] = "";
      $responseSchema["body"] = $body;
      return $responseSchema;
      }

    catch(Exception $e)
      {
      echo $e;
      }
    }
  }

$ypObj = new yappesLibrary();
$response = $ypObj->getOperation("https://googletimezoneapi.client.market.pr.yappes.com/maps/api/timezone/json?location=-33.86,151.20&timestamp=1331161200", $api_request_parameters);
print_r($response);
$postResponse = $ypObj->postOperation("http://localhost:8081/postdata", $api_request_parameters);
print_r($postResponse);
$putResponse = $ypObj->putOperation("http://localhost:8081/putdata", $api_request_parameters);
print_r($putResponse);
?>
