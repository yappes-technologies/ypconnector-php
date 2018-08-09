<?php
require("../ypconnector.php");
function getOperationCheck(){
    $ypObj = new yappesLibrary();  
$head= array(
    "Content-Type:"."application/json", 
    "X-Yappes-Key:".""
  );
$api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
$getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
$body=(array)json_decode($getObj["body"]);
var_dump($getObj);
assert($body["name"]=="getUser");
}

function postOperationCheck(){
    $ypObj = new yappesLibrary();  
$head= array(
    "Content-Type:"."application/json", 
    "X-Yappes-Key:".""
  );
$api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
$postObj=$ypObj->postOperation("http://localhost:8081/postdata",$api_request_parameters);
$body=(array)json_decode($postObj["body"]);
var_dump($postObj);
assert($body["name"]=="addUser");
}

function putOperationCheck(){
    $ypObj = new yappesLibrary();  
    $head= array(
    "Content-Type:"."application/json", 
    "X-Yappes-Key:".""
  );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $putObj=$ypObj->putOperation("http://localhost:8081/putdata",$api_request_parameters);
    $body=(array)json_decode($putObj["body"]);
    var_dump($putObj);
    assert($body["name"]=="updateUser");
}


function deleteOperationCheck(){
    $ypObj = new yappesLibrary();  
    $head= array(
    "Content-Type:"."application/json", 
    "X-Yappes-Key:".""
  );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $deleteObj=$ypObj->deleteOperation("http://localhost:8081/deletedata",$api_request_parameters);
    $body=(array)json_decode($deleteObj["body"]);
    var_dump($deleteObj);
    assert($body["name"]=="deleteUser");
}


function patchOperationCheck(){
    $ypObj = new yappesLibrary();  
    $head= array(
    "Content-Type:"."application/json", 
    "X-Yappes-Key:".""
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
