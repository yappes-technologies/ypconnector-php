# ypconnector-php
Ypconnector is a PHP SDK used for integrating the Yappes Published APIs with your application. SDK is installed via npm. 

Ypconnector provides individual action methods and a common method for making API requests.Currently it supports GET,POST,POST,DELETE and PATCH.


Install:
```
composer require yappes/ypconnector
```
Usage:
```
require_once dirname(dirname(__FILE__)) . '/vendor/autoload.php';
use Yappes\Ypconnector;

//Yappes-Token obtained from yappes portal
$yappesToken = "YOUR X-YAPPES-KEY";
$ypconnectorObj = new Ypconnector($yappesToken);

//Data needed to call the library methods - individual Actions(GET/POST/PUT)
$url = "http://localhost:8081/getdata";
$jsonData = '{
 "headers": {
  "Content-Type":"application/json"
 },
 "queryparams": {
  "queryParam1" : "value1"
 },
 "payload": {
  "key":"value"
 }
}';

// the $requestData should be in array or associative array format
$requestData = json_decode($jsonData,true);


//GET Request with empty payload: {}
$responseObj = $ypconnectorObj->get($url, $requestData);
$body = (array)json_decode($responseObj["body"]);
var_dump($responseObj);


//POST Request
$responseObj = $ypconnectorObj->post($url, $requestData);
$body = (array)json_decode($responseObj["body"]);
var_dump($responseObj);

//PUT Request
$responseObj = $ypconnectorObj->put($url, $requestData);
$body = (array)json_decode($responseObj["body"]);
var_dump($responseObj);

//Common Method
//Data needed to call the library methods - common action (call)
$url = "http://localhost:8081/getdata";
$jsonData = '{
 "method":"get"
 "headers": {
  "Content-Type":"application/json"
 },
 "queryparams": {
  "queryParam1" : "value1"
 },
 "payload": {
  "key":"value"
 }
}';

// the $requestData should be in array or associative array format
$requestData = json_decode($jsonData,true);

$responseObj = $ypconnectorObj->call($url, $requestData);
$body = (array)json_decode($responseObj["body"]);
var_dump($responseObj);
```

