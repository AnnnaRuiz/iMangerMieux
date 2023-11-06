<?php
session_start();
$mail = $_SESSION['mail'];
require_once('functionsAPI.php');

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        $result = getDailyRepas($mail);
        header('Content-type: application/json');
        http_response_code(200);
        exit(json_encode($result));
    
    case 'POST':
        $type_repas = $_POST['TYPE_REPAS'];
        $aliment = $_POST['ALIMENT'];
        $quantite = $_POST['QUANTITE'];
        $item = createAlimentRepas($mail, $type_repas, $aliment, $quantite);

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
        
    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DELETE);
        $id_repas = $_DELETE['ID_REPAS'];
        $result = deleteRepas($id_repas, $mail);
        if ($result) {
            http_response_code(200);
            exit(json_encode(["message" => "Repas supprimé avec succès"]));
        } else {
            http_response_code(500);
            exit(json_encode(["message" => "Erreur lors de la suppression du repas"]));
        }
        
    default : 
        http_response_code(501);
        exit(json_encode(["message" => "Not implemented"]));
}
