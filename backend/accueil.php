<?php
session_start();
require_once('functionsAPI.php');
$date = date("Y-m-d");
$mail= $_SESSION['mail'];

switch($_SERVER["REQUEST_METHOD"]){
    
    case 'GET':
        $result1 = numberFruitsLegsThisDay($mail, $date);
        $result2 = numberCalThisDay($mail, $date);
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode(["fruitsLegs" => $result1, "calories" => $result2]);
        break;

    default : 
        http_response_code(501);
        exit(json_encode(["message" => "Not implemented"]));
}