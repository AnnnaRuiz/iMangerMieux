<?php
session_start();
require_once('functionsAPI.php');

$mail= $_SESSION['mail'];
$result = extractDailyDatas($mail);
header('Content-type: application/json');
http_response_code(200);
exit(json_encode($result));