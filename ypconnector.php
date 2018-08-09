
<?php
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
?>