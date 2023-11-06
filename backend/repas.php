<?php
session_start();
require_once('functionsAPI.php');

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        $mail= $_SESSION['mail'];
        $result = getDailyRepas($mail);
        header('Content-type: application/json');
        http_response_code(200);
        exit(json_encode($result));
    
    case 'POST':
        $mail= $_SESSION['mail'];
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
        parse_str(file_get_contents("php://input"), $deleteData);
        
        if(isset($deleteData['REPAS_ID']) && isset($deleteData['ALIMENT']) && isset($deleteData['QUANTITE'])){
            $id = $deleteData['REPAS_ID'];
            $aliment = $deleteData['ALIMENT'];
            $quantite = $deleteData['QUANTITE'];
            $deleted = deleteRepas($id, $aliment, $quantite);
            if ($deleted) {
                http_response_code(200);
                exit(json_encode(["message" => "Repas supprimé avec succès"]));
            } else {
                http_response_code(500);
                exit(json_encode(["message" => "Erreur lors de la suppression du repas"]));
            }
        }else{
            http_response_code(400); // Code d'erreur 400 Bad Request
            exit( json_encode(["message" => "Parametres invalides pour la suppression de l'aliment"]));
        }
        
    default : 
        http_response_code(501);
        exit(json_encode(["message" => "Not implemented"]));
}
