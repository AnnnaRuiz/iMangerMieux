<?php
session_start();
require_once('functionsAPI.php');

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        $mail = $_SESSION['mail'];
        $result = getDailyRepas($mail);
        header('Content-type: application/json');
        http_response_code(200);
        exit(json_encode($result));
    default : 
        http_response_code(501);
        exit(json_encode(["message" => "Not implemented"]));
}
