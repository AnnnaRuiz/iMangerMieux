<?php
session_start();
require_once('functionsAPI.php');

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        $mail = $_SESSION['mail'];
        $result = getDailyRepas($mail);
        if($result!=null){
            header('Content-type: application/json');
            http_response_code(200);
            exit(json_encode($result));
        } else {
            http_response_code(404); // Code d'erreur 404 Not Found 
            exit( json_encode(["message" => "Repas introuvable"]));
        }
    
    case 'POST':
        if(isset($_POST['REPAS_ID']) && isset($_POST['DATE']) && isset($_POST['TYPE_REPAS']) && isset($_POST['ALIMENT']) && isset($_POST['QUANTITE'])){
            $mail = $_SESSION['mail'];
            $date = $_POST['DATE'];
            $type_repas = $_POST['TYPE_REPAS'];
            $aliment = $_POST['ALIMENT'];
            $quantite = $_POST['QUANTITE'];
            $item = createAlimentRepas($mail, $date, $type_repas, $aliment, $quantite);

            if ($item != null) {
                http_response_code(201); // Code 201 created 
                header('Content-Type: application/json');
                exit(json_encode($item));
            } else {
                // Erreur lors de la création de l'aliment
                http_response_code(500); // Code d'erreur 500 Internal Server Error
                exit(json_encode(["message" => "Erreur lors de la création du repas"]));
            }
        } else{
            $result = listAlimentRepas();
            if ($result != null) {
                    
                http_response_code(201); // Code 201 created 
                header('Content-Type: application/json');
                exit(json_encode($result));
            } else {
                // Erreur lors de la création de l'aliment
                http_response_code(500); // Code d'erreur 500 Internal Server Error
                exit(json_encode(["message" => "Erreur lors du listing des aliments pour le repas"]));
            }
        }
        

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $deleteData);
        
        if(isset($deleteData['REPAS_ID']) && isset($deleteData['ALIMENT'])){
            $id = $deleteData['REPAS_ID'];
            $aliment = $deleteData['ALIMENT'];
            $deleted = deleteRepas($id, $aliment);
            if ($deleted) {
                http_response_code(200);
                exit(json_encode(["message" => "Repas supprimé avec succès"]));
            } else {
                http_response_code(500);
                exit(json_encode(["message" => "Erreur lors de la suppression du repas"]));
            }
        } else{
            http_response_code(400); // Code d'erreur 400 Bad Request
            exit( json_encode(["message" => "Parametres invalides pour la suppression de l'aliment"]));
        }

    case 'PUT':
        parse_str(file_get_contents("php://input"), $putData);
    
        if(isset($putData['REPAS_ID']) && isset($putData['ALIMENT']) && isset($putData['QUANTITE'])){
            $repas_id = $putData['REPAS_ID'];
            $aliment = $putData['ALIMENT'];
            $quantite = $putData['QUANTITE'];    
            $updatedRepasItem = updateRepasItem($repas_id, $aliment, $quantite);
    
            if ($updatedRepasItem !== null) {
                http_response_code(200); // Code 200 OK
                header('Content-Type: application/json');
                exit(json_encode($updatedRepasItem));
            }
            else {
                http_response_code(404); // Code d'erreur 404 Not Found
                exit(json_encode(["message" => "Repas non trouve"]));
            }
        } else {
            http_response_code(400); // Code d'erreur 400 Bad Request
            exit(json_encode(["message" => "Parametres invalides pour la mise a jour de l'aliment"]));
        }
        
    default : 
        http_response_code(501);
        exit(json_encode(["message" => "Not implemented"]));
}
