<?php
session_start();
require_once('functionsAPI.php');
$date = date("Y-m-d");
$mail= $_SESSION['mail'];

switch($_SERVER["REQUEST_METHOD"]){
    
    case 'GET':
        $result = numberFruitsVegsThisDay($mail, $date);
        if($result!=null){
            header('Content-type: application/json');
        http_response_code(200);
        exit(json_encode(["fruitsLegs" => $result]));
        } else {
            http_response_code(404); // Code d'erreur 404 Not Found 
            exit( json_encode(["message" => "Nombre de fruit et légume introuvable"]));
        }
        


    default : 
        http_response_code(501);
        exit(json_encode(["message" => "Not implemented"]));
}