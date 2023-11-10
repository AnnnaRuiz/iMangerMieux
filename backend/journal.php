<?php
session_start();
require_once('functionsAPI.php');
$date = date("Y-m-d");

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        $mail= $_SESSION['mail'];
        $daily = extractDailyDatas($mail, $date);
        $weekly = extractWeeklyDatas ($mail, $date);
        $monthly = extractMonthlyDatas($mail, $date);
        if($daily!=null && $weekly!=null && $monthly!=null){
            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode(["dailyData" => $daily, "weeklyData" => $weekly, "monthlyData" => $monthly]);
            break;
        } else {
            http_response_code(404); // Code d'erreur 404 Not Found
            exit(json_encode(["message" => "Datas non trouvés"]));
        }
    default : 
        http_response_code(501);
        exit(json_encode(["message" => "Not implemented"]));
}