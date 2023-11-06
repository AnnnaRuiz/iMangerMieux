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
    
        case 'POST':
            $type_repas = $_POST['TYPE_REPAS'];
            $aliment = $_POST['ALIMENT'];
            $quantite = $_POST['QUANTITE'];
            $item = createAlimentRepas($type_repas, $aliment, $quantite);
    
            if ($item != null) {
                    
                http_response_code(201); // Code 201 created 
                header('Content-Type: application/json');
                exit(json_encode($item));
            }
            else {
                // Erreur lors de la création de l'aliment
                http_response_code(500); // Code d'erreur 500 Internal Server Error
                exit(json_encode(["message" => "Erreur lors de la création du repas"]));
            }
        
    default : 
        http_response_code(501);
        exit(json_encode(["message" => "Not implemented"]));
}
