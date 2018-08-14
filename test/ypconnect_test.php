<?php
require_once dirname(dirname(__FILE__)) . '/vendor/autoload.php';
use Yappes\Ypconnector;

//require_once dirname(dirname(__FILE__)).'/src/ypconnector.php';

try{
$yappesToken = "446ee1430d3e38ed961fd6637c8454b604731f7539c77a93db696b92f41edbdf";
$ypconnectorObj = new Ypconnector($yappesToken);

//Data needed to call the library methods - individual Actions(GET/POST/PUT)
$url = "https://googletimezoneapi.client.market.pr.yappes.com/maps/api/timezone/json";
$jsonData = '{
 "headers": {
  "Content-Type":"application/json"
 },
 "queryparams": {
  "key":"AIzaSyAwO0vVsKgWkGwO6kpyvLBxo-wBmek7bek",
  "location":"-33.86,151.20",
  "timestamp":"1331161200"
 },
 "payload": {}
}';

$requestData = json_decode($jsonData,true);

//GET Request with empty payload: {}
$getObj = $ypconnectorObj->getOperation($url, $requestData);
$body = (array)json_decode($getObj["body"]);
var_dump($getObj);
} catch(Exception $e){
	echo $e;
}
?>