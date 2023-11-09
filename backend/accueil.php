<?php
session_start();
require_once('functionsAPI.php');
$date = date("Y-m-d");
$mail= $_SESSION['mail'];

switch($_SERVER["REQUEST_METHOD"]){
    
    case 'GET':
        $result = numberFruitsVegsThisDay($mail, $date);
        header('Content-type: application/json');
        http_response_code(200);
        exit(json_encode(["fruitsLegs" => $result]));


    default : 
        http_response_code(501);
        exit(json_encode(["message" => "Not implemented"]));
}