<?php
require_once dirname(dirname(__FILE__)) . '/vendor/autoload.php';
use Core\Connector\YappesLibrary;


function getOperationCheck(){
    $yappesToken="Your X-Yappes-Key";
    $ypObj = new YappesLibrary($yappesToken);  
$head= array(
    "Content-Type"=>"application/json"
  );
$api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
$getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
$body=(array)json_decode($getObj["body"]);
var_dump($getObj);
assert($body["name"]=="getUser");
}

function postOperationCheck(){
    $yappesToken="Your X-Yappes-Key";
    $ypObj = new YappesLibrary($yappesToken);  
$head= array(
    "Content-Type"=>"application/json"
  );
$api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
$postObj=$ypObj->postOperation("http://localhost:8081/postdata",$api_request_parameters);
$body=(array)json_decode($postObj["body"]);
var_dump($postObj);
assert($body["name"]=="addUser");
}

function putOperationCheck(){
    $yappesToken="Your X-Yappes-Key";
    $ypObj = new YappesLibrary($yappesToken);   
    $head= array(
    "Content-Type"=>"application/json"
  );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $putObj=$ypObj->putOperation("http://localhost:8081/putdata",$api_request_parameters);
    $body=(array)json_decode($putObj["body"]);
    var_dump($putObj);
    assert($body["name"]=="updateUser");
}


function deleteOperationCheck(){
    $yappesToken="Your X-Yappes-Key";
    $ypObj = new YappesLibrary($yappesToken);  
    $head= array(
    "Content-Type"=>"application/json"
  );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $deleteObj=$ypObj->deleteOperation("http://localhost:8081/deletedata",$api_request_parameters);
    $body=(array)json_decode($deleteObj["body"]);
    var_dump($deleteObj);
    assert($body["name"]=="deleteUser");
}


function patchOperationCheck(){
    $yappesToken="Your X-Yappes-Key";
    $ypObj = new YappesLibrary($yappesToken);  
    $head= array(
    "Content-Type"=>"application/json"
  );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $patchObj=$ypObj->patchOperation("http://localhost:8081/patchdata",$api_request_parameters);
    $body=(array)json_decode($patchObj["body"]);
    var_dump($patchObj);
    assert($body["name"]=="patchUser");
}


getOperationCheck();
postOperationCheck();
putOperationCheck();
deleteOperationCheck();
patchOperationCheck();
?>
