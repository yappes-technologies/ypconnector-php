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
var_dump($body);
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
var_dump($body);
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
var_dump($body);
assert($body["name"]=="updateUser");
}

getOperationCheck();
postOperationCheck();
putOperationCheck();
?>
