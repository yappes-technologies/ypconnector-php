<?php

namespace Yappes;

class Ypconnector
{
  private $yappesToken;

  public function __construct($token)
  {
        $this->yappesToken = $token;
  }

  /* GET Request Method - input header array will be converted into 
     format array("Header: <value>") required for Curl operation */
  public function get($url, $parameters)
  {
      $ypHeaders= [];
      $parameters["headers"]["X-Yappes-Key"]=$this->yappesToken;
      $headKeyList = array_keys($parameters["headers"]);

      if(count($headKeyList)>=1){
        for($headerCount=0; $headerCount < count($headKeyList); $headerCount++){
          array_push($ypHeaders,$headKeyList[$headerCount].": ".$parameters["headers"][$headKeyList[$headerCount]]);
        }
      }

      if(count($parameters["queryparams"])>0){
        $ypQueryParams = http_build_query($parameters["queryparams"]);
        $ypUrl = $url."?".$ypQueryParams;
      } else {
        $ypUrl = $url;
      }
      

     $options = ["host" => parse_url($ypUrl, PHP_URL_HOST) , "path" => parse_url($ypUrl, PHP_URL_PATH) , "port" => parse_url($ypUrl, PHP_URL_PORT) , "method" => "get", "headers" => $parameters["headers"]];
    if (!$options["port"])
      {
      $options["port"] = 443;
      }
    try
      {

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $ypUrl);
      curl_setopt($ch, CURLOPT_HEADER, true);
      curl_setopt($ch, CURLOPT_NOBODY, false);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $ypHeaders);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_TIMEOUT, 10);
      curl_setopt($ch, CURLINFO_HEADER_OUT, true);
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
      $header = substr($output, 0, $header_size);
      $body = substr($output, $header_size);
      $statusMsg=explode(" ",substr($output, 0, $header_size));
      curl_close($ch);
      $responseSchema["headers"] = $header;
      $responseSchema["statusCode"] = $info["http_code"];
      $responseSchema["statusMessage"] = $statusMsg[2];
      $responseSchema["body"] = $body;
      return $responseSchema;
      }
    catch(Exception $e)
      {
      echo $e;
      }
  }

  /* POST Request Method - input header array will be converted into 
     format array("Header: <value>") required for Curl operation*/  
  public function post($url, $parameters)
    {
      $ypHeaders= [];
      $parameters["headers"]["X-Yappes-Key"]=$this->yappesToken;
      $headKeyList = array_keys($parameters["headers"]);

      if(count($headKeyList)>=1){
        for($headerCount=0; $headerCount < count($headKeyList); $headerCount++){
          array_push($ypHeaders,$headKeyList[$headerCount].": ".$parameters["headers"][$headKeyList[$headerCount]]);
        }
      }
      if(count($parameters["queryparams"])>0){
        $ypQueryParams = http_build_query($parameters["queryparams"]);
        $ypUrl = $url."?".$ypQueryParams;
      } else {
        $ypUrl = $url;
      }

    $options = ["host" => parse_url($ypUrl, PHP_URL_HOST) , "path" => parse_url($ypUrl, PHP_URL_PATH) , "port" => parse_url($ypUrl, PHP_URL_PORT) , "method" => "post", "headers" => $parameters["headers"]];
    if (!$options["port"])
      {
      $options["port"] = 443;
      }

    if ($parameters["headers"]["Content-Type"]=='application/xml')
      {
      $payload=$parameters["payload"][array_keys($parameters["payload"])[0]];      
      } else {
      $payload=json_encode($parameters["payload"]);
      }

    try
      {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $ypUrl);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $ypHeaders);
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
      $statusMsg=explode(" ",substr($output, 0, $header_size));
      curl_close($ch);
      $responseSchema["headers"] = $header;
      $responseSchema["statusCode"] = $info["http_code"];
      $responseSchema["statusMessage"] = $statusMsg[2];
      $responseSchema["body"] = $body;
      return $responseSchema;
      }
    catch(Exception $e)
      {
      echo $e;
      }
    }

  /* PUT Request Method - input header array will be converted into 
     format array("Header: <value>") required for Curl operation*/
  public function put($url, $parameters)
  {
      $ypHeaders= [];
      $parameters["headers"]["X-Yappes-Key"]=$this->yappesToken;
      $headKeyList = array_keys($parameters["headers"]);

      if(count($headKeyList)>=1){
        for($headerCount=0; $headerCount < count($headKeyList); $headerCount++){
          array_push($ypHeaders,$headKeyList[$headerCount].": ".$parameters["headers"][$headKeyList[$headerCount]]);
        }
      }
      if(count($parameters["queryparams"])>0){
        $ypQueryParams = http_build_query($parameters["queryparams"]);
        $ypUrl = $url."?".$ypQueryParams;
      } else {
        $ypUrl = $url;
      }

    $options = ["host" => parse_url($ypUrl, PHP_URL_HOST) , "path" => parse_url($ypUrl, PHP_URL_PATH) , "port" => parse_url($ypUrl, PHP_URL_PORT) , "method" => "put", "headers" => $parameters["headers"]];
    if (!$options["port"])
      {
      $options["port"] = 443;
      }

    if ($parameters["headers"]["Content-Type"]=='application/xml')
      {
      $payload=$parameters["payload"][array_keys($parameters["payload"])[0]];      
      } else {
      $payload=json_encode($parameters["payload"]);
      }

    try
      {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $ypUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $ypHeaders);
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
      $statusMsg=explode(" ",substr($output, 0, $header_size));
      curl_close($ch);
      $responseSchema["headers"] = $header;
      $responseSchema["statusCode"] = $info["http_code"];
      $responseSchema["statusMessage"] = $statusMsg[2];
      $responseSchema["body"] = $body;
      return $responseSchema;
      }
    catch(Exception $e)
      {
      echo $e;
      }
    }

  /* DELETE Request Method - input header array will be converted into 
     format array("Header: <value>") required for Curl operation*/
    public function delete($url, $parameters)
    {
      $ypHeaders= [];
      $parameters["headers"]["X-Yappes-Key"]=$this->yappesToken;
      $headKeyList = array_keys($parameters["headers"]);

      if(count($headKeyList)>=1){
        for($headerCount=0; $headerCount < count($headKeyList); $headerCount++){
          array_push($ypHeaders,$headKeyList[$headerCount].": ".$parameters["headers"][$headKeyList[$headerCount]]);
        }
      }
      if(count($parameters["queryparams"])>0){
        $ypQueryParams = http_build_query($parameters["queryparams"]);
        $ypUrl = $url."?".$ypQueryParams;
      } else {
        $ypUrl = $url;
      }

    $options = ["host" => parse_url($ypUrl, PHP_URL_HOST) , "path" => parse_url($ypUrl, PHP_URL_PATH) , "port" => parse_url($ypUrl, PHP_URL_PORT) , "method" => "delete", "headers" => $parameters["headers"]];
    if (!$options["port"])
      {
      $options["port"] = 443;
      }

    if ($parameters["headers"]["Content-Type"]=='application/xml')
      {
      $payload=$parameters["payload"][array_keys($parameters["payload"])[0]];      
      } else {
      $payload=json_encode($parameters["payload"]);
      }

    try
      {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $ypUrl);
      curl_setopt($ch, CURLOPT_HEADER, true);
      curl_setopt($ch, CURLOPT_NOBODY, false);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $ypHeaders);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_TIMEOUT, 10);
      curl_setopt($ch, CURLINFO_HEADER_OUT, true);
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
      $header = substr($output, 0, $header_size);
      $body = substr($output, $header_size);
      $statusMsg=explode(" ",substr($output, 0, $header_size));
      curl_close($ch);
      $responseSchema["headers"] = $header;
      $responseSchema["statusCode"] = $info["http_code"];
      $responseSchema["statusMessage"] = $statusMsg[2];
      $responseSchema["body"] = $body;
      return $responseSchema;
      }
    catch(Exception $e)
      {
      echo $e;
      }
    }
  

  /* PATCH Request Method - input header array will be converted into 
     format array("Header: <value>") required for Curl operation*/
    public function patch($url, $parameters)
    {
      $ypHeaders= [];
      $parameters["headers"]["X-Yappes-Key"]=$this->yappesToken;
      $headKeyList = array_keys($parameters["headers"]);

      if(count($headKeyList)>=1){
        for($headerCount=0; $headerCount < count($headKeyList); $headerCount++){
          array_push($ypHeaders,$headKeyList[$headerCount].": ".$parameters["headers"][$headKeyList[$headerCount]]);
        }
      }
      if(count($parameters["queryparams"])>0){
        $ypQueryParams = http_build_query($parameters["queryparams"]);
        $ypUrl = $url."?".$ypQueryParams;
      } else {
        $ypUrl = $url;
      }

    $options = ["host" => parse_url($ypUrl, PHP_URL_HOST) , "path" => parse_url($ypUrl, PHP_URL_PATH) , "port" => parse_url($ypUrl, PHP_URL_PORT) , "method" => "patch", "headers" => $parameters["headers"]];
    if (!$options["port"])
      {
      $options["port"] = 443;
      }

    if ($parameters["headers"]["Content-Type"]=='application/xml')
      {
      $payload=$parameters["payload"][array_keys($parameters["payload"])[0]];      
      } else {
      $payload=json_encode($parameters["payload"]);
      }

    try
      {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $ypUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $ypHeaders);
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
      $statusMsg=explode(" ",substr($output, 0, $header_size));
      curl_close($ch);
      $responseSchema["headers"] = $header;
      $responseSchema["statusCode"] = $info["http_code"];
      $responseSchema["statusMessage"] = $statusMsg[2];
      $responseSchema["body"] = $body;
      return $responseSchema;
      }
    catch(Exception $e)
      {
      echo $e;
      }
    }

  /* Common Request Method - input header array will be converted into 
     format array("Header: <value>") required for Curl operation*/
    public function call($url, $parameters)
    {
      if(isset($parameters["method"])&&$parameters["method"]!="")
      {
            $requestMethod = $parameters["method"];
      }
      else{
         throw new Exception('Method not Available in parameters');
      }

      $allowedMethod = ["get","post","put","delete","patch"];

      $ypHeaders= [];
      $parameters["headers"]["X-Yappes-Key"]=$this->yappesToken;
      $headKeyList = array_keys($parameters["headers"]);

      if(count($headKeyList)>=1){
        for($headerCount=0; $headerCount < count($headKeyList); $headerCount++){
          array_push($ypHeaders,$headKeyList[$headerCount].": ".$parameters["headers"][$headKeyList[$headerCount]]);
        }
      }
      if(count($parameters["queryparams"])>0){
        $ypQueryParams = http_build_query($parameters["queryparams"]);
        $ypUrl = $url."?".$ypQueryParams;
      } else {
        $ypUrl = $url;
      }

    $options = ["host" => parse_url($ypUrl, PHP_URL_HOST) , "path" => parse_url($ypUrl, PHP_URL_PATH) , "port" => parse_url($ypUrl, PHP_URL_PORT) , "method" => "get", "headers" => $parameters["headers"]];
    if (!$options["port"])
      {
      $options["port"] = 443;
      }

    if ($parameters["headers"]["Content-Type"]=='application/xml')
      {
      $payload=$parameters["payload"][array_keys($parameters["payload"])[0]];      
      } else {
      $payload=json_encode($parameters["payload"]);
      }

    try
      {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $ypUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $requestMethod);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $ypHeaders);
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
      $statusMsg=explode(" ",substr($output, 0, $header_size));
      curl_close($ch);
      $responseSchema["headers"] = $header;
      $responseSchema["statusCode"] = $info["http_code"];
      $responseSchema["statusMessage"] = $statusMsg[2];
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
