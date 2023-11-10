<?php
session_start();
require_once('functionsAPI.php');
$date = date("Y-m-d");

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        $mail= $_SESSION['mail'];
        $result1 = extractDailyDatas($mail, $date);
        $result2 = extractWeeklyDatas ($mail, $date);
        $result3 = extractMonthlyDatas($mail, $date);
        if($result1!=null && $result2!=null && $result3!=null){
            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode(["dailyData" => $result1, "weeklyData" => $result2, "monthlyData" => $result3]);
            break;
        }else {
            http_response_code(404); // Code d'erreur 404 Not Found
            exit(json_encode(["message" => "Datas non trouvés"]));
        }
    default : 
        http_response_code(501);
        exit(json_encode(["message" => "Not implemented"]));
}