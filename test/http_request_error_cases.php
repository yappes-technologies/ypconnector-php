
<?php
require("../ypconnector.php");
//success responses


//"200 OK"
function OK(){
    $ypObj = new yappesLibrary();  
    $head= array(
    "Content-Type:"."application/json", 
    "X-Yappes-Key:".""
  );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
    echo $getObj["statusCode"];
    assert($getObj["statusCode"]==200);
}

//"204 No Content "
function noContent(){
    $ypObj = new yappesLibrary();  
    $head= array(
        "Content-Type:"."application/json", 
        "X-Yappes-Key:".""
      );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
    echo $getObj["statusCode"];
    assert($getObj["statusCode"]==204);
}    

// Client Errors

//"400  Bad Request"
function badRequest(){
    $ypObj = new yappesLibrary();  
    $head= array(
        "Content-Type:"."application/json", 
        "X-Yappes-Key:".""
      );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
    echo $getObj["statusCode"];
    assert($getObj["statusCode"]==400);
}
//"401 Unauthorized Access "
function unauthorizedAccess(){
    $ypObj = new yappesLibrary();  
    $head= array(
        "Content-Type:"."application/json", 
        "X-Yappes-Key:".""
      );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
    echo $getObj["statusCode"];
    assert($getObj["statusCode"]==401);
}    
//"406 Not Acceptable "
function notAcceptable(){
    $ypObj = new yappesLibrary();  
    $head= array(
        "Content-Type:"."application/json", 
        "X-Yappes-Key:".""
      );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
    echo $getObj["statusCode"];
    assert($getObj["statusCode"]==406);
}
//"404  Not Found"
function notFound(){
    $ypObj = new yappesLibrary();  
    $head= array(
        "Content-Type:"."application/json", 
        "X-Yappes-Key:".""
      );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
    echo $getObj["statusCode"];
    assert($getObj["statusCode"]==406);
}  
//"403  Forbidden "
function Forbidden(){
    $ypObj = new yappesLibrary();  
    $head= array(
        "Content-Type:"."application/json", 
        "X-Yappes-Key:".""
      );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
    echo $getObj["statusCode"];
    assert($getObj["statusCode"]==403);
}
//"405 Method Not Allowed "
function methodNotAllowed(){
    $ypObj = new yappesLibrary();  
    $head= array(
        "Content-Type:"."application/json", 
        "X-Yappes-Key:".""
      );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
    echo $getObj["statusCode"];
    assert($getObj["statusCode"]==405);
}  

//"415 Unsupported Media Type "
function unsupportedMediaType(){
    $ypObj = new yappesLibrary();  
    $head= array(
        "Content-Type:"."application/json", 
        "X-Yappes-Key:".""
      );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
    echo $getObj["statusCode"];
    assert($getObj["statusCode"]==415);
}
//"408  Request Timeout"
function requestTimeout(){
    $ypObj = new yappesLibrary();  
    $head= array(
        "Content-Type:"."application/json", 
        "X-Yappes-Key:".""
      );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
    echo $getObj["statusCode"];
    assert($getObj["statusCode"]==405);
}  

//Server Errors

//"500 Internal Server Error"
function internalServerError(){
    $ypObj = new yappesLibrary();  
    $head= array(
        "Content-Type:"."application/json", 
        "X-Yappes-Key:".""
      );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
    echo $getObj["statusCode"];
    assert($getObj["statusCode"]==500);
}
// "502 Bad Gateway "    
function badGateway(){
    $ypObj = new yappesLibrary();  
    $head= array(
        "Content-Type:"."application/json", 
        "X-Yappes-Key:".""
      );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
    echo $getObj["statusCode"];
    assert($getObj["statusCode"]==502);
}  
//"503 Service Unavailable "
function serviceUnavailable(){
    $ypObj = new yappesLibrary();  
    $head= array(
        "Content-Type:"."application/json", 
        "X-Yappes-Key:".""
      );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
    echo $getObj["statusCode"];
    assert($getObj["statusCode"]==503);
}
//"504 Gateway Timeout"
function gatewayTimeout(){
    $ypObj = new yappesLibrary();  
    $head= array(
        "Content-Type:"."application/json", 
        "X-Yappes-Key:".""
      );
    $api_request_parameters = ["headers" => $head, "queryparams" => "", "payload" => []];
    $getObj=$ypObj->getOperation("http://localhost:8081/getdata",$api_request_parameters);
    echo $getObj["statusCode"];
    assert($getObj["statusCode"]==504);
}      

//SUCCES RESPONSES
OK();
noContent();
//CLIENT ERROR RESPONSES
badRequest();
unauthorizedAccess();
notAcceptable();
notFound();
Forbidden();
methodNotAllowed();
unsupportedMediaType();
requestTimeout();
//SERVER ERROR RESPONSES
internalServerError();
badGateway();
serviceUnavailable();
gatewayTimeout();
?>